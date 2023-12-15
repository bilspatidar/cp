<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {

    protected $table      = 'cities';
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
        $this->db->select("$this->table.*,(states.name) as state_name");
        $this->db->from($this->table);
		$this->db->join('states',"states.id=$this->table.state_id");
        if(!empty($id)) {
            $this->db->where($this->table.'.'.$this->primaryKey, $id);
        }
        return $this->db->get()->result();
    }
	public function parent_city($id='') {
        $this->db->select("*");
        $this->db->from($this->table);
        if(!empty($id)) {
            $this->db->where('state_id', $id);
        }
        return $this->db->get()->result();
    }
}
