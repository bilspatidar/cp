<?php
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;

     
class Cps extends REST_Controller {
    
	  /**
     * CONSTRUCTOR | LOAD MODEL
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
	   header('Access-Control-Allow-Origin: *');
	   $this->load->helper('security');
       $this->load->model('v2_model');
	   $this->load->library('encrypt');
	}
	
	public function index_get($paymentGatewayId,$payment_encrypt_key,$temp_encrypt_key){
		$payment 	= $this->v2_model->getPaymentGateway($paymentGatewayId,$payment_encrypt_key);
	    if($payment->num_rows()>0 && !empty($paymentGatewayId) && !empty($payment_encrypt_key) && !empty($temp_encrypt_key)){
	
            $tempData = $this->v2_model->validateTempRequest($temp_encrypt_key); 
            if($tempData->num_rows()>0){
                $amount 	    = $tempData->row()->amount;
				$firstname 	    = $tempData->row()->firstname;
				$lastname       = $tempData->row()->lastname;
				$merchant_id    = $tempData->row()->merchant_id;
				$email 		    = $tempData->row()->email;
				$phone 		    = $tempData->row()->phone;
				$ptxnID 	    = $tempData->row()->ptxnID;
				$currency 	    = $tempData->row()->currency;
				$address        = $tempData->row()->address;
				$city           = $tempData->row()->city;
				$state          = $tempData->row()->state;
				$country        = $tempData->row()->country;
				$cardNo         = $tempData->row()->cardNo;
				$cardholdername = $tempData->row()->cardholdername;
				$expirymonth    = $tempData->row()->expirymonth;
				$expiryyear     = $tempData->row()->expiryyear;
				$cardCVC        = $tempData->row()->cardCVC;
				$transactionId  = $tempData->row()->transactionId;
				$requestMode    = $tempData->row()->requestMode;
				$cardNo         = $this->encrypt->decode($cardNo);
				$cardCVC        = $this->encrypt->decode($cardCVC);
				
				$testApi_key    = $payment->row()->test_api;
				$liveApi_key    = $payment->row()->live_api;
				$test_secret    = $payment->row()->test_secret;
				$live_secret    = $payment->row()->live_secret;
				$test_url 	    = $payment->row()->test_url;
				$live_url 	    = $payment->row()->live_url;
				$tsn_charge     = $this->Common->get_col_by_key('users','users_id',$merchant_id,'transaction_charge');
				$merchant_fee   =  $amount*$tsn_charge/100;
				$fee            =  $amount*$payment_charge/100;
				$netAmt         = $amount-$merchant_fee;
				
				$tempData = [
					'netAmt'		=>$netAmt,
					'fee'			=>$fee,
					'merchant_fee'	=>$merchant_fee,
					'payment_id'	=>$paymentGatewayId,
					'encKey'		=>$temp_encrypt_key,
				];
				$cardExpire = $expiryyear.$expirymonth;
				$updateTemp = $this->v2_model->updateTempData($tempData);
				if($updateTemp>0){
					$callbackurl = 'http://localhost/cp/cps/merchant_callback/'.$payment_encrypt_key.'/'.$temp_encrypt_key;
				    $postData = [
                        'name'=>$firstname.' '.$lastname, 
                        'email'=>$email, 
                        'phone'=>$phone, 
                        'amount'=>$amount, 
                        'currency'=>$currency, 
                        'transaction_id'=>$ptxnID, 
                        'order_number'=>$ptxnID, 
                        'back_url'=>$callbackurl,
            			'requestMode'=>$requestMode,
            			'cardNo'=>$cardNo,
            			'cardExpire'=>$cardExpire,
            			'cardCVC'=>$cardCVC
                    ];
                    // print_r($postData);
                    $url = $live_url; 
                    $header_data = [
                    'api-key: '.$liveApi_key.'',
                    'api-secret: '.$live_secret.'',
                    'Content-Type: application/json',
                      ];
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_POST, 1);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($curl, CURLOPT_HTTPHEADER,$header_data);
                    $response1 = curl_exec($curl);
                    curl_close($curl);
                    print_r($response1);
                    $responseData = json_decode($response1, TRUE);
                    // print_r($responseData);
                    
                    if(isset($responseData['status']) && $responseData['status'] == 'Success') {
                        // header("Location:".$responseData['redirect_3ds_url']);
                        $v =  $responseData['token'];
                        redirect("https://centpays.com/v2/ini_payment/".$v);
                    }else{
						$this->response([ 'status' => FALSE, 'message' =>$responseData['message'],'errors' =>[$responseData['message']]], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
                    }
				}else{
					$this->response([ 'status' => FALSE, 'message' =>'Your data not match.','errors' =>['Your data does not match.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
				}
            }else{
				$this->response([ 'status' => FALSE, 'message' =>'Invalid Token.','errors' =>['Invalid Token.']], REST_Controller::HTTP_NOT_ACCEPTABLE,'','error');
            }
	    }else{
			$this->response([ 'status' => FALSE, 'message' =>'Bad request.','errors' =>['Bad request.']], REST_Controller::HTTP_BAD_REQUEST,'','error');
	    }
	}
	// Merchant callback function
	public function merchant_callback($payment_encrypt_key='',$temp_encrypt_key='',$msg=''){
		 $isForm = 0;
		if($param1=='om2odH7WsxNf72uhgZIUGARln'){ 
			if(isset($_POST['status']) && isset($_POST['Transaction_id'])){
			    
			$mtxn_id = $this->Common->get_col_by_key('tempRequest','ptxnID',$_POST['Transaction_id'],'transactionId');
			$backUrl = $this->Common->get_col_by_key('tempRequest','ptxnID',$_POST['Transaction_id'],'callbackurl');
			$transaction_status = $_POST['status'];
			$transaction_message = $_POST['message'];
			
			if($transaction_status == 'Success'){
				$status = 'Success';
				$message = $transaction_message;//'Transaction Completed Successfully.';
			}elseif($transaction_status == 'Failed'){
				$status = 'Failed';
				$message = $transaction_message;//'Transaction Failed.';
			}elseif($transaction_status == 'In Progress'){
				$status = 'In Progress';
				$message = $transaction_message;//'In Progress Transaction.';
			}
			else{
				$status = 'Droped';
				$message = $transaction_message;//'Transaction Droped.';
			}
			$isForm  = 1;
			}	
		}
		$form = '';
		 if($isForm >0){
			echo $this->v2_model->sendCallback($backUrl,$mtxn_id,$status,$message);
		} 
			
	}
	// Merchant callback end
	
	public function webhook($param1=''){
		
		$isForm = 0;
		if($param1=='om2odH7WsxNf72uhgZIUGARln'){ 
			$jsonString = file_get_contents("php://input");
			$object = json_decode($jsonString);
			$array = json_decode(json_encode($object), true);
			$webhook['name'] = $jsonString;
			$webhook['date'] = date('Y-m-d H:i:s');
			$this->db->insert('testWebhook',$webhook);
// 			exit();
			
			$amount 	= $array['amount'];
			$transactionId 	= $array['transaction_id'];
			$type 		= $array['mode'];
			$message 	= $array['message'];
			$transaction_status = $array['status'];
			$merchant_reference	 = $array['transaction_id'];
			$currency 	=  $array['currency'];
			
			if(!empty($merchant_reference)){
				$getTempData = $this->v2_model->getTempDataByPtxnid($merchant_reference);
				if($getTempData->num_rows()>0){
					
					$tempData		= $getTempData->result();
					$merchant_id 	= $tempData[0]->merchant_id;
					$tem_transactionId = $tempData[0]->transactionId;
					$tempId 		= $tempData[0]->id;
					$temp_email 	= $tempData[0]->email;
					$merchant_fee 	= $tempData[0]->merchant_fee;
					$phone 			= $tempData[0]->phone;
					$firstname 	    = $tempData[0]->firstname;
					$lastname 		= $tempData[0]->lastname;
					$mid            = $tempData[0]->mid;
					
					$netAmt = $amount-$merchant_fee;
					if($transaction_status == 'Success'){
						$status = 'Success';
					}elseif($transaction_status == 'Failed'){
						$status = 'Failed';
					}elseif($transaction_status == 'In Progress'){
						$status = 'In Progress';
					}else{
						$status = 'Droped';
					}
					$isForm = 1;
				}
			}
		}
	
		if($isForm>0){
			
			$orderData = [
					'merchant_fee'	=>$merchant_fee,
					'netAmt'		=>$netAmt,
					'transactionId'	=>$transactionId,
					'currency'		=>$currency,
					'email'			=>$temp_email,
					'mode'			=>$type,
					'order_key'		=>$transactionId,
					'status'		=>$status,
					'merchant_id'	=>$merchant_id,
					'mtxnID'		=>$tem_transactionId,
					'message'		=>$message,
					'tempId'		=>$tempId,
					'phone'			=>$phone,
					'firstname'	    =>$firstname,
					'lastname'		=>$lastname,
				];
				
				//print_r($orderData);

			$result = $this->v2_model->saveOrderData($orderData);
		//print_r($orderData);
			if($result){
				$webhook['name'] = $jsonString;
				$webhook['date'] = date('Y-m-d H:i:s');
				$this->db->insert('testWebhook',$webhook);
				$getWebhook = $this->v2_model->getWebhookUrl($merchant_id,$mid);
				if($getWebhook->num_rows()>0){
					$webhook_url = $getWebhook->row()->webhook_url;
					$webhookResponse = [
						'transactionId'	=>$tem_transactionId,
						'status'		=>$status,
						'amount'		=>$amount,
						'currency'		=>$currency,
						'email'			=>$temp_email,
						'mode'			=>$type,
						'phone'			=>$phone,
						'firstname'	    =>$firstname,
						'lastname'		=>$lastname,
						'message'		=>$message,
					];
					$merchantResponse = $this->v2_model->setResponseString($webhookResponse);
					$url = $webhook_url;
					$post_data = json_encode($merchantResponse);
					$headers = [
					 'Content-Type: application/json',
					];
					$curl = curl_init($url);                                                                            
					curl_setopt($curl, CURLOPT_POST, true);                                                             
					curl_setopt($curl, CURLOPT_POSTFIELDS,$post_data);                                    
					curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
					$response = curl_exec($curl);  
					curl_close($curl);
					
					$merchantWebHook['name'] = $post_data;
					$merchantWebHook['date'] = date('Y-m-d H:i:s');
					$this->db->insert('merchantWebhook',$merchantWebHook);
				}
			}
		}
		
	}
	
}   	   
?>