<?php include("path.php"); ?>
<?php
      include(ROOT_PATH . "/app/controllers/posts.php");


    if(isset($_GET['id']))
    {
      $post = selectOne('posts' , ['id' => $_GET['id']]);
    }
    $topics = selectAll('topics');
    $posts = selectAll('posts' , ['published' => 1]);

      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title'] ; ?> | A.NAGIUB</title>
    <!--style-->
    <link rel="stylesheet" href="assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/css/all.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet"> <!--candal font-->
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">   <!--Lora   font-->

</head>
<body>
    <!-- facebook page plugin SDK  -->
     <div id = "fb-root" > </div> <script async defer crossorigin = "anonymous" src = "https://connect.facebook.net/en_AR/sdk.js#xfbml=1&version=v9.0" nonce = "pd2ZJjEQ" > </script> 
    <!-- facebook page plugin SDK  -->

     <!-- include header from app/includes/header -->
     <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
     <!-- include header from app/includes/header -->

<div class="clear"></div>

    <!--page wrapper-->
    <div class="page-wrapper">
      </div>
  
      <!--End page wrapper-->
    <div class="clear"></div>


    <section id="recent-posts">
  <div class="main-content-wrapper">
    <div class="main-content single">
      <h2 ><?php echo $post['title'] ; ?></h2>
      <div class="post-content">
    <?php echo html_entity_decode($post['body']) ;?>
      </div>

    </div>
  </div>

              <!--sidebar-->
      <div class="sidebar single">
          <!--facebook page plugin-->
        <div class = "fb-page" data-href = "https://web.facebook.com/codingpoets/" data-tabs = "" data-width = "" data-height = "" data-small-header = "false" data-adapt-container-width = "true" data-hide-cover = "false" data-show-facepile = "true" > <blockquote cite = "https://web.facebook.com/codingpoets / " class = " fb-xfbml-parse-ignore " > 
            <a href = "https://web.facebook.com/codingpoets/"> The Coding Poets </a> </Blockquote> </div>
          <!--facebook page plugin-->


        <div class="section popular">
            <h2 class="section-title">Popular</h2>



            <?php foreach($posts as $p){
                    ?>
            <div class="post clearfix">
                <img src="<?php echo BASE_URL . 'assests/images/' . $p['image'];?>" alt="">
                <a href="" class="title"><h4><?php echo $p['title'] ?></h4></a>
            </div>
              <?php }?>


        </div>



        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>

            <?php foreach($topics as $topic){
              ?>
             <li><a href="<?php echo BASE_URL . 'index.php?t_id='.$topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name'];  ?></a></li>

            <?php }?>
          </ul>
        </div>
      </div>

          <!--sidebar-->


    </section>

    <div class="clear"></div>

    <div class="page-wrapper2"></div>
     <!-- include header from app/includes/footer -->
     <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
     <!-- include header from app/includes/footer -->

    <!--script-->
    <script src="assests/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assests/js/jquery-3.5.0.min.js"></script>
    <script src="assests/js/popper.min.js"></script>
    <script src="assests/js/bootstrap.min.js"></script>
    <script src="assests/js/first.js"></script>
    <!--slick script-->
    <!-- <script src="slick.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
				
</body>
</html>