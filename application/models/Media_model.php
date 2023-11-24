<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends CI_Model {
  
    /**
     * CONSTRUCTOR | LOAD DB
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }

    /**
     * SHOW | GET method.
     *
     * @return Response
    */
	public function show($id = 0,$category_id='',$limit='')
	{
		 if(!empty($limit) && $limit>0){
			 $this->db->limit($limit);
		 }
        if(!empty($id)){
            $query = $this->db->get_where("sub_categories",array('id'=>$id,'status'=>'Active','category_id'=>$category_id,'isDelete'=>0))->row_array();
        }else{
            $query = $this->db->get_where("sub_categories",array('status'=>'Active','category_id'=>$category_id,'isDelete'=>0))->result();
        }
        return $query;
	}
      
	public function get_media($id ='',$keyword ='',$limit='',$tranding='')
	{
		 $this->db->select('*');
			$this->db->from('media');
			$this->db->where('status','Active');	
			$this->db->where('isDelete','0');		
		 if(!empty($limit) && $limit>0){
			 $this->db->limit($limit);
		 }
		 if(!empty($keyword)){
			 $this->db->like('name',$keyword);
		 }
		 if(!empty($tranding) && $tranding==1){
			 $this->db->where('isTrending',1);
		 }
		 $this->db->order_by('rand()');
        if(!empty($id)){
			
			$this->db->where('find_in_set("'.$id.'", sub_category_id) <> 0'); 
			
            //$query = $this->db->get_where("media",array('sub_category_id'=>$id,'status'=>'Active'))->result();
        }
		            $query = $this->db->get()->result();

        return $query;
	}
	
	
	public function get_streaming($id = '',$limit='',$tranding='')
	{
		 $this->db->select('rtmp1 as url,rtmp2 as message,status');
			$this->db->from('live_streaming');
			//$this->db->where('status','Active');	
			$this->db->where('isDelete','0');		
		    $query = $this->db->get()->result();
			return $query;
	}
	
	public function save_suscriber($email)
	{
		 $this->db->select('email');
			$this->db->from('suscriber_list');
			$this->db->where('email',$email);	
		    $query = $this->db->get();
			if($query->num_rows()<1){
			 $data['email'] = $email;
			 $data['added'] = date('Y-m-d H:i:s');
			 $this->db->insert('suscriber_list',$data);	
			}
			
			return true;
	}
	
	
	
    /**
     * INSERT | POST method.
     *
     * @return Response
    */
    public function insert($data)
    {
        $this->db->insert('products',$data);
        return $this->db->insert_id(); 
    } 
     
    /**
     * UPDATE | PUT method.
     *
     * @return Response
    */
    public function update($data, $id)
    {
        $data = $this->db->update('products', $data, array('id'=>$id));
        //echo $this->db->last_query();
		return $this->db->affected_rows();
    }
     
    /**
     * DELETE method.
     *
     * @return Response
    */
    public function delete($id)
    {
        $this->db->delete('products', array('id'=>$id));
        return $this->db->affected_rows();
    }
	
	
	public function get_home_slider(){
   $this->db->select("*");
   $this->db->from("slider");
   $this->db->where('status','Active');
   $this->db->where('isDelete',0);
   $this->db->order_by('id','desc');
   $this->db->limit(1);
   $data = $this->db->get();
    if($data->num_rows()>0){
   $result=$data->result();
   $File = $result[0]->video; $load_url = 'uploads/slider/'.$File;
                  if(!empty($File) && file_exists($load_url))
                   { 
                      return $vurl = base_url().$load_url;
                   }
				   else{
					   return '';
				   }
   }
   else {
	   return '';
   }
   
	}
}
