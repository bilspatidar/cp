<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item active"style="background:transparent !important">
            <a class="nav-link changeBackgound" href="<?php echo base_url(); ?>dashboard">
                <i class="bi bi-grid text-danger"></i><span class="font">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed changeBackgound" data-bs-target="#Booking" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide text-warning"></i><span class="font">Manage Booking</span><i class="bi bi-chevron-down ms-auto text-warning"></i>
            </a>
            <ul id="Booking" class="nav-content collapse html" data-bs-parent="#sidebar-nav">
            <li>
                <a class="html"href="<?php echo base_url(); ?>transaction/bookings">
                    <i class="bi bi-circle text-warning"></i><span class="font">Bookings</span>
                </a>
            </li>
            </ul>
        </li>
    </ul>
</aside>