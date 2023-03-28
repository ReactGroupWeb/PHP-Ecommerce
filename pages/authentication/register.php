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
     <div class="container-scroller">
          <div class="container-fluid page-body-wrapper full-page-wrapper">
               <div class="row w-100 m-0">
                    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                         <div class="card col-lg-4 mx-auto">
                              <div class="card-body">
                                   <h3 class="card-title text-left mb-3">Register</h3>
                                   <form method="POST">
                                        <div class="form-group">
                                             <label>Username</label>
                                             <input type="text" class="form-control p_input">
                                        </div>
                                        <div class="form-group">
                                             <label>Email</label>
                                             <input type="email" class="form-control p_input">
                                        </div>
                                        <div class="form-group">
                                             <label>Password</label>
                                             <input type="password" class="form-control p_input">
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
                                             <button type="submit" class="btn btn-primary btn-block enter-btn">Sign
                                                  Up</button>
                                        </div>
                                        <p class="sign-up text-center">Already have an Account?<a href="/login"
                                                  onclick="toLogin()"> Sign In</a>
                                        </p>
                                        <p class="terms">By creating an account you are accepting our<a href="#">
                                                  Terms
                                                  &
                                                  Conditions</a></p>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <script>
          function toLogin() {
               <? $uri == '/login'; ?>
          }
     </script>
</body>

</html>