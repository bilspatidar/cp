<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

    protected $table      = 'transaction';
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

    public function getTransactionById($id) {
        // Your logic to fetch details for a specific transaction ID
        $this->db->where('id', $id);
        $query = $this->db->get('transaction');

        $result = $query->result();
    
        if ($query->result()) {
            return $query->row();
        } else {
            return false; 
        }
    }
    

    public function getTransaction($filterData) {
        $this->db->select("*");
        $this->db->from($this->table);
        if(!empty($id)) {
            $this->db->where($this->primaryKey, $id);
        }

        if(isset($filterData['id']) && !empty($filterData['id'])){
			$this->db->like('id',$filterData['id']);
		}

        if(isset($filterData['merchant_id']) && !empty($filterData['merchant_id'])){
			$this->db->like('merchant_id',$filterData['merchant_id']);
		}

        if(isset($filterData['transaction_datetime']) && !empty($filterData['transaction_datetime'])){
			$this->db->like('transaction_datetime',$filterData['transaction_datetime']);
		}

        if(isset($filterData['payment_id']) && !empty($filterData['payment_id'])){
			$this->db->like('payment_id',$filterData['payment_id']);
		}

        
        if(isset($filterData['status']) && !empty($filterData['status'])){
			$this->db->like('status',$filterData['status']);
		}

        return $this->db->get()->result();
    }

   
}
