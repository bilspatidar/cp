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

    public function get($id='') {
        $this->db->select("$this->table.*,(category.name) as category_name");
        $this->db->from($this->table);
		$this->db->join('category',"category.id=$this->table.category_id");
        if(!empty($id)) {
            $this->db->where($this->table.'.'.$this->primaryKey, $id);
        }
        return $this->db->get()->result();
    }
}
