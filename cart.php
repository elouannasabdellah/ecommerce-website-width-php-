
    <?php
    
        session_start();


        if(isset($_POST['add_to_cart'])){

            //if user has already added a product to cart  : hna dfnayad le produit 

            if(isset($_SESSION['cart'])){


                $products_array_ids= array_column($_SESSION['cart'],'product_id');

                // wax nit le produit tzad elala ? oui or no ! 
                if( !in_array($_POST['product_id'] , $products_array_ids )){

                    $product_id= $_POST['product_id'];

                        $product_array= array(
                                    'product_id'=>$_POST['product_id'],
                                    'product_name'=>$_POST['product_name'],
                                    'product_price'=>$_POST['product_price'],
                                    'product_image' =>$_POST['product_image'],
                                    'product_quantity'=>$_POST['product_quantity']
                        );
    
                        $_SESSION['cart'][$product_id] = $product_array;

                // hna le produit already added
                }else{
                    echo "<script>alert('Product Was already to Cart')</script>";
                    //echo "<script>window.location='index.php';</script>";
                }


              //if this is the first product  : hna awal mra l'utilisateur daf le produit
            }else{

                $product_id= $_POST['product_id'];
                 $product_name= $_POST['product_name'];
                 $product_price = $_POST['product_price'];
                 $product_image = $_POST['product_image'];
                 $product_quantity=  $_POST['product_quantity'];

                 $product_array= array(

                                'product_id' => $product_id,
                                'product_name' => $product_name,
                                'product_price' => $product_price,
                                'product_image' => $product_image,
                                'product_quantity' => $product_quantity
                 );

                 $_SESSION['cart'][$product_id] = $product_array;
                
            }

            // Calculate totale de cart 3ytna 3la la fonction kolmra kanzide fiha le produit
            calculateTotalCart();


        //remove product **********************************************
        }else if(isset($_POST['remove_product'])){

            $product_id = $_POST['product_id'];
            unset( $_SESSION['cart'][$product_id] );

                 // Calculate totale de cart 3ytna 3la la fonction kolmra kanzide fiha le produit
                 calculateTotalCart();

        //update product  ***********************************************************

        }else if(isset($_POST['edit_quantity'])){

            //we get id and quantity from the form
            $product_id = $_POST['product_id'];
            $product_quantity = $_POST['product_quantity'];

            //get the product array from the session 

            $product_array=$_SESSION['cart'][$product_id];

            //update product quantity
            $product_array['product_quantity']= $product_quantity;

            //return array back its place
            $_SESSION['cart'][$product_id]= $product_array;

                 // Calculate totale de cart 3ytna 3la la fonction kolmra kanzide fiha le produit
                 calculateTotalCart();

        }
        else{
          //  header("location:index.php");
        }


        //function calculate total price  de cart 
        function calculateTotalCart(){

            $total = 0;

            foreach( $_SESSION['cart'] as $key => $value ){


                $product =$_SESSION['cart'][$key];

                $price = $product['product_price'];
                $quantity= $product['product_quantity'];

                $total = $total + ($price * $quantity) ;

            }
            $_SESSION['total']=$total;
        }
    
    ?>





        <!-- header nav -->


        <?php include("layout/header.php")  ?>



      <!-- Cart -->
      <section class="cart container my-3 py-5" >
        <div class="container mt-5">
            <h2 class="font-weight-bolde" >Your Cart</h2>
            <hr>
        </div>
        
        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Sybtoral</th>
            </tr>

                <!-- Avant php  -->

            <!-- <tr>
                <td>
                    <div class="prodcut-info">
                        <img src="assets/imgs/featured1.jpeg" alt="">
                        <div>
                            <p>white Shoes</p>
                            <small><span>$</span>155</small></br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                  
                </td>
                <td>
                    <input type="number" value="1" name="" id="">
                    <a class="edit-btn" href="">Edit</a>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price" >155</span>
                </td>
            </tr> -->

        <!-- Apres php  -->

        <?php  if(isset($_SESSION['cart'])) { 
            
            foreach($_SESSION['cart'] as $key => $value )
            
            { ?>

            <tr>
                <td>
                    <div class="prodcut-info">
                        <img src="assets/imgs/<?php if(isset($value['product_image'])) { echo $value['product_image']; } ?>" alt="not find">
                        <div>
                            <p> <?php if(isset($value['product_name'])) { echo $value['product_name']; }  ?> </p>
                            <small><span>$</span><?php if(isset($value['product_price'] )) {echo $value['product_price'] ;} ?></small></br>
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php if(isset($value['product_id'])) {echo $value['product_id'];}  ?>" >
                                <input type="submit" name="remove_product" class="remove-btn" value="Remove" style="background-color:#fff;width:100%;border:none;color:#fb774b" >
                            </form>
                        </div>
                    </div>
                  
                </td>
                <td>
                   
                    <form method="POST" action="cart.php">
                         <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" >
                        <input type="number" name="product_quantity" min="1" value="<?php if(isset( $value['product_quantity'])) { echo  $value['product_quantity'];} ; ?>">
                        <input type="submit" class="edit-btn"  value="edit"  name="edit_quantity" style="background-color:#fff;border:none;color:#fb774b" >
                    </form>
                    <!-- <a class="edit-btn" href="">Edit</a> -->
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price" ><?php  echo $value['product_quantity'] *  $value['product_price']; ?></span>
                </td>
            </tr>

            <?php } }?>

        </table>


        <div class="cart-total">
         <table>
             <!-- <tr>
                 <td>Subtotal</td>
                 <td>$155</td>
             </tr> -->
             <tr>
                 <td>Total</td>
                 <td>$ <?php echo  $_SESSION['total']; ?></td>
             </tr>
         </table>
        </div>

        <div class="checkout-container">
            <form method="POST" action="checkout.php">
                <input class="btn checkout-btn" type="submit" value="Chekout" name="chekout" >
            </form>
            <!-- <button class="btn checkout-btn" >Checkout</button> -->
        </div>


      </section>
   






       <!-- Footer -->

    <?php  include("layout/footer.php"); ?>