<aside id="sidebar" class="sidebar html">
    <ul class="sidebar-nav "id="sidebar-nav ">
        <li class="nav-item active"style="background:transparent !important">
            <a class="nav-link changeBackgound" href="<?php echo base_url(); ?>dashboard">
              <i class="bi bi-grid text-danger"></i>
              <span class="font">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed changeBackgound" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide text-warning"></i><span class="font">Manage Order</span><i class="bi bi-chevron-down ms-auto text-warning"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse html" data-bs-parent="#sidebar-nav">
               <li>
    		   <a class="html"href="<?php echo base_url(); ?>transaction/orders">
                  <i class="bi bi-circle text-warning"></i><span class="font">Orders</span>
                </a>
              </li>
            </ul>
        </li>
    </ul>
  </aside>