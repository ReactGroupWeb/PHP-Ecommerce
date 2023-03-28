<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Corona Admin</title>

     <!-- plugins:css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

     <!-- Layout styles -->
     <link rel="stylesheet" href="../assets/css/style.css">
     <!-- End layout styles -->
     <link rel="shortcut icon" href="../../assets/images/favicon.png" />

</head>

<body>
     <?php
          $login_fail = 0;
          if (isset($_POST['submit'])) {
               if (!checkLogin($_POST['txtemail'], $_POST['txtpassword'])) {
                    $login_fail = 1;
               }
          }
     ?>
     <?php if (!isLogin()) { ?>
          <div class="container-scroller">
               <div class="container-fluid page-body-wrapper full-page-wrapper">
                    <div class="row w-100 m-0">
                         <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                              <div class="card col-lg-4 mx-auto">
                                   <div class="card-body px-5 py-5">
                                        <h3 class="card-title text-left mb-3 text-center">Login</h3>
                                        <?php if ($login_fail == 1) { ?>
                                             <p class="lead text-danger text-center">Invalid Email or Password</p>
                                        <?php } ?>
                                        <form method="POST">
                                             <div class="form-group">
                                                  <label>Email *</label>
                                                  <input type="text" name="txtemail" id="txtemail" class="form-control p_input">
                                             </div>
                                             <div class="form-group">
                                                  <label>Password *</label>
                                                  <input type="text" name="txtpassword" id="txtpassword" class="form-control p_input">
                                             </div>
                                             <div class="form-group d-flex align-items-center justify-content-between">
                                                  <div class="form-check">
                                                       <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"> Remember me
                                                       </label>
                                                  </div>
                                                  <a href="#" class="forgot-pass">Forgot password</a>
                                             </div>
                                             <div class="text-center">
                                                  <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">Sign In</button>
                                             </div>
                                             <p class="sign-up">Don't have an Account?<a href="/register" onclick="toRegister()"> Sign Up</a></p>
                                        </form>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     <?php } else
          $uri = "/";
     ?>
     <script>
          function toRegister() {
               <? $uri == '/register'; ?>
          }
     </script>
</body>

</html>