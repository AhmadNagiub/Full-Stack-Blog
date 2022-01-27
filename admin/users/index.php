<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
adminsOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page - Manage Users</title>
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
                    <a href="create.php" class="btn btn-big">Add User</a>
                    <a href="index.php"  class="btn btn-big">Manage Users</a>
                  </div>
                  <h2 class="page-title"> Manage Users</h2>
                  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                  <table>
                    <thead>
                      <th>N</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach($admin_users as $key => $user){
                    ?>
                      <tr>
                        <td><?php echo $key + 1;?></td>
                        <td><?php echo $user['username'];?></td>
                        <td><?php echo $user['email'];?></td>
                        <td><a href="edit.php?id=<?php echo $user['id'] ; ?>" class="edit">Edit</a></td>
                        <td><a href="index.php?delete_id=<?php echo $user['id'] ; ?>" class="delete">Delete</a></td>
                      </tr>
                    <?php }?>

                    </tbody>
                  </table>

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