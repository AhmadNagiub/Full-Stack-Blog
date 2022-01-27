<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminsOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page - Manage Posts</title>
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
                    <a href="create.php" class="btn btn-big">Add Post</a>
                    <a href="index.php"  class="btn btn-big">Manage Post</a>
                  </div>
                  <h2 class="page-title"> Manage Posts</h2>
                  <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                  <table>
                    <thead>
                      <th>N</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                      <tr>
                      <?php foreach($posts as $key => $post){
                    ?>
                      <tr>
                        <td><?php echo $key + 1;?></td>
                        <td><?php echo $post['title'];?></td>
                        <td>Nagiub</td>
                        <td><a href="edit.php?id=<?php echo $post['id']?>" class="edit">Edit</a></td>
                        <td><a href="edit.php?delete_id=<?php echo $post['id']?>" class="delete">Delete</a></td>
                        <?php if(($post['published'])) 
                        { ?>
                          <td><a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish">UnPuplish</a></td>
                        <?php 
                        } 
                        else 
                        {
                          ?>
                        <td><a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="puplish">Puplish</a></td>
                        <?php
                        }?>   
                         </tr>
                         <?php
                        }?>   
                      
                      
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