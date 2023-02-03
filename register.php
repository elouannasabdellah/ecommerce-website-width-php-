

  <?php

  session_start();

    include("server/connection.php");
  
     if(isset($_POST['register'])){

        $name= $_POST['name'];
        $email= $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        
        $options = array('options' => array('regexp' => '/^([a-z0-9])+$/i'));

        if($password !== $confirmPassword){
            header("location:register.php?error= password don't match ");
        }
      
       else if(strlen($password) < 8){
                header("location:register.php?error= password should be more than 8 caracters");
         }

        //  else if( !filter_var($password,FILTER_VALIDATE_REGEXP, $option) ){
            
        //     header("location:register.php?error=password should be a alpha numeric ");   
        //  }

         else if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            header("location:register.php?error= Email is invalid ");
         } 
         
     
          else{

                   // verification de User par email

                $getUser = $conn->prepare("SELECT count(*) FROM users WHERE user_email =?"); 
                $getUser->bind_param("s",$email);  
                $getUser->execute(); 
                $getUser->bind_result($num_rows);
                $getUser->store_result();
                $getUser->fetch();

                if($num_rows !=0 ){
                    header("location:register.php?error= user with this email already exists ");
                }
                // create a new User
                else{


                        $setUser = $conn->prepare("INSERT INTO users(user_name,user_email,user_password	) VALUES(?,?,?) ");  

                        $setUser->bind_param("sss",$name ,$email ,md5($password));
        
                        if($setUser->execute()){
                            echo "<script>alert('User inserted')</script>";
                            $user_id = $setUser->insert_id;  // ici le dernier id de uder qui est Ajouter 
                            $_SESSION['user_id']= $user_id;  // en mettre sa dans session pour utiliser se dernier dans la page place older
                            $_SESSION['user_email']= $email;
                            $_SESSION['user_name']= $name;
                            $_SESSION['logged_in']= true;
        
                        header("location:account.php?register=You registered successfully  ");
                        //echo "<script>alert('You Registered Successfuly')</script>";
        
                        }else{
                            echo "<script>alert('User non inserted')</script>";
                        }
        

                }

                // $setUser = $conn->prepare("INSERT INTO users(user_name,user_email,user_password	) VALUES(?,?,?) ");

                // $setUser->bind_param("sss",$name ,$email ,md5($password));

                // if($setUser->execute()){
                //     echo "<script>alert('User inserted')</script>";
                //     $user_id = $setUser->insert_id;  // ici le dernier id de uder qui est Ajouter 
                //     $_SESSION['user_id']= $user_id;  // en mettre sa dans session pour utiliser se dernier dans la page place older
                //     $_SESSION['user_email']= $email;
                //     $_SESSION['user_name']= $name;
                //     $_SESSION['logged_in']= true;

                //   header("location:account.php?register=You registered successfully  ");
                // //echo "<script>alert('You Registered Successfuly')</script>";

                // }else{
                //     echo "<script>alert('User non inserted')</script>";
                // }

           }

    }
    if(isset( $_SESSION['logged_in'])){
        header("location:account.php ");
   }
  
  ?>


        <?php include('layout/header.php') ?>



          <!-- Register -->

          <section class="my-5 py-5" >
              <div class="container text-center mt-3 pt-5">
                    <h2 class="form-weight-bold" >Register</h2>
                    <hr class="mx-auto">
              </div>
              <div class="mx-auto container">
                  <form method="POST" action="register.php" id="register-form">
                    <p style="color:red; font-weight:bold" > <?php if(isset($_GET['error'])) { echo $_GET['error']; } ?> </p>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="register-name" placeholder="name" required >
                    </div>
                      <div class="form-group">
                          <label for="">Email</label>
                          <input type="email" class="form-control" name="email" id="register-email" placeholder="Email Ici" required >
                      </div>
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="register-password" placeholder="password" required >
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="register-confirm-password" placeholder="Confirm Password" required >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn" id="register-btn" name="register" value="Register" />
                    </div>
                    <div class="form-group">
                        <a id="login-url" href="login.php" class="btn">Do you have an Account? Login</a>
                    </div>
                  </form>
              </div>
          </section>






           <!-- Footer -->

    <?php  include("layout/footer.php") ?>