<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @extends CI_Model
 */
class Merchant_payment_link extends CI_Model {

	protected $table      = 'merchant_payment_link';
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
	
	public function create($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id(); 
	}
	
	public function update($data, $id)
    {
        $response = $this->db->update($this->table, $data, array($this->primaryKey=>$id));
		return $this->db->affected_rows();
    }
	
	public function delete($id)
    {
        $this->db->delete($this->table, array($this->primaryKey=>$id));
        return $this->db->affected_rows();
    }
	public function get($id='',$filterData=''){
		$this->db->select("$this->table.*,(users.name) as merchant_name,(payment_gateway.name) as payment_gateway_name");
		$this->db->from($this->table);
		$this->db->join('users',"users.users_id=$this->table.merchant_id");
		$this->db->join('payment_gateway',"payment_gateway.id=$this->table.payment_id",'left');
		if(!empty($id)){
			$this->db->where($this->table.'.'.$this->primaryKey,$id);
		}
		if(isset($filterData['mid']) && !empty($filterData['mid'])){
			$this->db->like($this->table.'.'.'mid',$filterData['mid']);
		}
		if(isset($filterData['merchant_id']) && !empty($filterData['merchant_id'])){
			$this->db->where($this->table.'.'.'merchant_id',$filterData['merchant_id']);
		}
		if(isset($filterData['payment_id']) && !empty($filterData['payment_id'])){
			$this->db->where($this->table.'.'.'payment_id',$filterData['payment_id']);
		}
		if(isset($filterData['status']) && !empty($filterData['status'])){
			$this->db->where($this->table.'.'.'status',$filterData['status']);
		}
		if(isset($filterData['from_date']) && !empty($filterData['from_date'])){
			$from_date = date('Y-m-d',strtotime($filterData['from_date']));
			$this->db->where('CAST('.$this->table.'.'.'added AS DATE)>=',$from_date);
		}
		if(isset($filterData['to_date']) && !empty($filterData['to_date'])){
			$to_date = date('Y-m-d',strtotime($filterData['to_date']));
			$this->db->where('CAST('.$this->table.'.'.'added AS DATE)<=',$to_date);
		}
		if(isset($filterData['currency']) && !empty($filterData['currency'])){
			$this->db->where('find_in_set("'.$filterData['currency'].'", '.$this->table.'.currency) <> 0');
		}
		if(isset($filterData['cards']) && !empty($filterData['cards'])){
			$this->db->where('find_in_set("'.$filterData['cards'].'", '.$this->table.'.cards) <> 0');
		}
		return $this->db->get()->result();
		
	}
	
}
