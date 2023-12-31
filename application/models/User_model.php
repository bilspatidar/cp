<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {

	protected $table      = 'users';
	protected $primaryKey = 'users_id';
	protected $merchant_keys = 'merchant_keys';
	protected $merchant_id = 'merchant_id';
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
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($data) {
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
	
	public function get($user_type,$id='',$filterData=''){
		if($user_type=='merchant'){
			$this->db->select("$this->table.users_id,$this->table.name,$this->table.email,$this->table.mobile,$this->table.password,$this->table.company_name,$this->table.postal_code,$this->table.country_id,$this->table.state_id,$this->table.city_id,$this->table.street_address,$this->table.street_address2,$this->table.business_type_id,$this->table.business_category_id,$this->table.business_subcategory_id,$this->table.skypeID,$this->table.websiteURL,$this->table.business_registered,$this->table.user_type,$this->table.merchant_pay_in_charge,$this->table.merchant_pay_out_charge,$this->table.settelment_charge,$this->table.turnover,$this->table.chargeback_percentage,$this->merchant_keys.api_key,$this->merchant_keys.mid,$this->table.status,$this->table.added,$this->table.addedBy");
		}else{
			$this->db->select("$this->table.users_id,$this->table.name,$this->table.email,$this->table.mobile,$this->table.user_type,$this->table.status,$this->table.added,$this->table.addedBy");
		}
		$this->db->from($this->table);
		if($user_type=='merchant'){
			$this->db->join($this->merchant_keys,"$this->merchant_keys.$this->merchant_id=$this->table.$this->primaryKey");
		}
		$this->db->where("$this->table.user_type",$user_type);
		if(!empty($id)){
			$this->db->where($this->table.'.'.$this->primaryKey,$id);
		}
		if(isset($filterData['name']) && !empty($filterData['name'])){
			$this->db->like($this->table.'.'.'name',$filterData['name']);
			$this->db->or_like($this->table.'.'.'email',$filterData['name']);
			$this->db->or_like($this->table.'.'.'mobile',$filterData['name']);
		}
		if(isset($filterData['business_type_id']) && !empty($filterData['business_type_id'])){
			$this->db->where($this->table.'.'.'business_type_id',$filterData['business_type_id']);
		}
		if(isset($filterData['business_category_id']) && !empty($filterData['business_category_id'])){
			$this->db->where($this->table.'.'.'business_category_id',$filterData['business_category_id']);
		}
		if(isset($filterData['business_subcategory_id']) && !empty($filterData['business_subcategory_id'])){
			$this->db->where($this->table.'.'.'business_subcategory_id',$filterData['business_subcategory_id']);
		}
		if(isset($filterData['city_id']) && !empty($filterData['city_id'])){
			$this->db->where($this->table.'.'.'city_id',$filterData['city_id']);
		}
		if(isset($filterData['state_id']) && !empty($filterData['state_id'])){
			$this->db->where($this->table.'.'.'state_id',$filterData['state_id']);
		}
		if(isset($filterData['country_id']) && !empty($filterData['country_id'])){
			$this->db->where($this->table.'.'.'country_id',$filterData['country_id']);
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
		$this->db->order_by($this->table.'.'.$this->primaryKey,'desc');
		return $this->db->get()->result();
		
	}
	public function profile_list_get($id=''){
		
		$this->db->select("$this->table.users_id,$this->table.name,$this->table.email,$this->table.mobile,$this->table.company_name,$this->table.address,$this->table.profile_pic,$this->table.user_type,$this->table.status");
		
		$this->db->from($this->table);
		if(!empty($id)){
			$this->db->where($this->table.'.'.$this->primaryKey,$id);
		}
		$this->db->order_by($this->table.'.'.$this->primaryKey,'desc');
		return $this->db->get()->result();
		
	}
	
	public function delete_merchant($id)
    {
        $res = $this->db->delete($this->table, array($this->primaryKey=>$id));
		if($res){
			$this->db->delete($this->merchant_keys, array($this->merchant_id=>$id));
		}
        return $this->db->affected_rows();
    }
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($username, $password) {
		
		$this->db->select('email,password');
		$this->db->from('users');
		$this->db->where('email',$username);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password,$hash);
		
	}
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($email) {
		
		$this->db->select('users_id');
		$this->db->from('users');
		$this->db->where('email', $email);

		return $this->db->get()->row('users_id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		
		$this->db->from('users');
		$this->db->where('users_id', $user_id);
		return $this->db->get()->row();
		
	}
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
	
}
