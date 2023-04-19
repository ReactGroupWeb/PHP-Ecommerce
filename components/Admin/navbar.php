<nav class="navbar p-0 fixed-top d-flex flex-row" style="z-index:888;">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="/"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    <ul class="navbar-nav w-100"></ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
          <div class="navbar-profile">
            <div class="count-indicator rounded-circle profile-img"></div>
            <p class="mb-0 d-none d-sm-block navbar-profile-name">
              <?= $us_name ?>
            </p>
            <i class="fa fa-caret-down d-none d-sm-block ms-1"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
          <a class="dropdown-item preview-item" href="/admin_profile">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa fa-user text-success" aria-hidden="true"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Profile</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item" href="/admin_profile">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa fa-cog text-primary" aria-hidden="true"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item" href="../../DB/auth.php?clear=logout">
            <div class="preview-thumbnail align-middle">
              <div class="preview-icon bg-dark rounded-circle align-middle">
                <i class="fa fa-sign-out text-danger" aria-hidden="true"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Log out</p>
            </div>
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
  </div>
</nav>