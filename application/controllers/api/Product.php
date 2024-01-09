<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Product extends REST_Controller {

    public function __construct() {
        $this->cors_header();
        parent::__construct();
        $this->load->model('product_model');
    }

    // Product start
    public function product_list_post($id='') {
        $getTokenData = $this->is_authorized('superadmin');
        $filterData = json_decode($this->input->raw_input_stream, true);
        $final = array();
        $final['status'] = true;
        $final['data'] = $this->product_model->get($id,$filterData);
        $final['message'] = 'Product fetched successfully.';
        $this->response($final, REST_Controller::HTTP_OK);
    }

    public function product_post($params='') {
        if($params=='add') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];

            $_POST = json_decode($this->input->raw_input_stream, true);

            // set validation rules
            $this->form_validation->set_rules('name', 'Product Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('short_name', 'Product Short Name', 'trim|alpha_numeric_spaces');
            $this->form_validation->set_rules('product_code', 'Product Code', 'trim');
            $this->form_validation->set_rules('barcode', 'Barcode', 'trim');

            if ($this->form_validation->run() === false) {
                $array_error = array_map(function ($val) {
                    return str_replace(array("\r", "\n"), '', strip_tags($val));
                }, array_filter(explode(".", trim(strip_tags(validation_errors())))));

                $this->response([
                    'status' => FALSE,
                    'message' =>'Error in submit form',
                    'errors' =>$array_error
                ], REST_Controller::HTTP_BAD_REQUEST,'','error');
            } else {
				
                $name = $this->input->post('name');
                if (!empty($name)) {
                    $data['name'] = $name;
                }
				$short_name = $this->input->post('short_name');
                if (!empty($short_name)) {
                    $data['short_name'] = $short_name;
                }
				$product_code = $this->input->post('product_code');
                if (!empty($product_code)) {
                    $data['product_code'] = $product_code;
                }
				$barcode = $this->input->post('barcode');
                if (!empty($barcode)) {
                    $data['barcode'] = $barcode;
                }
				$category_id = $this->input->post('category_id');
                if (!empty($category_id)) {
                    $data['category_id'] = $category_id;
                }
				$subcategory_id = $this->input->post('subcategory_id');
                if (!empty($subcategory_id)) {
                    $data['subcategory_id'] = $subcategory_id;
                }
				$brand_id = $this->input->post('brand_id');
                if (!empty($brand_id)) {
                    $data['brand_id'] = $brand_id;
                }
				$unit_id = $this->input->post('unit_id');
                if (!empty($unit_id)) {
                    $data['unit_id'] = $unit_id;
                }
				$billing_unit_id = $this->input->post('billing_unit_id');
                if (!empty($billing_unit_id)) {
                    $data['billing_unit_id'] = $billing_unit_id;
                }
				$gst = $this->input->post('gst');
                if (!empty($gst)) {
                    $data['gst'] = $gst;
                }
				$sku = $this->input->post('sku');
                if (!empty($sku)) {
                    $data['sku'] = $sku;
                }
				$type = $this->input->post('type');
                if (!empty($type)) {
                    $data['type'] = $type;
                }
				///image 
				if(!empty($_POST['image'])){
					$base64_image = $_POST['image'];
					$quality = 90;
					$radioConfig = [
					'resize' => [
					'width' => 500,
					'height' => 300
					]
				// Add more configurations as needed
					 ];
					$uploadFolder = 'product'; // Change this to your desired folder name

					$data['image'] = $this->upload_media->upload_and_save($base64_image, $quality, $radioConfig, $uploadFolder);
				}
				if(!empty($_POST['image2'])){
					$base64_image = $_POST['image2'];
					$quality = 90;
					$radioConfig = [
					'resize' => [
					'width' => 500,
					'height' => 300
					]
				// Add more configurations as needed
					 ];
					$uploadFolder = 'product'; // Change this to your desired folder name

					$data['image2'] = $this->upload_media->upload_and_save($base64_image, $quality, $radioConfig, $uploadFolder);
				}
				////image  
                $data['status'] = 'Active';
                $data['added'] = date('Y-m-d H:i:s');
                $data['addedBy'] = $session_id;

                if ($res = $this->product_model->create($data)) {
            
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->product_model->get($res);
                    $final['message'] = 'Product created successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    $this->response([ 'status' => FALSE,
                        'message' =>'Error in submit form',
                        'errors' =>[$this->db->error()]], REST_Controller::HTTP_BAD_REQUEST,'','error');
                }
            }
        }
        // method for updating Product
        if ($params == 'update') {
            $getTokenData = $this->is_authorized('superadmin');
            $usersData = json_decode(json_encode($getTokenData), true);
            $session_id = $usersData['data']['users_id'];
        
            $_POST = json_decode($this->input->raw_input_stream, true);
        
            // set validation rules
			$this->form_validation->set_rules('name', 'Product Name', 'trim|required|alpha_numeric_spaces');
            $this->form_validation->set_rules('short_name', 'Product Short Name', 'trim|alpha_numeric_spaces');
            $this->form_validation->set_rules('product_code', 'Product Code', 'trim');
            $this->form_validation->set_rules('barcode', 'Barcode', 'trim');
            if ($this->form_validation->run() === false) {
                $array_error = array_map(function ($val) {
                    return str_replace(array("\r", "\n"), '', strip_tags($val));
                }, array_filter(explode(".", trim(strip_tags(validation_errors())))));
        
                $this->response([
                    'status' => FALSE,
                    'message' => 'Error in submit form',
                    'errors' => $array_error
                ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
            } else {
				
                $name = $this->input->post('name');
                if (!empty($name)) {
                    $data['name'] = $name;
                }
				$short_name = $this->input->post('short_name');
                if (!empty($short_name)) {
                    $data['short_name'] = $short_name;
                }
				$product_code = $this->input->post('product_code');
                if (!empty($product_code)) {
                    $data['product_code'] = $product_code;
                }
				$barcode = $this->input->post('barcode');
                if (!empty($barcode)) {
                    $data['barcode'] = $barcode;
                }
				$category_id = $this->input->post('category_id');
                if (!empty($category_id)) {
                    $data['category_id'] = $category_id;
                }
				$subcategory_id = $this->input->post('subcategory_id');
                if (!empty($subcategory_id)) {
                    $data['subcategory_id'] = $subcategory_id;
                }
				$brand_id = $this->input->post('brand_id');
                if (!empty($brand_id)) {
                    $data['brand_id'] = $brand_id;
                }
				$unit_id = $this->input->post('unit_id');
                if (!empty($unit_id)) {
                    $data['unit_id'] = $unit_id;
                }
				$billing_unit_id = $this->input->post('billing_unit_id');
                if (!empty($billing_unit_id)) {
                    $data['billing_unit_id'] = $billing_unit_id;
                }
				$gst = $this->input->post('gst');
                if (!empty($gst)) {
                    $data['gst'] = $gst;
                }
				$sku = $this->input->post('sku');
                if (!empty($sku)) {
                    $data['sku'] = $sku;
                }
				$type = $this->input->post('type');
                if (!empty($type)) {
                    $data['type'] = $type;
                }
                $status = $this->input->post('status');
                if (!empty($status)) {
                    $data['status'] = $status;
                }
        
                $data['updatedBy'] = $session_id;
                $data['updated'] = date('Y-m-d H:i:s');
                $id = $this->input->post('id');
				///image 
				if(!empty($_POST['image'])){
					$base64_image = $_POST['image'];
					$quality = 90;
					$radioConfig = [
					'resize' => [
					'width' => 500,
					'height' => 300
					]
				// Add more configurations as needed
					 ];
					$uploadFolder = 'product'; // Change this to your desired folder name

					$data['image'] = $this->upload_media->upload_and_save($base64_image, $quality, $radioConfig, $uploadFolder);
					
					$imgData = $this->db->get_where('product',array('id'=>$id));
					if($imgData->num_rows()>0){
						$img =  $imgData->row()->image;
						if(file_exists($img) && !empty($img))
						{
							unlink($img);		
						}
					}
				}
				if(!empty($_POST['image2'])){
					$base64_image = $_POST['image2'];
					$quality = 90;
					$radioConfig = [
					'resize' => [
					'width' => 500,
					'height' => 300
					]
				// Add more configurations as needed
					 ];
					$uploadFolder = 'product'; // Change this to your desired folder name

					$data['image2'] = $this->upload_media->upload_and_save($base64_image, $quality, $radioConfig, $uploadFolder);
					
					$imgData2 = $this->db->get_where('product',array('id'=>$id));
					if($imgData2->num_rows()>0){
						$img2 =  $imgData2->row()->image2;
						if(file_exists($img2) && !empty($img2))
						{
							unlink($img2);		
						}
					}
				}
				////image  
                $res = $this->product_model->update($data, $id);
        
                if ($res) {
                    $final = array();
                    $final['status'] = true;
                    $final['data'] = $this->product_model->get($id);
                    $final['message'] = 'Product updated successfully.';
                    $this->response($final, REST_Controller::HTTP_OK);
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'There was a problem updating Product. Please try again',
                        'errors' => [$this->db->error()]
                    ], REST_Controller::HTTP_BAD_REQUEST, '', 'error');
                }
            }
        }
    }

    public function product_delete($id) {
        $this->is_authorized('superadmin');
        $response = $this->product_model->delete($id);

        if ($response) {
            $this->response(['status' => true, 'message' => 'Product deleted successfully.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Not deleted'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
