<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {

    protected $table      = 'invoice';
    protected $parentTable= 'invoice_items';
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
	public function insert_invoice_items($data) {
        $this->db->insert($this->parentTable, $data);
        return $this->db->insert_id(); 
    }

    public function update($data, $id) {
        $response = $this->db->update($this->table, $data, array($this->primaryKey=>$id));
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->delete($this->table, array($this->primaryKey=>$id));
        $this->db->delete($this->parentTable, array('invoice_id'=>$id));
        return $this->db->affected_rows();
    }

    public function get($id='',$filterData='') {
        $this->db->select("$this->table.*,(payment_mode.name) as payment_mode_name,(users.name) as user_name");
        $this->db->from($this->table);
		$this->db->join('payment_mode',"payment_mode.id=$this->table.payment_mode_id",'left');
		$this->db->join('users',"users.users_id=$this->table.users_id",'left');
        if(!empty($id)) {
            $this->db->where($this->table.'.'.$this->primaryKey, $id);
        }
		if(isset($filterData['invoice_number']) && !empty($filterData['invoice_number'])){
			$this->db->like("$this->table.invoice_number",$filterData['invoice_number']);
		}
		if(isset($filterData['invoice_type']) && !empty($filterData['invoice_type'])){
			$this->db->like("$this->table.invoice_type",$filterData['invoice_type']);
		}
		if(isset($filterData['payment_mode_id']) && !empty($filterData['payment_mode_id'])){
			$this->db->where("$this->table.payment_mode_id",$filterData['payment_mode_id']);
		}
		if(isset($filterData['users_id']) && !empty($filterData['users_id'])){
			$this->db->where("$this->table.users_id",$filterData['users_id']);
		}
		if(isset($filterData['from_date']) && !empty($filterData['from_date'])){
			$from_date = date('Y-m-d',strtotime($filterData['from_date']));
			$this->db->where("CAST($this->table.added AS DATE)>=",$from_date);
		}
		if(isset($filterData['to_date']) && !empty($filterData['to_date'])){
			$to_date = date('Y-m-d',strtotime($filterData['to_date']));
			$this->db->where("CAST($this->table.added AS DATE)<=",$to_date);
		}
		$this->db->order_by($this->table.'.'.$this->primaryKey,'desc');
        return $this->db->get()->result();
    }
	public function generateInvoiceNo($invoice_type){
		$this->db->select('invoice_number');
		$this->db->from($this->table);
		$this->db->where('invoice_type',$invoice_type);
		$this->db->order_by('id','desc');
		$check = $this->db->get();
		if($check->num_rows()>0){
			$invoice_number = $check->row()->invoice_number+1;
		}else{
			if($invoice_type=='voucher'){
				$invoice_number = VOUCHER_SRNO;
			}else{
				$invoice_number = GST_SRNO;
			}
		}
		return $invoice_number;
	}
	
	public function invoice_details($invoice_id=''){
		$this->db->select("$this->parentTable.*,(product.name) as product_name");
		$this->db->from($this->parentTable);
		$this->db->join('product',"product.id=$this->parentTable.product_id",'left');
		if(!empty($invoice_id)) {
            $this->db->where($this->parentTable.'.invoice_id', $invoice_id);
        }
		$this->db->order_by("$this->parentTable.id",'desc');
		return $this->db->get()->result();
	}
}
