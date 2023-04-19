<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Corona Admin</title>

     <!-- plugins:css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

     <!-- Layout styles -->
     <link rel="stylesheet" href="../../assets/admin/css/style.css">
     <!-- End layout styles -->
     <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>

<body>
     <div class="container-scroller">
          <div class="container-fluid page-body-wrapper full-page-wrapper">
               <div class="row w-100 m-0">
                    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                         <div class="card col-lg-4 mx-auto">
                              <div class="card-body">
                                   <h3 class="card-title text-left mb-3 text-center">Register</h3>
                                   <?php if (isset($_GET['Insert'])) {
                                        if ($_GET['Insert'] === 'false_email') { ?>
                                             <p class="lead text-danger text-center">Sorry!!! Email Already Exist!!!</p>
                                        <?php } else if ($_GET['Insert'] === 'false_OTP') { ?>
                                                  <p class="lead text-danger text-center">Sorry!!! OTP Code Not Match</p>
                                        <?php } else if ($_GET['Insert'] === 'empty_email') { ?>
                                                       <p class="lead text-danger text-center">Enter Username, Email, Password</p>
                                        <?php }
                                   } ?>
                                   <form action="/OTPmailer" method="POST">
                                        <div class="form-group">
                                             <label>Username</label>
                                             <input type="text" name="us_name" id="us_name"
                                                  class="form-control p_input">
                                        </div>
                                        <div class="form-group">
                                             <label>Email</label>
                                             <input type="email" name="us_email" id="us_email"
                                                  class="form-control p_input">
                                        </div>
                                        <div class="form-group">
                                             <label>Password</label>
                                             <input type="password" name="us_passwordHash" id="us_passwordHash"
                                                  class="form-control p_input">
                                        </div>
                                        <div class="text-center px-5 pt-3">
                                             <button type="submit" name="register"
                                                  class="btn btn-primary btn-block enter-btn">Sign
                                                  Up</button>
                                        </div>
                                        <p class="sign-up text-center">Already have an Account?<a href="/login"
                                                  onclick="<? $uri == '/login'; ?>"> Sign In</a>
                                        </p>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</body>

</html>