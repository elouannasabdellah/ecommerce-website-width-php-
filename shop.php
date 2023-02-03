

<?php

    include("server/connection.php");

  //use the search products

  if(isset($_POST["search"])){

    $categorie= $_POST['category'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE 	product_category=? AND	product_price<=? ");

    $stmt->bind_param("si", $categorie , $price );
 
    $stmt->execute();

    $pdocucts =  $stmt->get_result();



    //return all products
  }else{

    $stmt = $conn->prepare("SELECT * FROM products ");
 
    $stmt->execute();

    $pdocucts =  $stmt->get_result();

  }
      



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css.map">
    <title>Shop</title>

    <style>
        .product img{
            width:100%;
            height:auto;
            box-sizing: border-box;
            object-fit: cover;
        }
        .pagination a{
            color:coral;
        }
        .pagination li:hover a{
            color:#fff;
            background-color: coral;
        }
    </style>

</head>
<body>


<!-- navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top ">
  <div class="container-fluid">
      <img src="assets/imgs/logo.jpg" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-buttons " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>

        <li class="nav-item">
          <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
           <a href="account.php"><i class="fa-solid fa-user-large"></i></a> 
        </li>

       
      </ul>
  
    </div>
  </div>
</nav>


  <!-- search  -->

    <section style="float:left;" id="search" class=" my-1 py-3" >

      <div class="container mt-5 py-5" >
        <p>Search Products</p>
        <hr>
      </div>

        <form action="shop.php" method="POST" >
            <div class=" row container mx-auto ">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <p>Category</p>
                    <div class="form-check">
                       <input type="radio" class="form-check-input" value="shoes" name="category" id="categorie_one" >
                       <label class="form-check-label" for="categorie_one">
                        Shoes
                       </label>
                    </div>

                    <div class="form-check">
                      <input type="radio" class="form-check-input" value="coats" name="category" id="categorie_two"  >
                      <label class="form-check-label" for="categorie_two">
                        Coats
                      </label>
                   </div>

                   <div class="form-check">
                    <input type="radio" class="form-check-input" value="watches" name="category" id="categorie_tree" >
                    <label class="form-check-label" for="categorie_tree">
                     Watches
                    </label>
                  </div>

                  <div class="form-check">
                    <input type="radio" class="form-check-input" value="bags" name="category" id="categorie_for" checked >
                    <label class="form-check-label" for="categorie_for">
                     Bags
                    </label>
                  </div>

                </div>

            </div>


            <div class="row mx-auto container mt-5">
              <div class="col-lg-12 col-md-12 col-sm-12">
  
                <p>Price</p>
                <input type="range" name="price" value="100" class="form-rang w-50" min="1" max="1000" id="customeRange2" >
                <div class="w-50" >
                    <span style="float:left" >1</span>
                    <span  style="float:right;" >1000</span>
                </div>
  
              </div>
          </div>
  
          <div class="form-group my-3 mx-3" >
              <input type="submit" name="search" value="Search" class="btn btn-primary" >
          </div>

        </form>

     
    </section>



   
   
     <!-- Shop -->
    <section id="featured" class="my-3 py-3 ">
        <div class="container  mt-5 py-5 ">
            <h3>Our Products</h3>
            <hr class="" >
            <p>Here you can check Our Products</p>
        </div>

        <div class="row mx-auto container" >

          <?php while($row = $pdocucts->fetch_assoc()) { ?>

            <div   class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo  $row['product_image'] ;?>" alt="product_image">
                  <div class="star">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>

                  </div>
                <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
                <!-- <h4  clas="p-price">199.8</h4> -->
                <h4  clas="p-price"> <?php echo $row['product_price'] ;?> </h4>
                <button class="buy-btn"><a style="color:#fff" href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>">Buy Now</a></button>
            </div>
           
            <?php } ?>

        <!-- tar9im safahat -->

        <nav aria-label="Page navigation exemple" >
            <ul class="pagination mt-5" >
                <li class="page-item" ><a class="page-link" href="#">Previous</a></li>
                <li class="page-item" ><a class="page-link" href="#">1</a></li>
                <li class="page-item" ><a class="page-link" href="#">2</a></li>
                <li class="page-item" ><a class="page-link" href="#">3</a></li>
                <li class="page-item" ><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>

        </div>
    </section>



    <?php include('layout/footer.php') ?>