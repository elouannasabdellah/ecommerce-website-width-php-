
  <?php
  
  include('server/connection.php');

      if(isset($_GET['product_id'])){

       $product_id =$_GET['product_id'];

        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id =? ");  // pour la securite

        $stmt->bind_param('i', $product_id);  //i = entider d: descimal s:chaine de caractere
     
         $stmt->execute();
    
       $product =  $stmt->get_result();

        //no product id donc go to index.php
      }else{
        header("location:index.php");
      }
  
  ?>

      <!-- nav -->

     <?php include("layout/header.php"); ?>  


      <!-- single product -->

      <section class=" container single-product my-5 pt-5" >

        <div class="row mt-5">

        <?php  while($row= $product->fetch_assoc()) { ?>


            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" id="mainImg" src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image'] ?>" class="small-img" width="100%" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2'] ?>" class="small-img" width="100%" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3'] ?>" class="small-img" width="100%" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4'] ?>" class="small-img" width="100%" alt="">
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12 col-sm-12">
                <h6>Men/Shoes</h6>
                <h3 class="py-4" ><?php echo $row['product_name'] ?></h3>
                <h2><?php echo $row['product_price'] ?>$</h2>

                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"  >
                  <input type="hidden" name="product_image" value="<?php echo $row['product_image'] ?>" >
                  <input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>" >
                  <input type="hidden" name="product_price" value="<?php echo $row['product_price'] ?>" >

                  <input type="number" name="product_quantity" value="1" >
                  <button class="buy-btn" type="submit" name="add_to_cart" >Add To Cart</button>

                </form>
               
                <h4 class="mt-5 mb-3" >Product detaails</h4>
                <span> <?php echo $row['product_description'] ?>
                </span>
            </div>

            <?php } ?>

        </div>

      </section>


      <!-- Realated products -->

      <section id="Realated products" class="my-5 ">
        <div class="container text-center mt-5 py-5 ">
            <h3>Realated products</h3>
            <hr class="mx-auto" >
         
        </div>
        <div class="row container-fluid" >
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/featured1.jpeg" alt="">
                  <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>

                  </div>
                <h5 class="p-name">Sports Shoes</h5>
                <h4  clas="p-price">199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <!-- two -->
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/featured2.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>

                </div>
              <h5 class="p-name">Sports Shoes</h5>
              <h4  clas="p-price">199.8</h4>
              <button class="buy-btn">Buy Now</button>
          </div>
          <!-- THREE -->
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/featured3.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>

                </div>
              <h5 class="p-name">Sports Shoes</h5>
              <h4  clas="p-price">199.8</h4>
              <button class="buy-btn">Buy Now</button>
          </div>
          <!-- FOR -->
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/featured4.jpeg" alt="">
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>

                </div>
              <h5 class="p-name">Sports Shoes</h5>
              <h4  clas="p-price">199.8</h4>
              <button class="buy-btn">Buy Now</button>
          </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.min.js.map"></script>

    <script>

       var mainImg=  document.getElementById("mainImg");
       var smalImg=  document.getElementsByClassName("small-img");

      // hada tayntab9 ghir 3laa seraa lwla donc ghandero for loop

      //  smalImg[0].onclick=()=>{
      //   mainImg.src = smalImg[0].src;
      //  }

        for(let i=0;i<4 ; i++){

          smalImg[i].onclick=()=>{
            mainImg.src=smalImg[i].src;
          }

        }
    </script>


        <?php  include('layout/footer.php'); ?>

</body>
</html>
    