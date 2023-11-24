<style>
    
element.style {
}
.pb-6, .py-6 {
    padding-bottom: 1.5rem!important;
}
.pt-6, .py-6 {
    padding-top: 2.5rem!important;
}
.pr-3d, .px-3d {
    padding-right: 4.3rem!important;
}
p {
    text-align: center;
    font-weight: bold;
}
</style>

<main id="content">
<div class="container">
<div class="row">
<div class="col-lg-auto bg-gray-1000 ">
<div class="position-relative h-100 max-w-240">
<div class="py-6 pr-3d sidebar-area h-100">

<div class="mb-5">

<!-- <h3 class="widget-title">All Geners</h3> -->

<ul class="list-unstyled h-bg-1 mb-0">
    <li class="list-group-item" >
							    <input type="hidden" id="filterOne">
                                <a href="javascript:void(0)" onclick="setCategory()" style="color:#000;">
								All Genres</a>
							</li>
                            <?php 
                                    $sub_category_id;
									$geners = $this->Common->getMediaGeners($sub_category_id);
								    
									$geners_arr = $this->Common->convert_unique_array($geners);
                                
                                    for($i=0;$i<count($geners);$i++){
                                    $gener_id = $geners_arr[$i];                                   
                                    $generNames = $this->Common->get_col_by_key('geners','id',$gener_id,'title');
                                   
                                    // $id = $gener->id; 
                                    $generDatils = base_url().'front/media/'.$gener_id.'/'.$generNames;
                            ?>
 
<style>
								.accordion .list-group-item:hover {
									background: #755AA6;
								}
								</style>
                              
<li class="px-3 py-1 mb-1">
<a href="javascript:void(0)" onclick="setCategory(this.id)" id="<?php echo $gener_id; ?>" class="text-dark">
                             <?php echo $generNames;?></a>
</li>
<?php }?>
</ul>
</div>

</div>
</div>
</div>
<style>

</style>
<div class="col-lg">
<div class="max-w-md-1160 ml-auto my-6 mb-lg-8 pb-lg-1">
<p style="padding:0px;"><?php  echo $description = $this->Common->get_col_by_key('sub_categories','id',$sub_category_id,'description'); ?></p><br>

<section>

<div class="mb-4">
<div class="row mx-n2">
     
 <p>
    
<div id="pageNumber" style="display:none;"></div>

                     <span style="width:100%;"id="load_data"></span>
                     <div class="col-lg-12 text-center">
                     <div class="paginationDiv " id="paginationLink"></div>
                     </div>
                    </p>
                    
                    
</div>
</div>
</section>

</div>
</div>
</div>
</div>
</main>

<script>
    function setCategory(url){
//   alert(url);
$("#filterOne").val(url);
 load_data(1);
 }
</script>

<!--     <script>
    $(document).ready(function(){
        set_cetegory('0');
})
 set_cetegory(0);
function set_cetegory(sid){
    	$("#service_id_html1").html('');
	$("#category").val(sid);
alert(sid);
	$.ajax({
		type: "POST",  
		url: "<?php echo base_url(); ?>front/get_media/"+sid,
	success: function(msg) {
	$("#service_id_html1").html(msg);
	}               
});
}
</script> -->
 