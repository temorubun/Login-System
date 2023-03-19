<?php include 'login.php'?>
<!DOCTYPE html>
<html lang="en">

    <head>
    
        <meta charset="utf-8">
    
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <title>Login</title>
    
        <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    
        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    
        <link rel="stylesheet" href="css/style.css">
    
        <link rel="shortcut icon" href="img/Logo1.png" />

    </head>
  
    <body>
    
        <div class="container-scroller">
      
            <div class="container-fluid page-body-wrapper full-page-wrapper">
        
                <div class="row w-100 m-0">
            
                    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            
                        <div class="card col-lg-4 mx-auto">
                
                            <div class="card-body px-5 py-5">
                
                                <h3 class="card-title text-left mb-3">Login</h3>
                                
                                <form action="" method="post">
                    
                                    <div class="form-group">
                        
                                        <label for="email">Email</label>
                        
                                        <input type="email" name="email" id="email" class="form-control p_input" style="color: white;" required>
                    
                                    </div>
                    
                                    <div class="form-group">
                                        
                                        <label for="password">Password</label>
                                        
                                        <div class="input-group">
                                        
                                            <input type="password" name="password" id="password" class="form-control p_input" style="color: white;" required>
                                            
                                            <div class="input-group-append">
                                            
                                                <button type="button" class="btn btn-outline-secondary" id="togglePassword" onclick="togglePassword()">
                                                
                                                    <i class="mdi mdi-eye"></i>

                                                </button>
                                            
                                            </div>
                                            
                                        </div>
                                    
                                    </div>

                                    <div class="form-group d-flex align-items-center justify-content-between">
                        
                                        <div class="form-check">
                        
                                            <label class="form-check-label">
                            
                                            <input type="checkbox" name="remember" class="form-check-input"> Remember me </label>
                        
                                        </div>
                        
                                        <a href="https://temorubun.site/index/register/" class="forgot-pass">create account</a>
                    
                                    </div>
                                    
                                    <div class="text-center">
                    
                                        <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                    
                                    </div>

                                </form>

                                <?php 
                                    if(isset($error_msg)){
                                        echo '<p>'.$error_msg.'</p>';
                                    } 
                                ?>
                                    
                            </div>
            
                        </div>
          
                    </div>
        
                </div>
      
            </div>
    
        </div>
    
        <script src="vendors/js/vendor.bundle.base.js"></script>
    
        <script src="js/off-canvas.js"></script>
    
        <script src="js/hoverable-collapse.js"></script>
    
        <script src="js/js/bootstrap.bundle.js"></script>

        <script src="js/misc.js"></script>
    
        <script src="js/settings.js"></script>
    
        <script src="js/icon.js"></script>

        <script src="js/todolist.js"></script>
          
    </body>
    
</html>