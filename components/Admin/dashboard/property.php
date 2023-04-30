<?php

    include_once "./DB/dbConnection.php";
    include_once "./DB/dbClass.php";
    $dbClass = new dbClass();
    $heading_user = "User";
    $heading_company = "Company";

    // User
    $table_user = "tb_user";

    $field = "*";
    $condition = "us_isAdmin != 0";
    $order = "";

    $users = $dbClass->dbSelect($table_user, $field, $condition, $order);  
    
    
    // Company
    $table_company = "tb_company";
    $field = "*";
    $condition = "cp_id = 1";
    

    $company = $dbClass->dbSelectOne($table_company, $field, $condition, $order);
  ?>

<div class="row">
  <div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title">Company</h4>
        </div>
        <div class="preview-list text-center">

          <img src="../../../assets/images/<?= strtolower($heading_company) ?>/<?= $company['cp_miniLogo']; ?>" class="card-img-top company-logo mb-4" width="25">
          <h3 class="card-title fw-bold"><?= $company['cp_name'] ?></h3>
          <p class="card-text"><a href="mailto:<?= $company['cp_email'] ?>" class="text-decoration-none text-light"><?= $company['cp_email'] ?></a></p>
          <p class="card-text"><a href="tel:<?= $company['cp_phone'] ?>" class="text-decoration-none text-light"><?= $company['cp_phone'] ?></a></p>
          <p class="card-text"><?= $company['cp_address'] ?></p>

        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Team Members</h4>
        <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
          <?php
            if(!empty($users)){
              foreach($users as $user){
                ?>
                  <div class="card card-carousel py-0" >
                    <img src="../../../assets/images/<?= strtolower($heading_user) ?>/<?= $user['us_image']; ?>" class="card-img-top" >
                    <div class="card-body text-center py-0 mt-3">
                        <h5 class="card-title fw-bold"><?= $user['us_name'] ?></h5>
                        <p class="card-text">
                          <?php
                            if($user['us_isAdmin'] !=0){
                              echo "Admin";
                            }
                          ?>
                        </p>
                      </div>
                    </div>
                  <?php   
              }
            }
          ?>
          
          
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Calendar</h4>
        <div class="wrapper">
          <header>
            <p class="current-date"></p>
            <div class="icons">
              <span id="prev" class="material-symbols-rounded"><i class="fa-solid fa-chevron-left"></i></span>
              <span id="next" class="material-symbols-rounded"><i class="fa-solid fa-chevron-right"></i></span>
            </div>
          </header>
          <div class="calendar">
            <ul class="weeks">
              <li>Sun</li>
              <li>Mon</li>
              <li>Tue</li>
              <li>Wed</li>
              <li>Thu</li>
              <li>Fri</li>
              <li>Sat</li>
            </ul>
            <ul class="days"></ul>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>