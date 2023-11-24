<?php if(isset($loadData)){ if($loadData==1){ ?>
 <script>
$(document).ready(function(){
  load_data(1);
});

function load_data(page){
       //$(".loader").fadeIn(400);
        //$("#preloder").delay(200).fadeIn("slow");
	var url = "<?php echo $dataLink; ?>"+page;
	var filterOne = $("#filterOne").val();
	var filterTwo = $("#filterTwo").val();
	var filterThree = $("#filterThree").val();
	var filterFour = $("#filterFour").val();
	var filterFive = $("#filterFive").val();
	var filterSix = $("#filterSix").val();
// 		alert(filterTwo);
	var postData = {filterOne:filterOne,filterTwo:filterTwo,filterThree:filterThree,filterFour:filterFour,filterFive:filterFive,filterSix:filterSix};
	$.ajax({
   url:url,	  
   method:"POST",
   data:postData,
   dataType:"json",
   success:function(data)
   {
      
	$('#load_data').html(data.load_data);
	$('#paginationLink').html(data.paginationLink);
    $("#pageNumber").html(data.pageNumber);
    //data_table();
	 //$(".loader").fadeOut(400);
	 //$("#preloder").delay(200).fadeOut("slow");
    }
  });
 }
 </script>
 <?php } }?>
<script>
    $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_data(page);
 });
</script>
