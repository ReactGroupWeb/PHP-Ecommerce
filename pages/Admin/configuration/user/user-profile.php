<?php
include "./DB/dbConnection.php";
include "./DB/dbClass.php";
$heading = "User";
$dbClass = new dbClass();
$table = "tb_user";
$field = "*";
$condtion = "";
if (isset($_SESSION['us_id'])) {
    $user_id = $_SESSION['us_id'];
    $condtion = "us_id = $user_id";
}

$user = $dbClass->dbSelectOne($table, $field, $condtion);

?>

<!-- start message section -->
<div style="margin-top: 20px;">
    <?php if (isset($_GET['Update'])) {
        if ($_GET['Update'] === 'success') { ?>
            <p class="lead text-success text-center fw-bold">Password Updated Successfully!!!</p>
        <?php } else if ($_GET['Update'] === 'fail') { ?>
                <p class="lead text-danger text-center fw-bold">Confirm Password Not Match!!! <br /> Please
                    Try Again</p>
        <?php } else if ($_GET['Update'] === 'wrongpass') { ?>
                    <p class="lead text-danger text-center fw-bold">Your Current Password is Wrong!!! <br /> Please
                        Try Again</p>
        <?php } else if ($_GET['Update'] === 'empty') { ?>
                        <p class="lead text-danger text-center fw-bold">Please Enter New Password and Confirm Password Again!!! </p>
        <?php }
    } ?>
</div>
<!-- end message section -->

<div class="container user_profile_panel">
    <div class="row">
        <div class="col-12 col-md-3 p-0 user_profile_sidebar">
            <div class="user_profile_img text-center">
                <p class="card-img-top rounded-circle mx-auto" style="width: 200px; height: 200px;
                              border: 5px solid #ccc; 
                              background-image: url('./assets/images/user/<?= $user['us_image'] ?>');
                              background-position: center;
                              background-size: 100%;
                              background-repeat: no-repeat;
                              ">
                </p>
            </div>
            <div class="user_profile_text text-center py-4">
                <button type="button" class="btn btn-warning fw-bold px-3 py-2 mb-3" data-bs-toggle="modal"
                    data-bs-target="#edit_profile"><i class="fa-solid fa-tools me-2"></i>Edit User Profile</button>
                <button type="button" class="btn btn-primary fw-bold px-3 py-2 mb-3" data-bs-toggle="modal"
                    data-bs-target="#change_password"><i class="fa-solid fa-arrow-rotate-left me-2"></i> Change
                    Password</i></button>
            </div>
        </div>
        <div class="col-12 col-md-9 p-0">
            <div class="user_profile_text py-4 ps-5">
                <h3 class="fw-bold mb-3">
                    <?= $user['us_name'] ?>
                </h3>
                <p><i class="fa-solid fa-envelope me-2"></i>
                    <?= $user['us_email'] ?>
                </p>
                <p><i class="fa-solid fa-phone me-2"></i>
                    <?= $user['us_phone'] ?>
                </p>
                <p><i class="fa-solid fa-cake-candles me-2"></i>
                    <?= $user['us_DOB'] ?>
                </p>
                <p><i class="fa-solid fa-flag me-2"></i>
                    <?= $user['us_nationality'] ?>
                </p>
                <p><i class="fa-solid fa-location me-2"></i>
                    <?= $user['us_address'] ?>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Edit Profile Modal -->
<div class="modal fade px-5" id="edit_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form input -->
                <form class="form p-2" id="edform" method="POST" enctype="multipart/form-data"
                    action="./DB/user.process.php?send=update&us_id=<?= $user['us_id'] ?>&pg=admin_profile">
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-capitalize" for="name">Name <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" class="form-control" name="us_edname" id="us_edname"
                                    value="<?= $user['us_name'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-capitalize" for="email">Email <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="email" class="form-control" name="us_edemail" id="us_edemail"
                                    value="<?= $user['us_email'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-capitalize" for="phone">Phone</label>
                                <input type="text" class="form-control" name="us_edphone" id="us_edphone"
                                    value="<?= $user['us_phone'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-capitalize" for="DOB">Date of Birth</label>
                                <input type="date" class="form-control" name="us_edDOB" id="us_edDOB"
                                    value="<?= $user['us_DOB'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-capitalize" for="nationality">Nationality</label>
                                <input type="text" class="form-control" name="us_ednationality" id="us_ednationality"
                                    value="<?= $user['us_nationality'] ?>">
                            </div>
                            <div class="form-group form-switch d-none">
                                <input class="form-check-input" type="checkbox" id="us_edisAdmin" name="us_edisAdmin"
                                    <?= $user['us_isAdmin'] == 1 ? 'checked=checked' : '' ?> value="1">
                                <label class="form-check-label pt-1" for="flexSwitchCheckDefault">Admin</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-capitalize" for="address">Address</label>
                                <textarea class="form-control" id="us_edaddress" name="us_edaddress" rows="3"
                                    style="resize: none"><?= $user['us_address'] ?></textarea>
                            </div>

                            <div class="form-group mb-3 text-center">
                                <label class="w-100 form-label fw-bold text-capitalize">Edit User Profile</label>
                                <label for="us_edimage"
                                    class="btn btn-primary btn-sm text-center py-2 form-label fw-bold text-capitalize">
                                    <i class="fa fa-image me-2"></i>Browse Image
                                </label>
                                <input type="file" name="us_edimage" id="us_edimage" class="d-none">
                                <div id="curr_img" class="mt-3">
                                    <img id="edimage" width="200" src="./assets/images/user/<?= $user['us_image'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning float-end text-dark fw-bold"><i
                            class="fas fa-tools me-2"></i>Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="change_password" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./DB/user.process.php?send=UpdatePassword&us_id=<?= $user['us_id'] ?>&pg=admin_profile"
                    class="form p-2" method="POST">
                    <div class="form-group">
                        <label for="curr_password">Current Password</label>
                        <input type="password" class="form-control" name="curr_password" id="curr_password">
                    </div>
                    <div class="form-group">
                        <label for="txtNewPass">New Password</label>
                        <input type="password" class="form-control" name="txtNewPass" id="txtNewPass">
                    </div>
                    <div class="form-group">
                        <label for="txtConfirmNewPass">Confirm New Password</label>
                        <input type="password" class="form-control" name="txtConfirmNewPass" id="txtConfirmNewPass">
                    </div>
                    <button type="submit" class="btn btn-primary float-right font-weight-bold"><i
                            class="fas fa-save mr-2"></i>Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    _("us_edimage").addEventListener("change", function () {
        const files = _("us_edimage").files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
                _("edimage").setAttribute("src", this.result);
            });
        }
    });
</script>