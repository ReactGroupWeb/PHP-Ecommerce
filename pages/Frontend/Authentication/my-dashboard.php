<!-- Menu NavBar Section -->
<?php require 'components/Frontend/menu-navbar.php'; ?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
     <div class="container">
          <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                         <p>Fresh and Organic</p>
                         <h1>My Dashboard</h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- end breadcrumb section -->


<!-- Dashboard Record  -->
<div class="container mt-5">
     <div class="row">
          <div class="col-lg-4 col-md-6">
               <div class="single-latest-news">
                    <div class="latest-news-bg news-bg-1" style="background-image: url(../../assets/frontend/img/dashboard/bg-1.jpg)"></div>
                    <div class="card mb-3 py-3 dashboard-item">
                         <div class="row my-auto">
                              <div class="col-md-4 my-auto text-center">
                                   <i class="fas fa-wallet dashboard-item-icon"></i>
                              </div>
                              <div class="col-md-8 text-end">
                                   <div class="card-body">
                                        <h3 class="card-title text-light">Total Cost</h3>
                                        <h4 class="card-text text-light font-weight-bold">$1035.00</h4>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-4 col-md-6">
               <div class="single-latest-news">
                    <div class="latest-news-bg news-bg-2" style="background-image: url(../../assets/frontend/img/dashboard/bg-2.jfif)"></div>
                    <div class="card mb-3 py-3 dashboard-item">
                         <div class="row my-auto">
                              <div class="col-md-4 my-auto text-center">
                                   <i class="fas fa-cash-register dashboard-item-icon"></i>
                              </div>
                              <div class="col-md-8 text-end">
                                   <div class="card-body">
                                        <h3 class="card-title text-light">Total Purchased</h3>
                                        <h4 class="card-text text-light font-weight-bold">$1035.00</h4>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-4 col-md-6">
               <div class="single-latest-news">
                    <div class="latest-news-bg news-bg-3" style="background-image: url(../../assets/frontend/img/dashboard/bg-3.jpg)"></div>
                    <div class="card mb-3 py-3 dashboard-item">
                         <div class="row my-auto">
                              <div class="col-md-4 my-auto text-center">
                                   <i class="fas fa-truck dashboard-item-icon"></i>
                              </div>
                              <div class="col-md-8 text-end">
                                   <div class="card-body">
                                        <h3 class="card-title text-light">Total Delivered</h3>
                                        <h4 class="card-text text-light font-weight-bold">100</h4>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- End of Dashboard Record -->


<!-- List of Order Item Box -->
<div class="container mb-5">
     <div class="row">
          <div class="col-12 text-center">
               <h3>Latest Order</h3>
          </div>
     </div>
     <div class="row my-4">
          <div class="col-4 text-center">
               <div class="card mb-3 py-3 border border-danger" style="border: 5px solid #dc3545 !important">
                    <div class="row my-auto">
                         <div class="col-md-5 my-auto text-center">
                              <img src="../../assets/frontend/img/avaters/avatar1.png" width="75" class="rounded-circle">
                              <div class="px-3 mt-3 mb-2">
                                   <h6 class="bg-danger font-weight-bold my-2 py-1 text-light">Ordered</h6>
                              </div>
                              <p>
                                   <a href="/my-dashboard/order-detail" class="btn btn-primary btn-sm text-light font-weight-bold"><i class="fas fa-eye mr-2"></i>Detail</a>
                              </p>
                         </div>
                         <div class="col-md-7 text-right">
                              <div class="card-body">
                                   <p class="m-0 card-title"><span class="font-weight-bold">No.</span> 1</p>
                                   <p class="m-0 card-title">Joe Cole</p>
                                   <p class="m-0 card-text">joe.cole@gmail.com</p>
                                   <p class="m-0 card-text">+(855) 123 456 789</p>
                                   <p class="m-0 card-text font-weight-bold">$150.00</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-4 text-center">
               <div class="card mb-3 py-3 border border-warning" style="border: 5px solid #ffc107 !important">
                    <div class="row my-auto">
                         <div class="col-md-5 my-auto text-center">
                              <img src="../../assets/frontend/img/avaters/avatar2.png" width="75" class="rounded-circle">
                              <div class="px-3 mt-3 mb-2">
                                   <h6 class="bg-warning font-weight-bold my-2 py-1 text-dark">Delivering</h6>
                              </div>
                              <p>
                                   <a href="#" class="btn btn-success btn-sm text-light"><i class="fas fa-check"></i></a>
                                   <a href="/my-dashboard/order-detail" class="btn btn-primary btn-sm text-light font-weight-bold"><i class="fas fa-eye mr-2"></i>Detail</a>
                              </p>
                         </div>
                         <div class="col-md-7 text-right">
                              <div class="card-body">
                                   <p class="m-0 card-title"><span class="font-weight-bold">No.</span> 2</p>
                                   <p class="m-0 card-title">Joe Cole</p>
                                   <p class="m-0 card-text">joe.cole@gmail.com</p>
                                   <p class="m-0 card-text">+(855) 123 456 789</p>
                                   <p class="m-0 card-text font-weight-bold">$150.00</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-4 text-center">
               <div class="card mb-3 py-3 border border-success" style="border: 5px solid #28a745 !important">
                    <div class="row my-auto">
                         <div class="col-md-5 my-auto text-center">
                              <img src="../../assets/frontend/img/avaters/avatar3.png" width="75" class="rounded-circle">
                              <div class="px-3 mt-3 mb-2">
                                   <h6 class="bg-success font-weight-bold my-2 py-1 text-light">Succes</h6>
                              </div>
                              <p>
                                   <a href="/my-dashboard/order-detail" class="btn btn-primary btn-sm text-light font-weight-bold"><i class="fas fa-eye mr-2"></i>Detail</a>
                              </p>
                         </div>
                         <div class="col-md-7 text-right">
                              <div class="card-body">
                                   <p class="m-0 card-title"><span class="font-weight-bold">No.</span> 3</p>
                                   <p class="m-0 card-title">Joe Cole</p>
                                   <p class="m-0 card-text">joe.cole@gmail.com</p>
                                   <p class="m-0 card-text">+(855) 123 456 789</p>
                                   <p class="m-0 card-text font-weight-bold">$150.00</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-4 text-center">
          <div class="card mb-3 py-3 border border-success" style="border: 5px solid #28a745 !important">
                    <div class="row my-auto">
                         <div class="col-md-5 my-auto text-center">
                              <img src="../../assets/frontend/img/avaters/avatar2.png" width="75" class="rounded-circle">
                              <div class="px-3 mt-3 mb-2">
                                   <h6 class="bg-success font-weight-bold my-2 py-1 text-light">Succes</h6>
                              </div>
                              <p>
                                   <a href="/my-dashboard/order-detail" class="btn btn-primary btn-sm text-light font-weight-bold"><i class="fas fa-eye mr-2"></i>Detail</a>
                              </p>
                         </div>
                         <div class="col-md-7 text-right">
                              <div class="card-body">
                                   <p class="m-0 card-title"><span class="font-weight-bold">No.</span> 4</p>
                                   <p class="m-0 card-title">Joe Cole</p>
                                   <p class="m-0 card-text">joe.cole@gmail.com</p>
                                   <p class="m-0 card-text">+(855) 123 456 789</p>
                                   <p class="m-0 card-text font-weight-bold">$150.00</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-4 text-center">
               <div class="card mb-3 py-3 border border-success" style="border: 5px solid #28a745 !important">
                    <div class="row my-auto">
                         <div class="col-md-5 my-auto text-center">
                              <img src="../../assets/frontend/img/avaters/avatar3.png" width="75" class="rounded-circle">
                              <div class="px-3 mt-3 mb-2">
                                   <h6 class="bg-success font-weight-bold my-2 py-1 text-light">Succes</h6>
                              </div>
                              <p>
                                   <a href="/my-dashboard/order-detail" class="btn btn-primary btn-sm text-light font-weight-bold"><i class="fas fa-eye mr-2"></i>Detail</a>
                              </p>
                         </div>
                         <div class="col-md-7 text-right">
                              <div class="card-body">
                                   <p class="m-0 card-title"><span class="font-weight-bold">No.</span> 5</p>
                                   <p class="m-0 card-title">Joe Cole</p>
                                   <p class="m-0 card-text">joe.cole@gmail.com</p>
                                   <p class="m-0 card-text">+(855) 123 456 789</p>
                                   <p class="m-0 card-text font-weight-bold">$150.00</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-4 text-center">
               <div class="card mb-3 py-3 border border-danger" style="border: 5px solid #dc3545 !important">
                    <div class="row my-auto">
                         <div class="col-md-5 my-auto text-center">
                              <img src="../../assets/frontend/img/avaters/avatar1.png" width="75" class="rounded-circle">
                              <div class="px-3 mt-3 mb-2">
                                   <h6 class="bg-danger font-weight-bold my-2 py-1 text-light">Ordered</h6>
                              </div>
                              <p>
                                   <a href="/my-dashboard/order-detail" class="btn btn-primary btn-sm text-light font-weight-bold"><i class="fas fa-eye mr-2"></i>Detail</a>
                              </p>
                         </div>
                         <div class="col-md-7 text-right">
                              <div class="card-body">
                                   <p class="m-0 card-title"><span class="font-weight-bold">No.</span> 6</p>
                                   <p class="m-0 card-title">Joe Cole</p>
                                   <p class="m-0 card-text">joe.cole@gmail.com</p>
                                   <p class="m-0 card-text">+(855) 123 456 789</p>
                                   <p class="m-0 card-text font-weight-bold">$150.00</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-4 text-center">
               <div class="card mb-3 py-3 border border-warning" style="border: 5px solid #ffc107 !important">
                    <div class="row my-auto">
                         <div class="col-md-5 my-auto text-center">
                              <img src="../../assets/frontend/img/avaters/avatar3.png" width="75" class="rounded-circle">
                              <div class="px-3 mt-3 mb-2">
                                   <h6 class="bg-warning font-weight-bold my-2 py-1 text-dark">Delivering</h6>
                              </div>
                              <p>
                                   <a href="#" class="btn btn-success btn-sm text-light"><i class="fas fa-check"></i></a>
                                   <a href="/my-dashboard/order-detail" class="btn btn-primary btn-sm text-light font-weight-bold"><i class="fas fa-eye mr-2"></i>Detail</a>
                              </p>
                         </div>
                         <div class="col-md-7 text-right">
                              <div class="card-body">
                                   <p class="m-0 card-title"><span class="font-weight-bold">No.</span> 7</p>
                                   <p class="m-0 card-title">Joe Cole</p>
                                   <p class="m-0 card-text">joe.cole@gmail.com</p>
                                   <p class="m-0 card-text">+(855) 123 456 789</p>
                                   <p class="m-0 card-text font-weight-bold">$150.00</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-4 text-center">
               <div class="card mb-3 py-3 border border-danger" style="border: 5px solid #dc3545 !important">
                    <div class="row my-auto">
                         <div class="col-md-5 my-auto text-center">
                              <img src="../../assets/frontend/img/avaters/avatar2.png" width="75" class="rounded-circle">
                              <div class="px-3 mt-3 mb-2">
                                   <h6 class="bg-danger font-weight-bold my-2 py-1 text-light">Ordered</h6>
                              </div>
                              <p>
                                   <a href="/my-dashboard/order-detail" class="btn btn-primary btn-sm text-light font-weight-bold"><i class="fas fa-eye mr-2"></i>Detail</a>
                              </p>
                         </div>
                         <div class="col-md-7 text-right">
                              <div class="card-body">
                                   <p class="m-0 card-title"><span class="font-weight-bold">No.</span> 8</p>
                                   <p class="m-0 card-title">Joe Cole</p>
                                   <p class="m-0 card-text">joe.cole@gmail.com</p>
                                   <p class="m-0 card-text">+(855) 123 456 789</p>
                                   <p class="m-0 card-text font-weight-bold">$150.00</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-4 text-center">
               <div class="card mb-3 py-3 border border-warning" style="border: 5px solid #ffc107 !important">
                    <div class="row my-auto">
                         <div class="col-md-5 my-auto text-center">
                              <img src="../../assets/frontend/img/avaters/avatar1.png" width="75" class="rounded-circle">
                              <div class="px-3 mt-3 mb-2">
                                   <h6 class="bg-warning font-weight-bold my-2 py-1 text-dark">Delivering</h6>
                              </div>
                              <p>
                                   <a href="#" class="btn btn-success btn-sm text-light"><i class="fas fa-check"></i></a>
                                   <a href="/my-dashboard/order-detail" class="btn btn-primary btn-sm text-light font-weight-bold"><i class="fas fa-eye mr-2"></i>Detail</a>
                              </p>
                         </div>
                         <div class="col-md-7 text-right">
                              <div class="card-body">
                                   <p class="m-0 card-title"><span class="font-weight-bold">No.</span> 9</p>
                                   <p class="m-0 card-title">Joe Cole</p>
                                   <p class="m-0 card-text">joe.cole@gmail.com</p>
                                   <p class="m-0 card-text">+(855) 123 456 789</p>
                                   <p class="m-0 card-text font-weight-bold">$150.00</p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<!-- End of List of Order Item Box -->


<!-- Logo Carousel Section -->
<?php require 'components/Frontend/logo-carousel.php'; ?>

<!-- Copyrights Section -->
<?php require 'components/Frontend/copyrights.php'; ?>