<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @extends CI_Model
 */
class Merchant_keys_model extends CI_Model {

	protected $table      = 'merchant_keys';
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
		$this->db->select("$this->table.*,(users.name) as merchant_name");
		$this->db->from($this->table);
		$this->db->join('users',"users.users_id=$this->table.merchant_id");
		if(!empty($id)){
			$this->db->where($this->table.'.'.$this->primaryKey,$id);
		}
		if(isset($filterData['title']) && !empty($filterData['title'])){
			$this->db->like($this->table.'.'.'title',$filterData['title']);
		}
		if(isset($filterData['merchant_id']) && !empty($filterData['merchant_id'])){
			$this->db->where($this->table.'.'.'merchant_id',$filterData['merchant_id']);
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
		return $this->db->get()->result();
		
	}
	public function generateMid()
    {
		$mid = 'MID-';
        $this->db->select("title");
		$this->db->from($this->table);
		$check = $this->db->get();
		if($check->num_rows()>0){
			$title = $check->row()->title;
			$generateMid = $mid.rand(10,100);
			if($title==$generateMid){
				return $mid.rand(10,100);
			}else{
				return $generateMid;
			}
		}else{
			return $mid.'1';
		}
    }
	
	
}
