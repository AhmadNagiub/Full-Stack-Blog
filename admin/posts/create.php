<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
adminsOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page - create Posts</title>
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
                  <h2 class="page-title"> Add Posts</h2>
                      <!-- include header from app/includes/header -->
                      <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                      <!-- include header from app/includes/header -->

                  <form action="create.php" method="POST" enctype="multipart/form-data">
                      <div>
                          <label>Title</label>
                          <input type="text" class="text-input" value="<?php echo $title;?>" name="title">
                      </div>
                      <div>
                        <label>Body</label>
                        <textarea name="body"  id="body"><?php echo $body;?></textarea>
                    </div>
                    <div>
                      <label > Image</label>
                      <input type="file" name="image" class="text-input">
                    </div>
                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                            <option value="" ></option>
                            <?php foreach($topics as $key => $topic){
                              if(!empty($topic_id) && $topic_id == $topic['id'])
                              {
                              ?>
                                  <option selected value="<?php echo $topic['id'];  ?>"> <?php echo $topic['name'];  ?></option>
                              <?php 
                              } 
                              else 
                              {
                               ?>
                                  <option value="<?php echo $topic['id'];  ?>"> <?php echo $topic['name'];  ?></option>
                              <?php
                                }?>   

                    <?php }?>
                        </select>
                    </div>

                    <div>
                   
                    <?php if(empty($puplished))
                    {?>
                     <label >
                    <input type="checkbox" name="published" >
                    publish
                      </label>
                    <?php } 
                    else{?>
                     <label >
                    <input type="checkbox" name="published" checked >
                    publish
                      </label>
                    <?php }?>
                    </div>

                    <div>
                        <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
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