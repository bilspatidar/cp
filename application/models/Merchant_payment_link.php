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
	public function get($id=''){
		$this->db->select("$this->table.*,(users.name) as merchant_name,(payment_gateway.name) as payment_gateway_name");
		$this->db->from($this->table);
		$this->db->join('users',"users.users_id=$this->table.merchant_id");
		$this->db->join('payment_gateway',"payment_gateway.id=$this->table.payment_id",'left');
		if(!empty($id)){
			$this->db->where($this->table.'.'.$this->primaryKey,$id);
		}
		return $this->db->get()->result();
		
	}
	
}
