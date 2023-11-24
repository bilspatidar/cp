<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

  <style>
      *{margin: 0;padding: 0}body{overflow-x: hidden;background: #000000}#bg-div{margin: 0;margin-top:100px;margin-bottom:100px}#border-btm{padding-bottom: 20px;margin-bottom: 0px;box-shadow: 0px 35px 2px -35px lightgray}#test{margin-top: 0px;margin-bottom: 40px;border: 1px solid #FFE082;border-radius: 0.25rem;width: 60px;height: 30px;background-color: #FFECB3}.active1{color: #00C853 !important;font-weight: bold}.bar4{width: 20px;height: 2px;background-color: #ffffff;margin: 2px 0}.list-group .tabs{color: #000000}#menu-toggle{height: 50px}#new-label{padding: 2px;font-size: 10px;font-weight: bold;background-color: red;color: #ffffff;border-radius: 5px;margin-left: 5px}#sidebar-wrapper{min-height: 100vh;margin-left: -15rem;-webkit-transition: margin .25s ease-out;-moz-transition: margin .25s ease-out;-o-transition: margin .25s ease-out;transition: margin .25s ease-out}#sidebar-wrapper .sidebar-heading{padding: 0.875rem 1.25rem;font-size: 1.2rem}#sidebar-wrapper .list-group{width: 15rem}#page-content-wrapper{min-width: 100vw;padding-left: 20px;padding-right: 20px}#wrapper.toggled #sidebar-wrapper{margin-left: 0}.list-group-item.active{z-index: 2;color: #fff;background-color: #fff !important;border-color: #fff !important}@media (min-width: 768px){#sidebar-wrapper{margin-left: 0}#page-content-wrapper{min-width: 0;width: 100%}#wrapper.toggled #sidebar-wrapper{margin-left: -15rem;display: none}}.card0{margin-top: 10px;margin-bottom: 10px}.top-highlight{color: #00C853;font-weight: bold;font-size: 20px}.form-card input, .form-card textarea{padding: 10px 15px 5px 15px;border: none;border: 1px solid lightgrey;border-radius: 6px;margin-bottom: 25px;margin-top: 2px;width: 100%;box-sizing: border-box;font-family: arial;color: #2C3E50;font-size: 14px;letter-spacing: 1px}.form-card input:focus, .form-card textarea:focus{-moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;-webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;box-shadow: 0px 0px 0px 1.5px skyblue !important;font-weight: bold;border: 1px solid skyblue;outline-width: 0}input.btn-success{height: 50px;color: #ffffff;opacity: 0.9}#below-btn a{font-weight: bold;color: #000000}.input-group{position:relative;width:100%;overflow:hidden}.input-group input{position:relative;height:90px;margin-left: 1px;margin-right: 1px;border-radius:6px;padding-top: 30px;padding-left: 25px}.input-group label{position:absolute;height: 24px;background: none;border-radius: 6px;line-height: 48px;font-size: 15px;color: gray;width:100%;font-weight:100;padding-left: 25px}input:focus + label{color: #1E88E5}#qr{margin-bottom: 150px;margin-top: 50px}
  </style>
  <script>
    $(document).ready(function(){
    //Menu Toggle Script
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // For highlighting activated tabs
    $("#tab1").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light"); 
        $("#tab1").addClass("active1");
        $("#tab1").removeClass("bg-light");
    });
    $("#tab2").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab2").addClass("active1");
        $("#tab2").removeClass("bg-light");
        
    });
    $("#tab3").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab3").addClass("active1");
        $("#tab3").removeClass("bg-light");
    });
    $("#tab4").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab4").addClass("active1");
        $("#tab4").removeClass("bg-light");
    });
})
</script>
</head>
<body>
      
<div class="container-fluid px-0" id="bg-div">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-12">
            <div class="card card0">
                <div class="d-flex" id="wrapper">
                    <!-- Sidebar -->
                    <div class="bg-light border-right" id="sidebar-wrapper">
                        <div class="sidebar-heading pt-5 pb-4"><strong>PAY WITH</strong></div>
                        <div class="list-group list-group-flush">
                           <a data-toggle="tab" href="#menu4" id="tab4" class="tabs list-group-item active1">
                                <div class="list-div my-2">
                                    <div class="fa fa-home"></div> &nbsp;&nbsp; UPI
                                </div>
                            </a>
                            <a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item bg-light">
                                <div class="list-div my-2">
                                    <div class="fa fa-home"></div> &nbsp;&nbsp; Net Banking
                                </div>
                            </a> <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item bg-light">
                                <div class="list-div my-2">
                                    <div class="fa fa-credit-card"></div> &nbsp;&nbsp; Card
                                </div>
                            </a> 
                            <a data-toggle="tab" href="#menu3" id="tab3" class="tabs list-group-item bg-light">
                                <div class="list-div my-2">
                                <div class="fa fa-qrcode"></div> &nbsp;&nbsp; UPI QR 
                                </div>
                            </a> 
                            
                              
                            
                            </div>
                    </div> <!-- Page Content -->
                    <div id="page-content-wrapper">
                        <div class="row pt-3" id="border-btm">
                            <div class="col-4" > <a class="btn btn-success mt-4 ml-3 mb-3" id="menu-toggle" style="padding:5px !important;height:25px;">
                                    <div class="bar4"></div>
                                    <div class="bar4"></div>
                                    <div class="bar4"></div>
                                </a> </div>
                                            <?php 
        		          
              
                            if(!empty($pdata)){
                   
                    ?>
                    <?php } ?>
                            <div class="col-8">
                                <div class="row justify-content-right">
                                    <div class="col-12">
                                        <p class="mb-0 mr-4 mt-4 text-right">
                                             <input type="hidden" name="email" >
                                            <?php echo $pdata->row()->email;?></p>
                                    </div>
                                </div>
                                <div class="row justify-content-right">
                                    <div class="col-12">
                                        <p class="mb-0 mr-4 text-right">Pay <span class="top-highlight">
                                
                                         <?php echo  $pdata->row()->currency ;?> <?php echo $pdata->row()->amount ;?></span> </p>
                                
                                    </div>
                                </div>
                                 <form id="paymentForms" action="<?php echo base_url(); ?>v1/add_payment/add" method="POST" class="row crudForm g-3">
                                         <input type="hidden" name="mode" id="mode">
                                         <input type="hidden" name="env"  value="Test">
                                         <input type="hidden" name="email" value="<?php echo $pdata->row()->email;?>">
                                         <input type="hidden" name="transaction_date" value="<?php echo $pdata->row()->transaction_date;?>">
                                         <input type="hidden" name="merchant_id" value="<?php echo $pdata->row()->merchant_id;?>">
                                         <?php 
                                         $transaction_charge = $this->Common->get_col_by_key('users','users_id',$pdata->row()->merchant_id,'transaction_charge');
                                         ?>
                                         <input type="hidden" name="merchant_fee" value="<?php echo $transaction_charge ;?>">
                                         <input type="hidden" name="amount" value="<?php echo $pdata->row()->amount ;?>" >
                                         <input type="hidden" name="backUrl" value="<?php echo $pdata->row()->backUrl ;?>">
                                         <input type="hidden" name="currency" value="<?php echo $pdata->row()->currency ;?>" >
                                         <input type="hidden" name="fee" value="500">
                                        
                                          <div class="col-md-12">
                                    <!--<button type="submit" class="btn btn-success btn-sm">Submit</button>-->
                                </div>
                                       
                             </form>
                              
                            </div>
                        </div>
                        
                        
                          <br>
                        <div class="tab-content">
                            <div id="menu4" class="tab-pane in active">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="form-card">
                                          
                                            <form name="myForm" method="post" onsubmit="event.preventDefault()">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group"> <input type="text" name="upi" placeholder="ENTER VALID UPI" minlength="12" maxlength="19" size="50" /> <label>UPI ID</label> </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12"> <input type="submit" id="send_form" onclick="submitForm('UPI')" value="<?php echo $pdata->row()->currency ;?> <?php echo $pdata->row()->amount ;?>" class="btn btn-success placeicon"> </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="form-card">
                                            <h3 class="mt-0 mb-4 text-center">Select Your Bank</h3>
                                            <form  onsubmit="event.preventDefault()">
                                                <div class="row ">
                                                   
                                        <?php 
                                         $bankDetail = $this->Common->getBankImage();
                                        foreach($bankDetail as $bank){ 
                                $id = $bank->id;
                                  $file = $bank->image;
                                  $load_url = 'uploads/bank/'.$file;
                                  if(!empty($file) && file_exists($load_url)){
                                      $url = base_url().$load_url;
                                  }else{
                                      $url = base_url().'uploads/no_file.jpg';
                                  }
                                        ?>
                                        <div class="col-md-4 mt-3" >
                                               <div class="card" style="height:150px;">
                                          <div class="card-body text-center ">
                                              
                                              
                  <a href="javascript:void(0)" onclick="submitForm('Net Banking')">  <img src="<?php echo $url ;?>" width="50" height="50" style="vertical-align:middle" Is required>
                    <br/>
                    <p class="mt-3"><?php echo $bank->name;?></p> </a>
                    
                                          </div>
                                    </div>
                                        </div>
                                   
                                       
                                        <?php } ?>
                                        
                                                       
                                                </div>
                                                
                                                 </form>
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <p class="text-center mb-5" id="below-btn"><a href="#"></a></p>
                                                    </div>
                                                </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="form-card">
                                            <h3 class="mt-0 mb-4 text-center">Enter your card details to pay</h3>
                                            <form name="myForm" onsubmit="event.preventDefault()">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group"> <input type="text" name="crNo"  id="cr_no" placeholder="0000 0000 0000 0000" minlength="16" maxlength="16" > <label>CARD NUMBER</label> </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group"> <input type="text" name="exp" placeholder="MM/YY" minlength="4" maxlength="5" > <label>CARD EXPIRY</label> </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group"> <input type="password" name="cvv" placeholder="&#9679;&#9679;&#9679;" class="placeicon" minlength="3" maxlength="3" > <label>CVV</label> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group"> <input type="text" name="aname" id="" placeholder="Enter Card Holder Name"> <label>CARD HOLDER NAME</label> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"> <input type="submit" onclick="submitForm('Card')"  value="<?php echo $pdata->row()->currency ;?> <?php echo $pdata->row()->amount ;?>" class="btn btn-success placeicon" > </div>
                                                </div>
                                                 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="text-center mb-5" id="below-btn"><a href="#">Use a test card</a></p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <h3 class="mt-0 mb-4 text-center">Scan the QR code to pay</h3>
                                        <div class="row justify-content-center">
                                            <div id="qr"> <a href="javascript:void(0)" onclick="submitForm('QR')"> <img src="https://i.imgur.com/DD4Npfw.jpg" width="200px" height="200px" Is required></a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>

<script>
    function submitForm(pm){

if(pm=='UPI'){
    var upiId = $("input[name=upi]").val();
    if(upiId==''){
        alert("please fill this field");
         return false;
    }
}else{
     var aname = $("input[name=aname]").val();
    var cvv = $("input[name=cvv]").val();
    var exp = $("input[name=exp]").val();
    var crNo = $("input[name=crNo]").val();
   
    if(crNo == ""){
         alert("please fill this field");
    return false;
    }
    if(exp == ""){
         alert("please fill this field");
    return false;
    }
    if(cvv == ""){
         alert("please fill this field");
    return false;
    }
    if (aname == ""){
    alert("please fill this field");
    return false;
  }
}
if(pm=='Card'){
   
}
    
    
  
    

     $("#mode").val(pm);
     $(".crudForm").submit();
    }


$("#paymentForm").on('submit',(function(e) {

var post_link = $(this).attr('action');
e.preventDefault();
$.ajax({
	url: post_link,
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(response){
      var json = $.parseJSON(response);
      
      alert(json.msg);
   
	  if(json.status==1)
    {
     toastr.success(json.msg);
    }
    else
    {
        toastr.error(json.msg);
    }
	  
	},
	error: function(){} 	        
});
}))
    
  </script>












