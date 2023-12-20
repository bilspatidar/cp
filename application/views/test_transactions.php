<html>
<head>
<title>Test Payments</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');


body{
background: linear-gradient(to right, rgba(235,224,232,1) 52%,rgba(254,191,1,1) 53%,rgba(254,191,1,1) 100%);
font-family: 'Roboto', sans-serif;
}

.card{
	border: none;
	max-width: 450px;
	border-radius: 15px;
	margin: 150px 0 150px;
	padding: 35px;
	padding-bottom: 20px!important;
}
.heading{
	color: #C1C1C1;
	font-size: 14px;
	font-weight: 500;
}
img{
	transform: translate(160px,-10px);
}
img:hover{
    cursor: pointer;
}
.text-warning{
	font-size: 12px;
	font-weight: 500;
	color: #edb537!important;
}
#cno{
	transform: translateY(-10px);
}
input{
	border-bottom: 1.5px solid #E8E5D2!important;
	font-weight: bold;
	border-radius: 0;
	border: 0;

}
.form-group input:focus{
	border: 0;
	outline: 0;
}
.col-sm-5{
	padding-left: 90px;
}
.btn{
	background: #F3A002!important;
	border: none;
	border-radius: 30px;
}
.btn:focus{
    box-shadow: none;
}
</style>
</head>
<body>
<div class="container-fluid">
	<div class="row d-flex justify-content-center">
		<div class="col-sm-12">
			<div class="card mx-auto">
				<p class="heading">PAYMENT DETAILS</p>
				<?php 	$cardnumber         = $this->encrypt->decode($row[0]->cardnumber);
						$cardcvv        = $this->encrypt->decode($row[0]->cardcvv);?>
					<form class="card-details " action="http://localhost/cp/api/test/pay_transaction" method="post">
						<input type="hidden" name="id" value="<?php echo $row[0]->id;?>">
						<input type="hidden" name="token" value="<?php echo $row[0]->token;?>">
						<input type="hidden" name="callbackurl" value="<?php echo $row[0]->callbackurl;?>">
						<input type="hidden" name="merchant_transaction_id" value="<?php echo $row[0]->merchant_transaction_id;?>">
						<div class="form-group mb-0">
								<p class="text-warning mb-0">Card Number</p> 
                          		<input type="text" name="cardnumber" placeholder="1234 5678 9012 3457" 
								value="<?php echo $cardnumber;?>" size="17" id="cno" minlength="16" maxlength="19" required>
								<img src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px" />
                        </div>

                        <div class="form-group">
                            <p class="text-warning mb-0">Cardholder's Name</p>
							<input type="text" name="cardholdername" placeholder="Name" size="17" value="<?php echo $row[0]->cardholdername;?>" required>
                        </div>
                        <div class="form-group pt-2">
                        	<div class="row d-flex">
                        		<div class="col-sm-4">
                        			<p class="text-warning mb-0">Expiration</p>
                        			<input type="text" name="expiry" placeholder="MM/YYYY" size="7" 
									value="<?php echo $row[0]->expirymonth.'/'.$row[0]->expiryyear;?>" id="exp" minlength="7" maxlength="7" required>
                        		</div>
                        		<div class="col-sm-3">
                        			<p class="text-warning mb-0">Cvv</p>
                        			<input type="password" name="cardcvv" placeholder="&#9679;&#9679;&#9679;" 
									value="<?php echo $cardcvv;?>" size="1" minlength="3" maxlength="3" required>
                        		</div>
                        		<div class="col-sm-5 pt-0">
                        			
                        		</div>
                        	</div>
                        </div>	
						<div class="form-group">
							<div class="row d-flex">
                        		<div class="col-sm-7">
                        			<p class="text-warning mb-0">Transaction status</p>
									<select class="form-control" name="transaction_status">
										<option value="Success">Success</option>
										<option value="Failed">Failed</option>
									</select>
                        		</div>
                        		<div class="col-sm-5 pt-0">
                        			<button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right px-3 py-2"></i></button>
                        		</div>
                        	</div>
                        </div>						
					</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>