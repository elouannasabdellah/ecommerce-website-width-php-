
<?php 

    include('server/connection.php');

    if(isset($_POST['order_details_btn']) && isset($_POST['order_id']) ){

        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'] ;

       $stmt = $conn->prepare('SELECT * FROM order_items WHERE order_id= ? ');

        $stmt->bind_param("i",  $order_id);

        $stmt->execute();

        $order_details = $stmt->get_result();
    }
    else{
        header("location:account.php");
        exit;
    }


?>

    <?php include("layout/header.php") ?>


    
                <!-- Orders details -->
                <section id="orders" class="orders container py-2" >
        <div class="container mt-5">
            <h2 class="font-weight-bolde text-center" > Ordes Details </h2>
            <hr class="mx-auto">
        </div>
        
        <table class="mt-5 pt-5">
            <tr>
                <th > product Name </th>
                <th class="text-left" >Price</th>
                <th class="text-right">Quantity</th>
               
            </tr>

                    <?php while($row= $order_details->fetch_assoc())  {  ?>

                        <tr>
                            <td>
                                 <div class=" text-left product_info" >
                                     <img src="assets/imgs/<?php echo $row['product_image'] ?>" alt="">
                                     <div>
                                        <p> <?php echo  $row['product_name']; ?> </p>
                                     </div>
                                 </div>
                            </td>

                            <td  class="text-left">
                                <span> <?php echo  $row['product_price']; ?> $</span>
                            </td>
                            <td>
                                <span> <?php echo  $row['product_quantity']; ?> </span>
                            </td>

                            <!-- <td>
                                <form>
                                    <input style="background-color:#fb774b;color:#fff" class="btn" type="submit" value="details">
                                </form>
                            </td> -->

                        </tr>

                    <?php } ?>
        
        </table>
        
               <?php if($_POST['order_status']== "not paid") {?>
                     <form action="">
                        <input class="btn btn-primary" type="submit" value="Pay Now" >
                     </form>
                <?php } ?>

      </section>









         <!-- Footer -->



         <?php include("layout/footer.php") ?>