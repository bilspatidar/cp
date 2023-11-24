<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdlroll extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	function get_roll()
	{
		return $this->db->get('roll')->result_array();
	}
	
	
	function get_roll_by_id($roll_id)
	{
		return $this->db->get_where('roll',array('roll_id'=>$roll_id))->result_array();
	}
	  
	public function get_recent_orders($isFilter,$limit,$start){
	    
       
     $user_type = getUser('user_type');  
     $user_id = getUser('users_id');
     
    $this->db->select('orders.payment_method,order_items.id,order_items.paid_amount,order_items.date_added,order_items.users_id,order_items.product_name,order_items.orderNo,order_items.quantity,order_items.price,order_items.seller_id');
    $this->db->from("order_items");
	 $this->db->join('orders','order_items.order_id = orders.id');
     $this->db->order_by('order_items.id','desc');
     if($user_type == 'seller'){
        $this->db->where('order_items.seller_id',$user_id);
    }
 
     if($isFilter=='yes'){
     $query = $this->db->get();
     return $query->num_rows();
     }
     else{
     $this->db->limit($limit,$start);
     $query = $this->db->get();
     $output   = '';
     $output .='
     <table class="table table-bordered datatable" id="datatable1" style="width:100%;overflow:auto;">
     <thead>
     <tr>
     <th>Sr. No.</th>
     <th>Customer</th>
	 <th>Seller</th>
     <th>Product Name</th>
     <th>Order No</th>
     <th>Quantity</th>
     <th>Price</th>
     <th>Sub Total</th>
	 <th>Paid Amount</th>
	 <th>Order Date</th>
	 <th>Payment Mode</th>
     <th>Status</th>
     </tr>
     </thead>
     <tbody>';
     $sr = $start+1;
	 $sum=0;
	 $paidSum=0;
     $result = $query->result();
     foreach($result as $row)
     {
     $id          = $row->id;
     $order_item_id   = $id;
    
    $status = $this->Common->fetchOrderStatus($id);
    
    $customerName = $this->Common->get_col_by_key('users','users_id',$row->users_id,'name');
	$sellerName = $this->Common->get_col_by_key('users','users_id',$row->seller_id,'name');
	$businessName = $this->Common->get_col_by_key('users','users_id',$row->seller_id,'businessName');
	if(!empty($businessName)){
		$sName = $businessName;
	}else{
		$sName = $sellerName;
	}
	
	$orderDetailsUrl = base_url().'transaction/order_details/'.$id.'/'.$row->orderNo;
	$orderDetails = '<a href="'.$orderDetailsUrl.'">'.$row->orderNo.'</a>';
	$sub_total = $row->quantity*$row->price;
	$sum+=$sub_total;
	$paidSum+=$row->paid_amount;
     $output .= '
     <tr>
     <td>'.$sr++.'</td>
     <td>'.$customerName.'</td>
     <td>'.$sName.'</td>
     <td>'.$row->product_name.'</td>
     <td>'.$orderDetails.'</td>
     <td>'.$row->quantity.'</td>
     <td>'.$row->price.'</td>
     <td>'.$sub_total.'</td>
	 <td>'.$row->paid_amount.'</td>
	 <td>'.getDateTimeFormat($row->date_added).'</td>
	 <td>'.$row->payment_method.'</td>
     <td>'.$status.'</td>
     </tr>
     ';
     }
  
     $output .= '<tfoot><th colspan="7">Total</th><td >'.number_format($sum,2).'</td><td colspan="4">'.number_format($paidSum,2).'</td></tfoot></tbody></table>';
     return $output;    
     }
   

	}

	
}