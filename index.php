

    <?php include("layout/header.php");?>



      <!-- Home -->

      <section id="home">
          <div class="container" >
              <h5>NEW ARRIVIALS</h5>
              <h1><span>Best Prices</span>  This Season</h1>
              <p>Eshop Offers the Best products for the most affordable prices</p>
              <button>Sop Now</button>
          </div>
      </section>

      <!-- brand -->

      <section id="brand" class="container">

        <div class="row">
            <img class="img-fluide col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpeg" alt="">
            <img class="img-fluide col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpeg" alt="">
            <img class="img-fluide col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpeg" alt="">
            <img class="img-fluide col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpeg" alt="">

        </div>

      </section>

      <!-- New -->

      <section id="new" class="w-100" >
        <div class="row p-0 m-0">
            <!-- one -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluide" src="assets/imgs/1.jpeg" alt="">
                <div class="details">
                    <h2>Extreamely Awesome Shoes</h2>
                    <button class="text-uppercase" >Shop Now</button>
                </div>
            </div>
            <!-- TWO -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluide" src="assets/imgs/2.jpeg" alt="">
                <div class="details">
                    <h2> Awesome Jacket</h2>
                    <button class="text-uppercase" >Shop Now</button>
                </div>
            </div>

            <!-- Three -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluide" src="assets/imgs/3.jpeg" alt="">
                <div class="details">
                    <h2>50% OFF Watches</h2>
                    <button class="text-uppercase" >Shop Now</button>
                </div>
            </div>

          
        </div>
      </section>

      <!-- Feature -->
      <section id="featured" class="my-5 ">
          <div class="container text-center mt-5 py-5 ">
              <h3>Our Featured</h3>
              <hr class="mx-auto" >
              <p>Here you can check Our Featured Products</p>
          </div>
          <div class="row container-fluid" >
              
            <?php include("server/get_featured.products.php"); ?>

            <?php while($row=$featured_pdocucts->fetch_assoc()) { ?>

              <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                  <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?> " alt="">
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>

                    </div>
                  <h5 class="p-name"> <?php echo $row['product_name'] ?> </h5>
                  <h4  clas="p-price"> <?php echo $row['product_price'] ?> $ </h4>
                  <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"> <button class="buy-btn">Buy Now</button></a>
                  <!-- methode 2 -->
                  <!-- <a href="<?php echo "single_product.php?productid=".$row['product_id'] ?>"> <button class="buy-btn">Buy Now</button></a> -->
              </div>

              <?php } ?>
              <!-- two -->
         
          </div>
      </section>

      <!-- Banner -->

     <section id="banner" class="my-5 py-5" >
         <div class="container">
             <h4>MID SEASON,S SALE</h4>
             <h1>Autumn Collection <br> UP to 30% OFF </h1>
             <button class="text-uppercase" >Shop now</button>
         </div>
     </section> 

     <!-- Clothes -->

     <section id="Clothes" class="my-5 ">
        <div class="container text-center mt-5 py-5 ">
            <h3>Dresses & Coats</h3>
            <hr class="mx-auto" >
            <p>Here you can check Our Amazing Clothes</p>
        </div>
        <div class="row container-fluid" >

        <?php include ('server/get_coats.php') ?> 
        
        <?php while($row=$coats_pdocucts->fetch_assoc()){ ?>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
                  <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>

                  </div>
                <h5 class="p-name"> <?php echo $row['product_name'] ?> </h5>
                <h4  clas="p-price"> <?php echo $row['product_price'] ?> $</h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
            </div>

            <?php } ?>

            <!-- two -->
        </div>
       
    <!-- Watches -->

    <section id="watches" class="my-5 ">
        <div class="container text-center mt-5 py-5 ">
            <h3>Best watches</h3>
            <hr class="mx-auto" >
            <p>check Out Our unique  Shoes</p>
        </div>
        <div class="row container-fluid" >

            <?php include('server/get_watches.php') ?>

            <?php while( $row= $watches_pdocucts->fetch_assoc()) { ?>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
                  <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>

                  </div>
                <h5 class="p-name"> <?php echo $row['product_name'] ?>  </h5>
                <h4  clas="p-price"> <?php echo $row['product_price'] ?> $</h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
            </div>
      
            <?php } ?>
            

    <!-- Shoes -->

    <section id="featured" class="my-5 ">
        <div class="container text-center mt-5 py-5 ">
            <h3>Shoes</h3>
            <hr class="mx-auto" >
            <p>Here you can check Our Amazing Shoes</p>
        </div>
        <div class="row container-fluid" >

            <?php include("server/get_shoes.php") ?>

            <?php while( $row = $shoes_pdocucts->fetch_assoc() ) { ?>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'] ?> " alt="">
                  <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>

                  </div>
                <h5 class="p-name"> <?php echo $row['product_name'] ?>  </h5>
                <h4  clas="p-price"> <?php echo $row['product_price'] ?> $</h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a> 
                 
            </div>
            <!-- two -->

            <?php } ?>
            
         
         
        </div>
    </section>


    


    <!-- Footer -->

        <?php  include('layout/footer.php'); ?>

