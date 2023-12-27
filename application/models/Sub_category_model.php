<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_category_model extends CI_Model {

    protected $table      = 'sub_category';
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

    public function update($data, $id) {
        $response = $this->db->update($this->table, $data, array($this->primaryKey=>$id));
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->delete($this->table, array($this->primaryKey=>$id));
        return $this->db->affected_rows();
    }

    public function get($id='',$filterData='') {
        $this->db->select("$this->table.*,(category.name) as category_name");
        $this->db->from($this->table);
		$this->db->join('category',"category.id=$this->table.category_id");
        if(!empty($id)) {
            $this->db->where($this->table.'.'.$this->primaryKey, $id);
        }

        if(isset($filterData['name']) && !empty($filterData['name'])){
            $this->db->like("$this->table.name",$filterData['name']);
        }

        if(isset($filterData['category_id']) && !empty($filterData['category_id'])){
            $this->db->where("$this->table.category_id",$filterData['category_id']);
        }

        if(isset($filterData['status'])){
            $this->db->where("$this->table.status",$filterData['status']);
        } 
        return $this->db->get()->result();
    }

	public function parent_sub_category($id='') {
		$this->db->select("$this->table.*,(category.name) as category_name");
        $this->db->from($this->table);
		$this->db->join('category',"category.id=$this->table.category_id");
        if(!empty($id)) {
            $this->db->where($this->table.'.'.'category_id', $id);
        }
        return $this->db->get()->result();
    }
}
