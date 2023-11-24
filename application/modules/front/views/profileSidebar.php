<style>
 .list-group a {border:1px solid #602163;}
 .list-group a.active{background:#634986;border:1px solid #602163;}
</style>
<div class="list-group">
    <a href="<?php echo base_url();?>front/profile_setting" class="list-group-item list-group-item-action <?php if($title=='Profile Setting'){ echo'active'; }?>">
        <i class="fa fa-user"></i>&nbsp;<span>Profile</span>
    </a>
    <!-- <a href="<?php echo base_url();?>front/my_order" class="list-group-item list-group-item-action <?php if($title=='My Order'){ echo'active'; }?>">
        <i class='fa fa-first-order'></i>&nbsp;<span>My Orders</span>
    </a> -->
    <!-- <a href="<?php echo base_url();?>front/my_booking" class="list-group-item list-group-item-action <?php if($title=='My Booking'){ echo'active'; }?>">
        <i class='fa fa-first-order'></i>&nbsp;<span>My Bookings</span>
    </a> -->
        <!-- <a href="<?php echo base_url();?>front/my_courses" class="list-group-item list-group-item-action <?php if($title=='My Courses'){ echo'active'; }?>">
        <i class='fa fa-first-order'></i>&nbsp;<span>My Courses</span>
    </a> -->
    <!-- <a href="<?php echo base_url();?>front/affiliate" class="list-group-item list-group-item-action <?php if($title=='My Wallet'){ echo'active'; }?>">
        <i class='fa fa-credit-card'></i>&nbsp;<span>My Wallet</span>
    </a> -->
    
    <a href="<?php echo base_url();?>front/change_password" class="list-group-item list-group-item-action <?php if($title=='Change Password'){ echo'active'; }?>">
        <i class="fa fa-key"></i>&nbsp;<span>Change Password</span>
    </a>
    <!-- <a href="<?php echo base_url();?>front/product_catalog" class="list-group-item list-group-item-action <?php if($title=='Product Catalog'){ echo'active'; }?>">
        <i class="fa fa-shopping-bag"></i>&nbsp;<span>Product Catalog</span>
    </a> -->
    <a href="<?php echo base_url();?>front/logout" class="list-group-item list-group-item-action <?php if($title==''){ echo'active'; }?>">
        <i class="fa fa-sign-out"></i>&nbsp;<span>Logout</span>
    </a>
</div>