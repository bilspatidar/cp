<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @extends CI_Model
 */
class Card_model extends CI_Model {

	protected $table      = 'cards';
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
		$this->db->select("*");
		$this->db->from($this->table);
		if(!empty($id)){
			$this->db->where($this->primaryKey,$id);
		}
		if(isset($filterData['name']) && !empty($filterData['name'])){
            $this->db->like('name',$filterData['name']);
		}

        if(isset($filterData['status']) && !empty($filterData['status'])){
            $this->db->where('status',$filterData['status']);
        }
		$this->db->order_by($this->primaryKey,'desc');
		return $this->db->get()->result();
		
	}
}
