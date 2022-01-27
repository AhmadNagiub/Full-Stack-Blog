<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
adminsOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page - Edit Users</title>
    <!--style-->
    <link rel="stylesheet" href="../../assests/css/all.min.css">
    <link rel="stylesheet" href="../../assests/css/style.css">
    <link rel="stylesheet" href="../../assests/css/admin.css">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet"> <!--candal font-->
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">   <!--Lora   font-->

</head>
<body>
     
     <!-- include header from app/includes/adminheader -->
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
     <!-- include header from app/includes/adminheader -->


<div class="clear"></div>

    <!--Admin page wrapper-->
    <div class="admin-page-wrapper">

            <!--left sidebar  -->
     <!-- include header from app/includes/adminSiderbar -->
     <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
     <!-- include header from app/includes/adminSiderbar -->
            <!--End left sidebar  -->

                <!--Admin Content  -->
                <div class="admin-content">
                  <div class="button-group">
                    <a href="create.php" class="btn btn-big">Edit User</a>
                    <a href="index.php"  class="btn btn-big">Manage Users</a>
                  </div>
                  <h2 class="page-title"> Add Users</h2>
                      <!-- include header from app/includes/header -->
                      <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                      <!-- include header from app/includes/header -->
                  <form action="edit.php" method="POST">
                  <input type="hidden" name="id"  value="<?php echo $id; ?>" >

                    <div>

                        <label>UserName</label>
                        <input type="text" name="username" value="<?php echo $username ?>" class="text-input">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo $email ?>" class="text-input">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $password ?>" class="text-input">
                    </div>
                    <div>
                        <label>Confirm Password</label>
                        <input type="password" name="passwordConf" value="<?php echo $passwordConf ?>" class="text-input">
                    </div>

                    <div>

                    <?php if(isset($admin) && $admin == 1)
                    {?>
                        <label>
                        <input type="checkbox" name="admin"  checked>
                        admin
                        </label>
                    <?php } 
                    else{?>
                        <label>
                        <input type="checkbox" name="admin" >
                        admin
                        </label>
                    <?php }?>
                    </div>
                    <div>
                        <button type="submit" name="update-user" class="btn btn-big">Update User</button>
                    </div>
                  </form>


                </div>
                <!--End Admin Content  -->


      </div>
  
      <!--End Admin page wrapper-->


    <!--script-->
    <script src="../../assests/js/jquery-3.5.1.slim.min.js"></script>

    <!--cdeEditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <!--cdeEditor-->

    <script src="../../assests/js/first.js"></script>
   
</body>
</html>