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
     <?php
     $login_fail = 0;
     if (isset($_POST['submit'])) {
          if (!checkLogin($_POST['txtemail'], $_POST['txtpassword']))
               $login_fail = 1;
          else
               header("location: {$_SERVER['HTTP_ORIGIN']}/");
     }
     function findEmail($email)
     {
          include_once "./DB/dbConnection.php";
          include_once "./DB/dbClass.php";
          $getUS = new dbClass();
          $users = $getUS->dbSelect("tb_user", "us_email");
          if ($users) {
               foreach ($users as $user) {
                    if ($user['us_email'] == $email)
                         return true;
                    else
                         return false;
               }
          }
     }
     ?>
     <div class="container-scroller">
          <div class="container-fluid page-body-wrapper full-page-wrapper">
               <div class="row w-100 m-0">
                    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                         <div class="card col-lg-4 mx-auto card-bg">
                              <div class="card-body px-5 py-5">
                                   <h3 class="card-title text-left mb-3 text-center">Login</h3>
                                   <?php if ($login_fail == 1) { ?>
                                        <p class="lead text-danger text-center">Invalid Email or Password</p>
                                   <?php } else if (isset($_GET['Update'])) {
                                        if ($_GET['Update'] === 'true') { ?>
                                                  <p class="lead text-success text-center">Updated Password Successfully <br /> Please
                                                       Try to Login</p>
                                        <?php } else if ($_GET['Update'] === 'false') { ?>
                                                       <p class="lead text-danger text-center">Confirm Password Not Match!!! <br /> Please
                                                            Try Again</p>
                                        <?php } else if ($_GET['Update'] === 'false_email') { ?>
                                                            <p class="lead text-danger text-center">Sorry!!! Email not Found</p>
                                        <?php } else if ($_GET['Update'] === 'false_OTP') { ?>
                                                                 <p class="lead text-danger text-center">Sorry!!! OTP Code Not Match</p>
                                        <?php } else if ($_GET['Update'] === 'empty_email') { ?>
                                                                      <p class="lead text-danger text-center">Please!!! Enter Email</p>
                                             <?php
                                        }
                                   }
                                   if (isset($_GET['Insert']) && $_GET['Insert'] === 'true') { ?>
                                        <p class="lead text-success text-center">Your Registration has been successfully
                                             completed <br /> Please
                                             Try to Login</p>
                                   <?php } ?>
                                   <form method="POST">
                                        <div class="form-group">
                                             <label>Email *</label>
                                             <input type="text" name="txtemail" id="txtemail"
                                                  class="form-control p_input">
                                        </div>
                                        <div class="form-group">
                                             <label>Password *</label>
                                             <input type="password" name="txtpassword" id="txtpassword"
                                                  class="form-control p_input">
                                        </div>
                                        <?php if ($login_fail == 1) { ?>
                                             <div class="text-center mb-2">
                                                  <a type="button" class="text-primary" data-bs-toggle="modal"
                                                       data-bs-target="#FG_Password">Forgot Password</a>
                                             </div>
                                        <?php } ?>
                                        <div class="text-center px-5 pt-3">
                                             <button type="submit" name="submit"
                                                  class="btn btn-primary btn-block enter-btn">Sign In</button>
                                        </div>
                                        <p class="sign-up">Don't have an Account?<a href="/register"
                                                  onclick="<? $uri == '/register'; ?>"> Sign Up</a></p>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- forgot password clicked-->
     <div class="modal fade" id="FG_Password" tabindex="-1" aria-labelledby="FG_PasswordLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="FG_PasswordLabel">Please Enter Your Email!!!</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/OTPmailer" method="post">
                         <div class="modal-body">
                              <div class="mb-3">
                                   <label for="us_email" class="col-form-label">Email:</label>
                                   <input type="email" class="form-control" name="us_email" id="us_email">
                              </div>
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="FGpassword" class="btn btn-primary" data-bs-toggle="modal"
                                   data-bs-target="#">Send Email</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
     <!-- bootstrap -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
          crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
          integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
          crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
          integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
          crossorigin="anonymous"></script>
</body>

</html>