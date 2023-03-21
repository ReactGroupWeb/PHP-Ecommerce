<?php $heading = "Order Detail" ?>
<div class="container-scroller">
     <!-- Sidebar Component -->
     <?php require 'components/Admin/sidebar.php'; ?>
     <div class="container-fluid page-body-wrapper">
          <?php require 'components/Admin/navbar.php'; ?>
          <div class="main-panel">
               <div class="content-wrapper">
                    <div class="row">
                         <div class="col-lg-12 grid-margin stretch-card">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="row">
                                             <div class="col-6">
                                                  <h3 class="page-title">
                                                       <?= $heading; ?>
                                                  </h3>
                                             </div>
                                             <div class="col-6 mb-3">
                                                  <a href="/admin_order"
                                                       class="btn btn-success btn-sm float-end py-2"><i
                                                            class="fas fa-arrow-left me-2"></i>Back</a>
                                             </div>
                                             <div class="col-md-4">
                                                  <div class="row">
                                                       <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                                            <div class="card bg-secondary">
                                                                 <div class="card-header">ORDERS DETAILS</div>
                                                                 <div class="card-body">
                                                                      <table class="table table-secondary p-0">
                                                                           <tbody>
                                                                                <tr>
                                                                                     <th>Order ID</th>
                                                                                     <td>1</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>Order Date</th>
                                                                                     <td>11-03-2023</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>Status</th>
                                                                                     <td>Ordered</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>Delivered Date</th>
                                                                                     <td>11-03-2023</td>
                                                                                </tr>
                                                                           </tbody>
                                                                      </table>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                                            <div class="card bg-secondary">
                                                                 <div class="card-header">TRANSACTION</div>
                                                                 <div class="card-body">
                                                                      <table class="table table-secondary p-0">
                                                                           <tbody>
                                                                                <tr>
                                                                                     <th>Transaction Mode</th>
                                                                                     <td>Cash On Delivery</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>Transaction Status</th>
                                                                                     <td>Purchased</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>Transaction Date</th>
                                                                                     <td>11-03-2023</td>
                                                                                </tr>
                                                                           </tbody>
                                                                      </table>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="col-md-8">
                                                  <div class="row px-3">
                                                       <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                                            <div class="card bg-secondary">
                                                                 <div class="card-header">PRODUCT ITEMS</div>
                                                                 <div class="card-body">
                                                                      <div class="row mb-3">
                                                                           <div class="col-md-4 px-2">
                                                                                <div class="card mb-3 bg-secondary text-dark p-0"
                                                                                     style="max-width: 540px;">
                                                                                     <div class="row g-0">
                                                                                          <div class="col-md-4 my-auto">
                                                                                               <img src="../../assets/images/faces-clipart/pic-1.png"
                                                                                                    width="150"
                                                                                                    class="img-fluid">
                                                                                          </div>
                                                                                          <div class="col-md-8">
                                                                                               <div class="card-body">
                                                                                                    <h5
                                                                                                         class="card-title text-dark">
                                                                                                         Product 1</h5>
                                                                                                    <p
                                                                                                         class="card-text">
                                                                                                         Price: $150.00
                                                                                                    </p>
                                                                                               </div>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                           <div class="col-md-4 px-2">
                                                                                <div class="card mb-3 bg-secondary text-dark p-0"
                                                                                     style="max-width: 540px;">
                                                                                     <div class="row g-0">
                                                                                          <div class="col-md-4 my-auto">
                                                                                               <img src="../../assets/images/faces-clipart/pic-1.png"
                                                                                                    width="150"
                                                                                                    class="img-fluid">
                                                                                          </div>
                                                                                          <div class="col-md-8">
                                                                                               <div class="card-body">
                                                                                                    <h5
                                                                                                         class="card-title text-dark">
                                                                                                         Product 1</h5>
                                                                                                    <p
                                                                                                         class="card-text">
                                                                                                         Price: $150.00
                                                                                                    </p>
                                                                                               </div>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                           <div class="col-md-4 px-2">
                                                                                <div class="card mb-3 bg-secondary text-dark p-0"
                                                                                     style="max-width: 540px;">
                                                                                     <div class="row g-0">
                                                                                          <div class="col-md-4 my-auto">
                                                                                               <img src="../../assets/images/faces-clipart/pic-1.png"
                                                                                                    width="150"
                                                                                                    class="img-fluid">
                                                                                          </div>
                                                                                          <div class="col-md-8">
                                                                                               <div class="card-body">
                                                                                                    <h5
                                                                                                         class="card-title text-dark">
                                                                                                         Product 1</h5>
                                                                                                    <p
                                                                                                         class="card-text">
                                                                                                         Price: $150.00
                                                                                                    </p>
                                                                                               </div>
                                                                                          </div>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                      <table class="table table-secondary p-0">
                                                                           <tbody>
                                                                                <tr>
                                                                                     <td>SubTotal</td>
                                                                                     <th class="text-end">$150.00</th>
                                                                                </tr>
                                                                                <tr>
                                                                                     <td>Tax</td>
                                                                                     <th class="text-end">$15.00</th>
                                                                                </tr>
                                                                                <tr>
                                                                                     <td>Shipping</td>
                                                                                     <th class="text-end">Free Shipping
                                                                                     </th>
                                                                                </tr>
                                                                                <tr>
                                                                                     <td>Total</td>
                                                                                     <th class="text-end">$165.00</th>
                                                                                </tr>
                                                                           </tbody>
                                                                      </table>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <div class="col-12 mb-3 rounded bg-secondary text-dark p-0">
                                                            <div class="card bg-secondary">
                                                                 <div class="card-header">BILLING DETAILS</div>
                                                                 <div class="card-body">
                                                                      <table class="table table-secondary p-0">
                                                                           <tbody>
                                                                                <tr>
                                                                                     <th>Name</th>
                                                                                     <td>Customer 1</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>Email</th>
                                                                                     <td>customer@gmail.com</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>Phone</th>
                                                                                     <td>+855 123 456 789</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>Shipping Address</th>
                                                                                     <td>H999 St3000, Sangkat K'teas
                                                                                          Hous, Khan Veak Cha, Phnom
                                                                                          Penh, Cambodia</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>City/Province</th>
                                                                                     <td>Phnom Penh</td>
                                                                                </tr>
                                                                                <tr>
                                                                                     <th>Country</th>
                                                                                     <td>Cambodia</td>
                                                                                </tr>
                                                                           </tbody>
                                                                      </table>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- Footer Component -->
               <?php require 'components/Admin/footer.php'; ?>
          </div>
     </div>

</div>