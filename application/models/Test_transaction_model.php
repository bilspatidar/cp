<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_transaction_model extends CI_Model {

    protected $table      = 'test_transactions';
    protected $primaryKey = 'id';

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }

    public function getTransaction($id='',$filterData='') {
        $this->db->select("$this->table.*,(users.name) as merchant_name");
        $this->db->from($this->table);
		$this->db->join('users',"users.users_id=$this->table.merchant_id",'left');
         if(!empty($id)) {
            $this->db->where($this->table.'.'.$this->primaryKey, $id);
        }

        if(isset($filterData['payment_transaction_id']) && !empty($filterData['payment_transaction_id'])){
			$this->db->like($this->table.'.payment_transaction_id',$filterData['payment_transaction_id']);
		}
		if(isset($filterData['merchant_transaction_id']) && !empty($filterData['merchant_transaction_id'])){
			$this->db->like($this->table.'.merchant_transaction_id',$filterData['merchant_transaction_id']);
		}

        if(isset($filterData['merchant_id']) && !empty($filterData['merchant_id'])){
			$this->db->where($this->table.'.merchant_id',$filterData['merchant_id']);
		}
		if(isset($filterData['from_date']) && !empty($filterData['from_date'])){
			$from_date = date('Y-m-d',strtotime($filterData['from_date']));
			$this->db->where('CAST('.$this->table.'.'.'initiated_datetime AS DATE)>=',$from_date);
		}
		if(isset($filterData['to_date']) && !empty($filterData['to_date'])){
			$to_date = date('Y-m-d',strtotime($filterData['to_date']));
			$this->db->where('CAST('.$this->table.'.'.'initiated_datetime AS DATE)<=',$to_date);
		}
        if(isset($filterData['status']) && !empty($filterData['status'])){
			$this->db->where($this->table.'.transaction_status',$filterData['status']);
		}
		$this->db->order_by($this->table.'.'.$this->primaryKey,'desc');
        return $this->db->get()->result();
    }

   
}
