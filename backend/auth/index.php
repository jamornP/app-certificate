<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app-certificate/backend/auth/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Science-Certificate</title>

    <!-- link -->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/link.php");   ?>
    
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/app-certificate/" class="h1"><b>Science App</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"></p>

                <form action="save.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="u_email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="u_password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                          
                              <a href="<?php echo $login_url;?>" class="btn btn-danger">
                              <img src="/app-certificate/backend/images/logo/Google__G__Logo.svg" alt="Science Logo" class="" style="position: absolute; margin-top: -3px;margin-left: -81px; width: 30px; height: 30px; border-radius: 2px; background-color: white;"> <p class="mb-0" style="margin-left : 40px;">Sign in Google</p>
                              </a>
                         
                        </div>
                        
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- script -->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/app-certificate/backend/component/script.php");   ?>

</body>

</html>