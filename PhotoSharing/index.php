
<?php 

  session_start();
  
  if(isset($_SESSION['userlogin'])){
    header("Location: main.php");
  }


?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="img/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="img/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" id="LogInEmail" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="LogInPassword" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit"  id="Login" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text"  id="firstname" placeholder="Enter your First Name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text"  id="lastname" placeholder="Enter your Last Name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email"  id="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="confirm_password" placeholder="Confirm your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" id="register" value="Submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function(){
           $('#register').click(function(e){
              if($('#password').val()=== $('#confirm_password').val()){
                var valid = this.form.checkValidity();
                if(valid){

                var firstname   = $('#firstname').val();
                var lastname    = $('#lastname').val();
                var email       = $('#email').val();
                var password    = $('#password').val();

                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'signup.php',
                        data: {firstname: firstname,lastname: lastname,email: email,password: password},
                        success:function(data){
                           if($.trim(data) === "1"){
                            Swal.fire({
                                icon: 'success',
                                title: 'Successfully',
                                text: 'Account has been created',
                                
                            })
                            setTimeout(' window.location.href =  "index.php"', 1000);
                          }
                          else if($.trim(data) === "0"){
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Email Already register',
                                
                            })
                          }
                          else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Email Already register' ,
                                
                            })
                          }
                        },
                        error:function(data){
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error in saving the data',
                                footer: 'Please Contact Email Our Support'
                            })

                        }
                    });

                    
                }
              }else{
                Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Password and Confirm password should match!',
                                
                            })
              }
                
               
           });
           $('#Login').click(function(e){


                var valid = this.form.checkValidity();
                if(valid){

                var email       = $('#LogInEmail').val();
                var password    = $('#LogInPassword').val();

                    e.preventDefault();
                      $.ajax({
                        type: 'POST',
                        url: 'login.php',
                        data:  {email: email, password: password},
                        success: function(data){
                      
                          if($.trim(data) === "1"){
                           
                            setTimeout(' window.location.href =  "main.php"', 1000);

                          }
                          else if($.trim(data) === "0"){
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Please Check Your Email and Password',
                                
                            })
                          }
                          else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data ,
                                
                            })
                          }
                        },
                        error: function(data){
                          alert('there were erros while doing the operation.');
                        }
                      });

                    
                }
                
               
           });
            
        });
    </script>
</body>
</html>
