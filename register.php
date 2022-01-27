<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
guestsOnly();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register In </title>
    <!--style-->
    <link rel="stylesheet" href="assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/css/all.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet"> <!--candal font-->
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">   <!--Lora   font-->

</head>
<body>
     <!-- include header from app/includes/header -->
     <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
     <!-- include header from app/includes/header -->
     
<div class="clear"></div>

<div class="auth-contnet">
    <form action="Register.php" method="post">
        <h2 class="form-title">Register</h2>

     <!-- include header from app/includes/header -->
     <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
     <!-- include header from app/includes/header -->


            <div>
                <label>UserName</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
            </div>
            <div>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>" class="text-input">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
            </div>
            <div>
                <label>Confirm Password</label>
                <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
            </div>
            <button type="submit" name="register-btn" class="btn btn-big">Register</button>
            <p>or <a href="<?php echo BASE_URL . 'login.php'?>	">Log In</a></p>
    </form>


</div>


    <!--script-->
    <script src="assests/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assests/js/jquery-3.5.0.min.js"></script>
    <script src="assests/js/popper.min.js"></script>
    <script src="assests/js/bootstrap.min.js"></script>
    <script src="assests/js/first.js"></script>
    
</body>
</html>