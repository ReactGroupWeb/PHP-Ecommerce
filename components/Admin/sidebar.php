<?php
     if (isset($_SESSION['valid'])) {
          $us_name = $_SESSION['us_name'];
          $us_isAdmin = $_SESSION['us_isAdmin'];
          $us_image = $_SESSION['us_image'];
     }
     ?>
     <style>
          .profile-img {
               background-image: url('./assets/images/user/<?= $us_image ?>');
               background-position: center;
               background-size: 100%;
               background-repeat: no-repeat;
               width: 35px;
               height: 35px;
          }
     </style>
     <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html"><img src="../../assets/images/logo.svg"
                    alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="../../assets/images/logo-mini.svg"
                    alt="logo" /></a>
     </div>
     <ul class="nav">
          <li class="nav-item profile">
               <div class="profile-desc">
                    <div class="profile-pic">
                         <div class="count-indicator rounded-circle profile-img"></div>
                         <div class="profile-name">
                              <h5 class="mb-0 font-weight-normal">
                                   <?= $us_name ?>
                              </h5>
                              <span>
                                   <?= $us_isAdmin == 1 ? "Admin" : "User" ?>
                              </span>
                         </div>
                    </div>
               </div>
          </li>
          <li class="nav-item menu-items">
               <a class="nav-link" href="/admin_dashboard">
                    <span class="menu-icon">
                         <i class="fa fa-desktop" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
               </a>
          </li>
          <li class="nav-item menu-items">
               <a class="nav-link" href="/admin_slideshow">
                    <span class="menu-icon">
                         <i class="fa fa-sliders" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">Slideshow</span>
               </a>
          </li>
          <li class="nav-item menu-items">
               <a class="nav-link" data-toggle="collapse" href="#commerce" aria-expanded="false"
                    aria-controls="ui-basic">
                    <span class="menu-icon">
                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">Commerce</span>
                    <i class="fa fa-caret-down ms-2"></i>
               </a>
               <div class="collapse" id="commerce">
                    <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="/admin_product"> <i
                                        class="fas fa-archive me-2"></i>
                                   Product</a>
                         </li>
                         <li class="nav-item"> <a class="nav-link" href="/admin_order"> <i
                                        class="fas fa-sort-amount-up-alt me-2"></i>
                                   Order</a></li>
                         <li class="nav-item"> <a class="nav-link" href="/admin_category"> <i
                                        class="fas fa-calendar-day me-2"></i>
                                   Category
                              </a></li>
                    </ul>
               </div>
          </li>
          <li class="nav-item menu-items">
               <a class="nav-link" data-toggle="collapse" href="#configuration" aria-expanded="false"
                    aria-controls="configuration">
                    <span class="menu-icon">
                         <i class="fa fa-cog" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">Configuation</span>
                    <i class="fa fa-caret-down ms-2"></i>
               </a>
               <div class="collapse" id="configuration">
                    <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="/admin_company"> <i
                                        class="fas fa-building me-2"></i> Company
                              </a>
                         </li>
                         <li class="nav-item"> <a class="nav-link" href="/admin_user"> <i class="fas fa-user me-2"></i>
                                   User </a></li>
                    </ul>
               </div>
          </li>
          <li class="nav-item menu-items">
               <a class="nav-link" href="../../DB/auth.php?clear=logout">
                    <span class="menu-icon">
                         <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </span>
                    <span class="menu-title">Log out</span>
               </a>
          </li>
     </ul>
</nav>