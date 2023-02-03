<?php 

// matjix lpayement ilamakayninx les produit dan s cart

    session_start();

    // verification de Cart est ce que la carte vide ou non ? 

    // if( !empty($_SESSION["cart"]) && isset($_POST['chekout']) ){



    //   // send uder to home page index.php 
    // }else{

    //      header('location: index.php');

       

    // }

    // if not user login 

    if( !isset( $_SESSION['logged_in'])) {
        header("location: login.php");
    }
 

?>


      <?php include("layout/header.php") ?>

   

    <!-- payement -->

      
    <section class="my-5 py-5" >
      <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold" >Payement </h2>
            <hr class="mx-auto">
      </div>
      <div class="mx-auto container text-center ">
            <p> <?php if(isset($_GET['order_status'])) { echo $_GET['order_status']; }  ?> </p>

            <p class="fw-bolder" > Total payement:  <?php if(isset($_SESSION['total'])) { echo $_SESSION['total'] ; } ?> $ </p>

            <?php if(isset($_SESSION['total']) && $_SESSION['total']!=0 ) {  ?>   <!--  hna ilamakaynx le price matafichach had Pay now -->
           
              <input type="submit" class="btn btn-primary" value="Pay Now" >
           
              <?php }else { ?>
           
                 <p>You don't have an order</p>
           
             <?php } ?>

          
      </div>
  </section>

























  <!-- Footer -->

  <footer class="mt-5 py-5" >
      <div class="row container mx-auto pt-5">
          <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
              <img src="" alt="">
              <p class="pt-3" >We Provide the Best products for the affordable prices</p>
          </div>

          <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
              <h5 class="pb-2" >Featured</h5>
              <ul class="text-uppercase">
                  <li><a href="#">men</a></li>
                  <li><a href="#">women</a></li>
                  <li><a href="#">boys</a></li>
                  <li><a href="#">girls</a></li>
                  <li><a href="#">new arrivals</a></li>   
                  <li><a href="#">Clothes</a></li>

              </ul>
          </div>

          <!-- 3 -->
          <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
              <h5 class="pb-2" >Contact Us</h5>
              <div>
                  <h6 class="text-uppercase" >Adress</h6>
                  <p>1234 Street Name, City</p>
              </div>
              <div>
                  <h6 class="text-uppercase" >Phone</h6>
                  <p>+212 767890439</p>
              </div>
              <div>
                  <h6 class="text-uppercase" >Email</h6>
                  <p>abdellahmath296@gmail.com</p>
              </div>
          </div>
          <!-- 4 -->

          <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
              <h5 class="pb-2" >Instagram</h5>
              <div class="row">
                  <img src="footer1.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                  <img src="footer1.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                  <img src="footer1.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                  <img src="footer1.jpg" class="img-fluid w-25 h-100 m-2" alt="">
                  <img src="footer1.jpg" class="img-fluid w-25 h-100 m-2" alt="">
              </div>
          </div>

      </div>

      <div class="copyright mt-5">
          <div class="row container mx-auto pt-5">

              <div class="col-lg-4 col-md-6 col-sm-12 mb-4   " >
                  <img src="assets/imgs/payment.jpeg" alt="">
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12 pt-2  text-center  text-nowrap" >
                   <p>e-commerce @ 2022 All Right Reserved</p>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12 text-center  " >
                  <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                  <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                  <a href="#"><i class="fa-brands fa-twitter"></i></a>
             </div>

          </div>
      </div>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap.min.js.map"></script>

</body>
</html>