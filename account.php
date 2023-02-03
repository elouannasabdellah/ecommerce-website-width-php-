
 <?php
 
    session_start();
    include("server/connection.php");

    if( !isset( $_SESSION['logged_in'])) {
        header("location: login.php");
    }
 
    
    if(isset($_GET['logout'])){
        if(isset($_SESSION['logged_in'])){
            unset( $_SESSION['logged_in'] );
            unset( $_SESSION['user_name'] );
            unset( $_SESSION['user_email'] );
            header("location:login.php");
            exit;
        }
    }

    //change password 

    if(isset( $_POST["change_password"] )){

        $password = $_POST["password"];
        $confirmPassword = $_POST["ConfirmPassword"];
        $user_email = $_SESSION['user_email'];

        if($password !== $confirmPassword){
            header("location:account.php?error= password don't match ");
        }
      
       else if(strlen($password) < 8){
                header("location:account.php?error= password should be more than 8 caracters");
         }
         else{

            $stmt = $conn->prepare(" UPDATE users SET user_password=? WHERE user_email =? ");
            $stmt->bind_param("ss", md5($password) , $user_email );

            if( $stmt->execute()){
                header("location:account.php?message=password has been update successfully");
            }else{
                header("location:account.php?error=could not update password");
            }

         }

    }

    // Get  ORDER

    if(isset($_SESSION['logged_in'])){

        $user_id = $_SESSION['user_id'];
        $getOrder = $conn->prepare(" SELECT * FROM orders WHERE user_id=?  ");

        $getOrder->bind_param("i",  $user_id);

        $getOrder->execute();

        $orders = $getOrder->get_result();

    }



 ?>


        <?php include('layout/header.php'); ?>


          <!-- Account -->
          <section class="my-5 py-5" >
              <div class=" row container mx-auto">

                  <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12 " >
                  <p  ><span style="color:green;" > <?php if(isset($_GET['message'])){echo $_GET['message'] ;}  ?> </span></p>
                      <h3  class="fort-weight-bold">Acount Info</h3>
                      <hr class="mx-auto">
                      <div class="account-info">
                          <p style="font-weight:bold"> Welcome<span> <?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'] ;}  ?> </span></p>
                          <p style="font-weight:bold">Email :<span> <?php if(isset($_SESSION['user_email'])) { echo  $_SESSION['user_email'] ;}  ?> </span></p>
                          <p><a href="#orders" id="order-btn">Your Orders</a></p>
                          <p><a href="account.php?logout=1" id="logout-btn" style="color:black;background-color:#fb774b;padding:10px;border-radius:2px;" >Logout</a></p>
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-12" >
                        <form id="account-form " method="POST" action="account.php" >
                            <p class="text-center" style="color:red;font-weight:bold" > <?php if(isset($_GET['error'])) {echo $_GET['error']; } ?> </p>
                            <p class="text-center" style="color:green;font-weight:bold" > <?php if(isset($_GET['message'])) {echo $_GET['message']; } ?> </p>
                            <h3>Change Password</h3>
                            <hr class="mx-auto" >
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="account-password" placeholder="password" required >
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="ConfirmPassword" id="account-password-confirm" placeholder="conifrm password" required >
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Change Password" name="change_password" class="btn" style="background-color:#fb774b ;" id="change-pass-btn" >
                            </div>
                        </form>
                  </div>

              </div>
          </section>



                <!-- Orders -->
      <section id="orders" class="orders container py-2" >
        <div class="container mt-5">
            <h2 class="font-weight-bolde text-center" >Your Ordes</h2>
            <hr class="mx-auto">
        </div>
        
        <table class="mt-5 pt-5">
            <tr>
                <th >Order id</th>
                <th class="" >Order Cost</th>
                <th>Order Status</th>
                <th class="text-left" >Order Date</th>
                <th class="text-right">Order details</th>
               
            </tr>

            <?php while( $row = $orders->fetch_assoc()) { ?>

                        <tr>
                            <td class="text-left" >
                                <span> <?php echo $row['order_id'] ?> </span>
                            </td>

                            <td  class="text-left">
                                <span> <?php echo $row['order_cost'] ?> </span>
                            </td>
                            <td  class="text-left">
                                <span> <?php echo $row['order_status'] ?> </span>
                            </td>

                            <td  class="text-left" >
                                <span> <?php echo $row['order_date'] ?> </span>
                            </td>

                            <td>
                                <form method="POST" action="order_details.php" >
                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?> " >
                                    <input type="hidden" name="order_status" value="<?php echo $row['order_status']; ?> " >
                                    <input style="background-color:#fb774b;color:#fff" name="order_details_btn" class="btn" type="submit" value="details">
                                </form>
                            </td>

                        </tr>

            <?php } ?>            
           
        </table>


      </section>


         <?php  include('layout/footer.php') ?>