<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
adminsOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page - Dashboard</title>
    <!--style-->
    <link rel="stylesheet" href="../assests/css/all.min.css">
    <link rel="stylesheet" href="../assests/css/style.css">
    <link rel="stylesheet" href="../assests/css/admin.css">

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

                  <h2 class="page-title"> DashBoard</h2>
                      <!-- include header from app/includes/messages -->
                      <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
                      <!-- include header from app/includes/messages -->
                </div>

      </div>
  


    <!--script-->
    <script src="../assests/js/jquery-3.5.1.slim.min.js"></script>



    <script src="../assests/js/first.js"></script>
   
</body>
</html>