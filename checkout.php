  <?php 

  // matjix lchekout ilamakayninx les produit dan s cart

      session_start();

      // verification de Cart est ce que la carte vide ou non ? 

      // && isset($_POST['chekout'])  Mais annulitha

      if( !empty($_SESSION["cart"]) ){  



        // send uder to home page index.php 
      }else{

           header('location: index.php');

      }

  ?>


      <!-- header navbar -->

      <?php include("layout/header.php") ?>



      <!-- checkout -->

        
      <section class="my-5 py-5" >
        <div class="container text-center mt-3 pt-5">
              <h2 class="form-weight-bold" >Check Out</h2>
              <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form method="POST" action="server/place_order.php" id="chekcout-form">

              <p class="text-center"  style="color:red;font-weight:bold;" > <?php if(isset($_GET['error_order'])) echo $_GET['error_order']; ?> 
    </br>
                    <?php if(isset($_GET['error_order'])) { ?>
                        <a class=" mt-3 btn btn-primary" href="login.php">Login</a>
                    <?php } ?>

              </p>

              <div class="form-group checkout-small-element ">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" id="checkout-name" placeholder="name" required >
              </div>
                <div class="form-group checkout-small-element ">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="checkout-email" placeholder="Email Ici" required >
                </div>
                <div class="form-group checkout-small-element">
                  <label for="">Phone</label>
                  <input type="tel" class="form-control" name="phone" id="checkout-phone" placeholder="Phone" required >
              </div>
              <div class="form-group checkout-small-element ">
                  <label for="">City</label>
                  <input type="text" class="form-control" name="city" id="checkout-city" placeholder="City" required >
              </div>
              <div class="form-group checkout-larg-element ">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" id="checkout-adress" placeholder="address" required >
            </div>
              <div class="form-group checkout-btn-container ">
                  <h5>Total amount :  <?php  echo $_SESSION['total']; ?> $</h5>
                  <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order" />
              </div>
            
            </form>
        </div>
    </section>



    <!-- Footer -->

   <?php  include('layout/footer.php'); ?>