<?php
include_once "./DB/dbConnection.php";
include_once "./DB/dbClass.php";
$getUS = new dbClass();
$users = $getUS->dbSelect("tb_user", "us_id,us_email");

$emailFound = true;
if (!isset($_POST["OTPsubmit"])) {
    if (isset($_POST['us_email']) && !empty($_POST['us_email'])) {
        if ($users) {
            foreach ($users as $user) {
                if ($user['us_email'] == $_POST['us_email']) {
                    $emailFound = false;
                    //for user who forget password
                    if (isset($_POST["FGpassword"])) {
                        $_SESSION['IDforUpdate'] = $user['us_id'];
                        require_once 'configMailer.php';
                    }
                    //if email already exist
                    else if (isset($_POST["register"]))
                        header("location: {$_SERVER['HTTP_ORIGIN']}/register?Insert=false_email");
                    break;
                }
            }
        }
        if ($emailFound) {
            //if email not found
            if (isset($_POST["FGpassword"]))
                header("location: {$_SERVER['HTTP_ORIGIN']}/login?Update=false_email");
            //for user who register new Email
            else if (isset($_POST["register"])) {
                if (!empty($_POST['us_name']) && !empty($_POST['us_passwordHash'])) {
                    require_once 'configMailer.php';
                    $_SESSION['usRe_name'] = $_POST['us_name'];
                    $_SESSION['usRe_email'] = $_POST['us_email'];
                    $_SESSION['usRe_password'] = $_POST['us_passwordHash'];
                } else {
                    header("location: {$_SERVER['HTTP_ORIGIN']}/register?Insert=empty_email");
                }
            }
        }
    } else {
        isset($_POST["FGpassword"]) ?
            header("location: {$_SERVER['HTTP_ORIGIN']}/login?Update=empty_email") :
            header("location: {$_SERVER['HTTP_ORIGIN']}/register?Insert=empty_email");
    }
}
?>
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
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3 text-center">Confirm OTP Code</h3>
                            <form method="POST" <?= isset($_POST["FGpassword"]) ? "" : "action='./DB/user.process.php?send=register'" ?>>
                                <div class="form-group d-flex my-4 otpCodeNumber">
                                    <input type="text" name="otp1" id="otp1" style="width:33%"
                                        onkeypress='return num(event)' maxlength="1"
                                        class="form-control text-center mx-1 text-light">
                                    <input type="text" name="otp2" id="otp2" style="width:33%"
                                        onkeypress='return num(event)' maxlength="1"
                                        class="form-control text-center mx-1 text-light">
                                    <input type="text" name="otp3" id="otp3" style="width:33%"
                                        onkeypress='return num(event)' maxlength="1"
                                        class="form-control text-center mx-1 text-light">
                                    <input type="text" name="otp4" id="otp4" style="width:33%"
                                        onkeypress='return num(event)' maxlength="1"
                                        class="form-control text-center mx-1 text-light">
                                </div>
                                <div class="text-center mx-2">
                                    <button type="submit"
                                        name="<?= isset($_POST["FGpassword"]) ? "OTPsubmit" : "register" ?>"
                                        class="btn btn-primary btn-block enter-btn">Submit</button>
                                </div>
                                <div class="d-flex">
                                    <div class="text-center w-100 mx-2">
                                        <button type="button" onclick="clearOTP()"
                                            class="btn btn-warning btn-block enter-btn">Clear</button>
                                    </div>
                                    <div class="text-center w-100 mx-2">
                                        <button type="button" onclick="BackToLogin()"
                                            class="btn btn-danger btn-block enter-btn">Back To Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- if OTP code sumbit -->
    <?php
    if (isset($_POST["OTPsubmit"])) {
        if ($_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] == $_SESSION['RandomOTP']) {
            ?>
            <div style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width:70%">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="text-center">Enter Your New Password</h5>
                        </div>
                        <form action='./DB/user.process.php?send=UpdatePass' method="post">
                            <div class="modal-body">
                                <input type="text" class="d-none" name="txtIDforUpdate" id="txtIDforUpdate"
                                    value="<?= $_SESSION['IDforUpdate'] ?>">
                                <div class="mb-3">
                                    <label for="txtNewPass" class="col-form-label">New Password:</label>
                                    <input type="password" class="form-control" name="txtNewPass" id="txtNewPass">
                                </div>
                                <div class="mb-3">
                                    <label for="txtConfirmNewPass" class="col-form-label">Confirm New Password:</label>
                                    <input type="password" class="form-control" name="txtConfirmNewPass" id="txtConfirmNewPass">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="/login" class="btn btn-secondary">Cancel</a>
                                <button type="submit" name="UpdatePass" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        } else {
            header("location: {$_SERVER['HTTP_ORIGIN']}/login?Update=false_OTP");
        }
        unset($_SESSION['RandomOTP']);
        unset($_SESSION['IDforUpdate']);
    }
    ?>
    <script>
        //get all input components and store as array
        const inputs = Array.prototype.slice.call(
            document.querySelectorAll('.otpCodeNumber input')
        );
        inputs.forEach((input) => {
            input.addEventListener('keyup', () => {
                const currInput = document.activeElement;
                const currInputIndex = inputs.indexOf(currInput);
                const nextinputIndex =
                    (currInputIndex + 1) % inputs.length;
                const input = inputs[nextinputIndex];
                input.focus();
            });
        });
        // allow only number function
        function num(e) {
            var key = e.which || e.KeyCode;
            // key for number 0 -> 9
            if (key >= 48 && key <= 57)
                return true;
            else return false;
        }
        //clear all input components values and focus on first input components
        function clearOTP() {
            inputs.forEach(element => {
                element.value = "";
            });
            inputs[0].focus();
        }
        //back to Login page
        function BackToLogin() {
            document.location.href = '/login';
        }
    </script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>