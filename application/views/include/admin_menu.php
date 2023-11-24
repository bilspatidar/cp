<aside id="sidebar" class="sidebar html">
    <ul class="sidebar-nav "id="sidebar-nav ">

        <li class="nav-item active"style="background:transparent !important">
            <a class="nav-link changeBackgound" href="<?php echo base_url(); ?>dashboard">
              <i class="bi bi-grid text-danger"></i>
              <span class="font">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed changeBackgound" data-bs-target="#components-navOne" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bag-plus text-warning"></i><span class="font">Manage Products</span><i class="bi bi-chevron-down ms-auto text-warning"></i>
            </a>
            <ul id="components-navOne" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a class="html"href="<?php echo base_url(); ?>master/crystal">
                    <i class="bi bi-circle text-warning"></i><span class="font">Crystals</span>
                </a>
            </li>
            <li>
                <a class="html"href="<?php echo base_url(); ?>master/product_unit">
                    <i class="bi bi-circle text-warning"></i><span class="font">Product Units</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/categories">
                    <i class="bi bi-circle text-warning"></i><span class="font">Categories Level First</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/level_two_category">
                    <i class="bi bi-circle text-warning"></i><span class="font">Categories Level Two</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/level_three_category">
                    <i class="bi bi-circle text-warning"></i><span class="font">Categories Level Three</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/level_four_category">
                    <i class="bi bi-circle text-warning"></i><span class="font">Categories Level Four</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/new_product_attribute">
                    <i class="bi bi-circle text-warning"></i><span class="font">Product Attribute</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/new_product_variation">
                    <i class="bi bi-circle text-warning"></i><span class="font">Product Variations</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/brand">
                    <i class="bi bi-circle text-warning"></i><span class="font">Brand</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/products">
                    <i class="bi bi-circle text-warning"></i><span class="font">Products</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/product_bulk_images">
                    <i class="bi bi-circle text-warning"></i><span class="font">Product Bulk Images</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/product_stock">
                    <i class="bi bi-circle text-warning"></i><span class="font">Product Stock</span>
                </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link collapsed changeBackgound" data-bs-target="#components-nav21" data-bs-toggle="collapse" href="#">
              <i class="bi bi-list text-warning"></i><span class="font">Offer Zone</span><i class="bi bi-chevron-down ms-auto text-warning"></i>
            </a>
            <ul id="components-nav21" class="nav-content collapse " data-bs-parent="#sidebar-nav">
               <li>
                <a  class="html" href="<?php echo base_url(); ?>master/promo_code">
                  <i class="bi bi-circle text-warning"></i><span class="font">Product Promo Codes</span>
                </a>
              </li>
              <li>
                <a  class="html" href="<?php echo base_url(); ?>master/offers">
                  <i class="bi bi-circle text-warning"></i><span class="font">Offers</span>
                </a>
              </li>
    		  <li>
                <a  class="html" href="<?php echo base_url(); ?>master/slider">
                  <i class="bi bi-circle text-warning"></i><span class="font">Slider</span>
                </a>
              </li>
    		  <li>
                <a  class="html" href="<?php echo base_url(); ?>master/banner">
                  <i class="bi bi-circle text-warning"></i><span class="font">Banner</span>
                </a>
              </li>
            </ul>
            </li>
        </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed changeBackgound" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wrench text-warning"></i><span class="font">Manage Services</span><i class="bi bi-chevron-down ms-auto text-warning"></i>
            </a>
            <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/services_categories">
                    <i class="bi bi-circle text-warning"></i><span class="font">Services Categories</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/services_sub_category">
                    <i class="bi bi-circle text-warning"></i><span class="font">Services Sub Categories</span>
                </a>
            </li>
            <li>
                <a class="html" href="<?php echo base_url(); ?>master/services">
                    <i class="bi bi-circle text-warning"></i><span class="font">Services</span>
                </a>
            </li>
            <li>
                <a  class="html" href="<?php echo base_url(); ?>user/users_service_link">
                    <i class="bi bi-circle text-warning"></i><span class="font">Users Service Link</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed changeBackgound" data-bs-target="#components-navOffer" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-list text-warning"></i><span class="font">Offer Zone</span><i class="bi bi-chevron-down ms-auto text-warning"></i>
                </a>
                <ul id="components-navOffer" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                <a  class="html" href="<?php echo base_url(); ?>master/service_promo_code">
                    <i class="bi bi-circle text-warning"></i><span class="font">Service Promo Codes</span>
                </a>
                </li>
                </ul>
            </li>
        </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed changeBackgound" data-bs-target="#components-nav20" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide text-warning"></i><span class="font">Manage Order</span><i class="bi bi-chevron-down ms-auto text-warning"></i>
            </a>
            <ul id="components-nav20" class="nav-content collapse html" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="html"href="<?php echo base_url(); ?>transaction/orders">
                      <i class="bi bi-circle text-warning"></i><span class="font">Orders</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>