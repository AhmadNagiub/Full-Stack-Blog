<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php"); 
adminsOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page - Edit Topics</title>
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
                    <a href="create.php" class="btn btn-big">Add Topic</a>
                    <a href="index.php"  class="btn btn-big">Manage Topic</a>
                  </div>
                  <h2 class="page-title"> Edit Topics</h2>

                  <form action="edit.php" method="POST">
                  <input type="hidden" name="id"  value="<?php echo $id; ?>" >

                      <div>
                          <label>Name</label>
                          <input type="text" class="text-input" value="<?php echo $name; ?>" name="name">
                      </div>
                      <div>
                        <label>Descreption</label>
                        <textarea name="description" id="body" <?php echo $description; ?>></textarea>
                    </div>

                    <div>
                        <button type="submit" name="update-topic" class="btn btn-big">Update Topic</button>
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