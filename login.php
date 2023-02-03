
    <?php
 
        include("server/connection.php");
        session_start();

        if(isset($_POST['login'])){


            $email= $_POST['email'];
            $password= md5($_POST['password']) ;

            $getUser= $conn->prepare(" SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email=? AND user_password=? ");

            $getUser->bind_param("ss",$email, $password );

            if($getUser->execute()){

                $getUser->bind_result($user_id, $user_name ,$user_email, $user_password);
                $getUser->store_result();

                if($getUser->num_rows() ==1 ){
                     $getUser->fetch();

                     $_SESSION['user_id']=$user_id;
                     $_SESSION['user_name']= $user_name;
                     $_SESSION['user_email']= $user_email;
                     $_SESSION['logged_in']= true;

                    header("location:account.php?message=loggin Successfully ");

                 

            // pas de User n'exsite pas dans la base de donnée 
                }else{

                    header("location: login.php?error= Email Or password est incorrecte ");
                }
               


            }else{
                // pas de execute : =>error

                header("location: login.php?error= something went wrong ");

            }

            // pas de post login

        }

        if(isset( $_SESSION['logged_in'])){
            header("location:account.php ");
       }


    ?>



       <?php  include('layout/header.php') ?>


          <!-- login -->
          <section class="my-5 py-5" >
              <div class="container text-center mt-3 pt-5">
                    <h2 class="form-weight-bold" >Login</h2>
                    <hr class="mx-auto">
              </div>
              <div class="mx-auto container">

                  <form method="POST" action="login.php" id="login-form">
                    <p style="color:red;font-weight:bold;" > <?php  if(isset($_GET['error'])) {echo $_GET['error']; } ?> </p>
                      <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" class="form-control" name="email" id="login-email" placeholder="Email Ici" required >
                      </div>
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="login-password" placeholder="password" required >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn" name="login" id="login-btn" value="Login" />
                    </div>
                    <div class="form-group">
                        <a id="register-url" href="register.php" class="btn">Don't have account? Register</a>
                    </div>
                  </form>
              </div>
          </section>



       <?php  include("layout/footer.php") ?> 


       

<!-- https://www.udemy.com/course/digital-marketing-agency-social-media-marketing-business/   Formation en udemy --> 