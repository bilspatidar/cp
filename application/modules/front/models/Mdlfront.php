<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdlfront extends CI_Model {

    function __construct() {
        parent::__construct();
     
    }
    
function auth_logins() {
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		
        $this->db->where('user_type','users');
    	$this->db->where('email',$username);
    	$this->db->or_where('mobile',$username);
		$result = $this->db->get('users')->result();
		if(!empty($result)){       
			if (password_verify($password, $result[0]->password)) {       
				if($result[0]->status != 'Active') {
					return 'not_varified';
				}
				return $result;                    
			}
			else {             
				return false;
			}
		} else {
			return false;
		}
  	}

      public function get_media_front($limit='',$slider='',$tranding=''){
        $this->db->select('*');
        $this->db->from('media');

        $this->db->where('status','Active');
        $this->db->where('isDelete',0);
		$this->db->order_by('id','desc');
        // $this->db->order_by('id', 'RANDOM');
 if(!empty($tranding) && $tranding==1){
			 $this->db->where('isTrending',1);
		 }
		if(!empty($slider)){
         $this->db->where('isSlider',1);
		}
		 if(!empty($limit)){
         $this->db->limit($limit);
		 }
        $data = $this->db->get();
        if($data->num_rows()>0){
            return $data->result();
        }else{
            return 0;
        }
    }    

    // public function countSubCategory($catId = ''){
    
    //     $this->db->select('sub_categories.id');
    //     $this->db->from('sub_categories');
    //     $this->db->join('sub_categories','sub_categories.id = blog.sub_categories_id');
    //     $this->db->where('sub_categories.status','Active');
    //     $this->db->where('sub_categories.isDelete',0);
    //     if(!empty($catId)){
    //         $this->db->where('sub_categories.sub_categories_id',$catId);
    //     }
    //     return $this->db->get()->num_rows();
    // }
    // public function get_sub_categories(){
    //     $this->db->select('sub_categories.id,blog_category.name,sub_categories.banner');
    //     $this->db->from('sub_categories');
    //     $this->db->join('sub_categories','sub_categories.sub_categories_id = sub_categories.id');
    //     $this->db->where('sub_categories.status','Active');
    //     $this->db->where('sub_categories.isDelete',0);
    //     $this->db->group_by('sub_categories.sub_categories_id');
    //     $data = $this->db->get();
    //     if($data->num_rows()>0){
    //         return $data->result();
    //     }else{
    //         return 0;
    //     }
    // } 

    
public function get_media($isFilter,$limit,$start,$id,$filter){
  
    $output='';
    
    $this->db->select('*');
    $this->db->from('media');
    $this->db->where('status','Active');
    $this->db->where('isDelete',0);
    $this->db->order_by('name','asc');
    // if(!empty($sub_category_id) && $sub_category_id>0){
    //     $this->db->where('gener_id',$sub_category_id);
    // }
    if(!empty($id)){
     //   $this->db->where('sub_category_id',$id);
     
		$this->db->where('find_in_set("'.$id.'", sub_category_id) <> 0');    
}
        if(!empty($filter['gener_id'])){
            $this->db->where('gener_id',$filter['gener_id']);
        }
    if($isFilter=='yes'){
    $query = $this->db->get();
    return $query->num_rows();
    }
    else{
    $this->db->limit($limit,$start);
    $data = $this->db->get();
    if($data->num_rows()>0){
        $result = $data->result();
        $output .='<div class="row">';
        foreach($result as $row){
            $id = $row->id;
            $sub_category_id =$row->sub_category_id; 
            $title = $row->name;
            $banner = $row->banner;
            $added = getDateTimeFormat($row->added);
           
            $video_type = $row->video_type; 
            $uheight = '';
            if($video_type=="Youtube_link" && $row->defaultBannerYutube==0){
                $url = $this->Common->getYoutubeImage($row->video_link);
            }
           elseif($video_type=="Youtube_link" && $row->defaultBannerYutube==1){
                $load_url = 'uploads/media/'.$row->banner;
            
            
            
                if(!empty($row->banner) && file_exists($load_url))
                {
               $url = base_url().$load_url;			
                }
                else
                {
                $url = base_url().'uploads/no_video_thumb.png';		
                }
                $uheight = '190px';
            }
        
          elseif($video_type=="Local" || $video_type=="local"){
           
                $load_url = 'uploads/media/'.$row->banner;
				if(!empty($row->banner) && file_exists($load_url))
                {
					$url = base_url().$load_url;			
                }
                else
                {
					$url = base_url().'uploads/no_video_thumb.png';		
                }
					$uheight = '190px'; 
            }
            
            else
            {
            $url = base_url().'uploads/no_video_thumb.png';
            $uheight = '190px';
            }
				
            $mediaDetails = base_url().'front/details/'.$id.'/'.$title;
           
    $output .='
   
	
    <div class="col-md-4 col-lg-4 px-2 1">
    <div class="product mb-4">
     <div class="product-image mb-2">
    <a class="d-block  stretched-link" href="'.$mediaDetails.'">
    <img class="img-fluid seriesimg" src="'.$url.'" alt="Image-Description">
    </a>
    </div>
    <h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
    <a href="'.$mediaDetails.'">'.$title.'</a>
    </h6>
   
    </div>
    </div>
';
        }
        $output .='</div>';
    }else{
      $output .=' No media Available.';
    }
    
return $output;
    }
}

public function get_mediass($isFilter,$limit,$start,$id,$name){ 
    $output='';
    $this->db->select('*');
    $this->db->from('media');
    $this->db->where('status','Active');
	$this->db->where('isDelete',0);
	if(!empty($id)){
    $this->db->where('sub_category_id',$id);
	}
    if($isFilter=='yes'){
    $query = $this->db->get();
    return $query->num_rows();
    }
    else{
    $this->db->limit($limit,$start);
    $data = $this->db->get();
    if($data->num_rows()>0){
        $result = $data->result();
        
        foreach($result as $row){
            $id = $row->id;
            
            $title = $row->name;
            $banner = $row->banner;
            $added = getDateTimeFormat($row->added);

            $video_type = $row->video_type; 
            if($video_type=="Youtube_link" && $row->defaultBannerYutube==0){
                $url = $this->Common->getYoutubeImage($row->video_link);
            }
        elseif($video_type=="Youtube_link" && $row->defaultBannerYutube==1){
                $load_url = 'uploads/media/'.$row->banner;
            
            
            
                if(!empty($row->banner) && file_exists($load_url))
                {
               $url = base_url().$load_url;			
                }
                else
                {
                $url = base_url().'uploads/no_video_thumb.png';		
                }
            }
        
        elseif($video_type=="Local"){
           
                $load_url = 'uploads/media/'.$row->banner;
            
            
            
                if(!empty($row->banner) && file_exists($load_url))
                {
               $url = base_url().$load_url;			
                }
                else
                {
                $url = base_url().'uploads/no_video_thumb.png';		
                }
            }
            
            else
            {
            $url = base_url().'uploads/no_video_thumb.png';
            }
				
				
            $seriesDetails = base_url().'front/details/'.$id.'/'.$title;
          if(strlen($title)>25){ $titles =  substr($title,0,25); } else {  $titles =  $title; }
    $output .=' 

    <div class="col-md-4 col-lg-3 px-2">
<div class="product mb-4">
<div class="product-image mb-2">
<a class="d-block position-relative stretched-link" href="../single-video/single-video-v4.html">
<img class="img-fluid" src="../../assets/img/480x270/img23.jpg" alt="Image-Description">
</a>
</div>
<h6 class="font-size-1 font-weight-bold mb-0 product-title d-inline-block">
<a href="../single-video/single-video-v4.html">Funny And Cute Cats – Funniest Cats Compilation 2020</a>
</h6>
<div class="font-size-12 text-gray-1300">
<span>1.2k views</span>
<span class="product-comment">1 year ago</span>
</div>
</div>
</div>
    
';
        }
      
    }else{
      $output .=' No Media Available.';
    }
    
return $output;
    }
}
    public function get_mediasss($scat=''){
        $this->db->select('*');
        $this->db->from('media');


        if(!empty($scat)){
        // $this->db->where_in('sub_category_id',$scat);   
        $this->db->where('find_in_set("'.$scat.'", sub_category_id) <> 0');    


        }
        $this->db->where('status','Active');
        $this->db->where('isDelete',0);
        $this->db->limit(8);
        $data = $this->db->get();
        if($data->num_rows()>0){
            return $data->result();
        }else{
            return 0;
        }
    }    

    public function get_series_categories($limit=''){
        $this->db->select('*');
        $this->db->from('sub_categories');
        // $this->db->join('gallery','gallery.category = gallery_category.id');
        $this->db->where('status','Active');
            $this->db->order_by('rand()');

        $this->db->where('isDelete',0);
        $this->db->where('category_id',1);      
        $this->db->limit($limit);
        // $this->db->group_by('media.category');
        $data = $this->db->get();
        if($data->num_rows()>0){
            return $data->result();
        }else{
            return 0;
        }
    }    

    public function get_geners(){
        $this->db->select('*');
        $this->db->from('geners');
        // $this->db->join('gallery','gallery.category = gallery_category.id');
        $this->db->where('status','Active');
        $this->db->where('isDelete',0);
        // $this->db->where('sub_category_id',1);      
        //   $this->db->limit('4');
        // $this->db->group_by('media.category');
        $data = $this->db->get();
        if($data->num_rows()>0){
            return $data->result();
        }else{
            return 0;
        }
    }    
    public function get_related_series($series_id,$Sub_Category_id){
        $output='';
        $this->db->select('*');
        $this->db->from('media');
          $this->db->where('sub_Category_id',$Sub_Category_id);
         $this->db->where('id !=',$series_id);
        $this->db->where('status','Active');
        $this->db->where('isDelete',0);

        $this->db->limit(4);
        $data = $this->db->get();
        if($data->num_rows()>0){
            $result = $data->result();
            foreach($result as $row){
                $id = $row->id;
                
                $title = $row->name;
                $banner = $row->banner;
                $added = getDateTimeFormat($row->added);
    
    
                $video_type = $row->video_type; 
                if($video_type=="Youtube_link" && $row->defaultBannerYutube==0){
                    $url = $this->Common->getYoutubeImage($row->video_link);
                }
            elseif($video_type=="Youtube_link" && $row->defaultBannerYutube==1){
                    $load_url = 'uploads/media/'.$row->banner;
                
                
                
                    if(!empty($row->banner) && file_exists($load_url))
                    {
                   $url = base_url().$load_url;			
                    }
                    else
                    {
                    $url = base_url().'uploads/no_video_thumb.png';		
                    }
                }
            
                
            elseif($video_type=="Local"){
               
                    $load_url = 'uploads/media/'.$row->banner;
                
                
                
                    if(!empty($row->banner) && file_exists($load_url))
                    {
                   $url = base_url().$load_url;			
                    }
                    else
                    {
                    $url = base_url().'uploads/no_video_thumb.png';		
                    }
                }
                
                else
                {
                $url = base_url().'uploads/no_video_thumb.png';
                }
                    
                    
                 $categroryname = $this->Common->get_col_by_key('sub_categories','id',$id,'name');
                $seriesDetails = base_url().'front/details/'.$id.'/'.$title;
              if(strlen($title)>25){ $titles =  substr($title,0,25); } else {  $titles =  $title; }
                $output .='
              

	<li class="thumb-wrap"><a href="'.$seriesDetails.'">
    <img class="thumb" src="'.$url.'" alt="'.$titles.'">
    <div class="thumb-info">
        <p class="thumb-title text-light">'.$titles.'</p>
    
    </div>
</a></li> 
				
				
				
				
				
    
                ';
            }
        }else{
            $output .= '<p class="text-light">No Series Available.<p>';
        }
        return $output;
    }

public function get_series($isFilter,$limit,$start){ 
        $output='';
        $this->db->select('*');
        $this->db->from('sub_categories');
        $this->db->where('status','Active');
         $this->db->where('category_id',1);
         $this->db->where('isDelete',0);



        if($isFilter=='yes'){
        $query = $this->db->get();
        return $query->num_rows();
        }
        else{
        $this->db->limit($limit,$start);
        $data = $this->db->get();
        if($data->num_rows()>0){
            $result = $data->result();
            $output .='<div class="row">';
            foreach($result as $row){
                $id = $row->id;
                $categorys = $row->category;
                $title = $row->name;
                $banner = $row->banner;
        		if(!empty($banner) && file_exists('uploads/sub_categories/'.$banner))
        		{ 
        	       
        		$url = base_url().'uploads/sub_categories/'.$banner;			
        		
        		}
        		else
        		{
        		$url = base_url().'uploads/no_file.jpg';
        		}
                $mediapage = base_url().'front/media/'.$id.'/'.$title;
        $output .=' 

        <div class="col-md-6 col-lg-3 col-xs-6 px-2" style="margin-top:20px;">
        <div class="position-relative dark mb-4 mb-lg-0 text-center">
                       
            <a href="'. $mediapage.'">
                 <img class="img-fluid seriesimg" src="'.$url.'" alt="Image-Description">
            </a>
             <a class="watchbutton" href="'.$mediapage.'">WatchNow</a>
        </div>

        
     </div>

';
            }
            $output .='</div>';
        }else{
          $output .=' No series Available.';
        }
        
    return $output;
        }
}

public function get_topics0($limit=''){
    $this->db->select('*');
    $this->db->from('sub_categories');
    $this->db->where('status','Active');
    $this->db->where('isDelete',0);
    $this->db->where('category_id',2);   
    if(!empty($limit)){   
        $this->db->limit($limit);
    }
    // $this->db->group_by('media.category');
    $data = $this->db->get();
    if($data->num_rows()>0){
        return $data->result();
    }else{
        return 0;
    }
}    

public function get_topics($isFilter,$limit,$start){
        $output='';
        
        $this->db->select('*');
        $this->db->from('sub_categories');
        $this->db->where('status','Active');
        $this->db->where('category_id',2);
        $this->db->where('isDelete',0);

        if($isFilter=='yes'){
        $query = $this->db->get();
        return $query->num_rows();
        }
        else{
        $this->db->limit($limit,$start);
        if(!empty($limit)){   
            $this->db->limit($limit);
        }
        $data = $this->db->get();
        if($data->num_rows()>0){
            $result = $data->result();
            $output .='<div class="row">';
            foreach($result as $row){
                $id = $row->id;
                $categorys = $row->category;
                
                $title = $row->name;
                $banner = $row->banner;
        		if(!empty($banner) && file_exists('uploads/sub_categories/'.$banner))
        		{ 
        	       
        		$url = base_url().'uploads/sub_categories/'.$banner;			
        		
        		}
        		else
        		{
        		$url = base_url().'uploads/no_file.jpg';
        		}
                $mediapage = base_url().'front/media/'.$id.'/'.$title;
        $output .='
    
        <div class="col-md-6 col-lg-3 col-xs-6 px-2" style="margin-top:20px;">
        <div class="position-relative dark mb-4 mb-lg-0 text-center">
        
            <a href="'. $mediapage.'">
                 <img class="img-fluid seriesimg" src="'.$url.'" alt="Image-Description">
            </a>
             <a class="watchbutton" href="'.$mediapage.'">WatchNow</a>
        </div>

        
     </div>
  

';
            }
            $output .='</div>';
        }else{
          $output .=' No Blog Available.';
        }
        
    return $output;
        }
}


public function get_blog($isFilter,$limit,$start,$filter){
  
        $output='';
        
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->where('status','Active');
        $this->db->where('isDelete',0);
        
        if(!empty($filter['category']) && $filter['category']>0){
            $this->db->where('category_id',$filter['category']);
        }
        
        if($isFilter=='yes'){
        $query = $this->db->get();
        return $query->num_rows();
        }
        else{
        $this->db->limit($limit,$start);
        $data = $this->db->get();
        if($data->num_rows()>0){
            $result = $data->result();
            $output .='<div class="row">';
            foreach($result as $row){
                $id = $row->id;
                $categroryid = $row->category_id;
             $categroryname = $this->Common->get_col_by_key('blog_category','id',$categroryid,'name');

                $blogName = $row->title;
                 $blogdescription = $row->description;
                $added = getDateTimeFormat($row->added);
                $addedBy_id = $row->addedBy;
                $addedBy = $this->Common->get_col_by_key('users','users_id',$addedBy_id,'name');
                $File = $row->image;
        		if(!empty($File))
        		 { 
        	        $load_url = 'uploads/blog/'.$File;
        			if(file_exists($load_url))
        			{
        		   $url = base_url().$load_url;			
        			}
        			else
        			{
        			$url = base_url().'uploads/no_file.jpg';		
        			}
        		}
        		else
        		{
        		$url = base_url().'uploads/no_file.jpg';
        		}
                $blogDetails = base_url().'web/blog_details/'.$id.'/'.$blogName;
        $output .='
       


            <article id="post-436" class="blog-post-loop   col-12 col-md-6 col-lg-6 meta-separator-colon post-meta-icon post-436 post type-post status-publish format-standard has-post-thumbnail hentry category-beauty category-lifestyle tag-looks tag-style tag-women">
	
	<div class="entry-post">	
	<div class="entry-thumbnail-wrapper">
		
<div class="post-thumbnail">
	<a href="'.$blogDetails.'">
	
	<img width="480" height="360" src="'.$url.'" alt="" /></a>
</div>	</div>
	
	<div class="entry-content-wrapper">
		
<header class="entry-header">

			
		
<div class="entry-category">	
	<span class="cat-links"><a href="'.$blogDetails.'">'.$categroryname.'</a> </span>
</div><h2 class="entry-title"><a href="'.$blogDetails.'">'.$blogName.'</a></h2>	<div class="entry-meta">
	
				
		
			
					<span class="author-link vcard">
						By						 
						<a href="'.$blogDetails.'" title="Posts by Martin Gray" rel="author">'.$addedBy.'</a></span> 					
					<span class="posted-date">
						<a href="'.$blogDetails.'">'.$added.'</a>
					</span>			
		
				
		
	</div>	
</header><!-- .entry-header --><div class="entry-content">		
	<p>'.$blogdescription.'</p>
</div>
<div class="entry-footer">
	
<p class="read-more-btn">
	<a href="'.$blogDetails.'" class="more-link">Continue Reading </a>
</p></div>	</div>
	
	</div>		
</article>
';
            }
            $output .='</div>';
        }else{
          $output .=' No Blog Available.';
        }
        
    return $output;
        }
}



public function getPaginition($allcount,$rowperpage,$controller='',$method=''){
	     $this->load->library("pagination");
	    
	    $config['base_url'] = base_url().$controller.'/'.$method.'/'; 
	    
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
        
	   
	}

////////////////GET COUNT BLOG CATEGORY////////////////////////
public function countBlogCategory($catId = ''){
    
    $this->db->select('blog.id');
    $this->db->from('blog');
    $this->db->join('blog_category','blog_category.id = blog.category_id');
    $this->db->where('blog.status','Active');
    $this->db->where('blog.isDelete',0);
    if(!empty($catId)){
        $this->db->where('blog.category_id',$catId);
    }
    return $this->db->get()->num_rows();
}
public function get_blog_category(){
    $this->db->select('blog_category.id,blog_category.name,blog_category.image');
    $this->db->from('blog_category');
    $this->db->join('blog','blog.category_id = blog_category.id');
    $this->db->where('blog_category.status','Active');
    $this->db->where('blog_category.isDelete',0);
    $this->db->group_by('blog.category_id');
    $data = $this->db->get();
    if($data->num_rows()>0){
        return $data->result();
    }else{
        return 0;
    }
}
////////////////END COUNT BLOG CATEGORY/////////////////////////

////////////////GET RELATED BLOG////////////////////////
public function get_related_blog($blog_id,$blogCategory_id){
    $output='';
    $this->db->select('id,title,image,added');
    $this->db->from('blog');
    $this->db->where('category_id',$blogCategory_id);
    $this->db->where('id !=',$blog_id);
    $this->db->where('status','Active');
    $this->db->where('isDelete',0);
    $this->db->limit(3);
    $data = $this->db->get();
    if($data->num_rows()>0){
        $result = $data->result();
        foreach($result as $blog){
            $id = $blog->id;
            $File = $blog->image;
    		if(!empty($File))
    		 { 
    	        $load_url = 'uploads/blog/'.$File;
    			if(file_exists($load_url))
    			{
    		   $url = base_url().$load_url;			
    			}
    			else
    			{
    			$url = base_url().'uploads/no_file.jpg';		
    			}
    		}
    		else
    		{
    		$url = base_url().'uploads/no_file.jpg';
    		}
            $blogName = $blog->title;
            $added = getDateTimeFormat($blog->added);
            $blogDetails = base_url().'web/blog_details/'.$id.'/'.$blogName;
            $output .='
            <article id="post-436" class="blog-post-loop   col-12 col-md-6 col-lg-6 meta-separator-colon post-meta-icon post-436 post type-post status-publish format-standard has-post-thumbnail hentry category-beauty category-lifestyle tag-looks tag-style tag-women">
	
	<div class="entry-post">	
	<div class="entry-thumbnail-wrapper">
		
<div class="post-thumbnail">
	<a href="'.$blogDetails.'">
	
	<img width="480" height="360" src="'.$url.'" alt="" /></a>
</div>	</div>
	
	<div class="entry-content-wrapper">
		
<header class="entry-header">

			
		
<div class="entry-category">	
	<span class="cat-links"><a href="">'.$categroryname.'</a> </span>
</div><h2 class="entry-title"><a href="'.$blogDetails.'">'.$blogName.'</a></h2>	<div class="entry-meta">
	
				
		
			
					<span class="author-link vcard">
						By						 
						<a href="" title="Posts by Martin Gray" rel="author">'.$addedBy.'</a></span> 					
					<span class="posted-date">
						<a href="">'.$added.'</a>
					</span>			
		
				
		
	</div>	
</header><!-- .entry-header --><div class="entry-content">		
	<p>'.$blogdescription.'</p>
</div>
<div class="entry-footer">
	
<p class="read-more-btn">
	<a href="'.$blogDetails.'" class="more-link">Continue Reading </a>
</p></div>	</div>
	
	</div>		
</article>
            ';
        }
    }else{
        $output .= 'No Blog Available.';
    }
    return $output;
}
////////////////END RELATED BLOG////////////////////////

}
?>