<?php include("path.php"); ?>

<?php
      include(ROOT_PATH . "/app/controllers/topics.php");
    $posts = array();
    $postsTitle='Recent Posts';
 
    if(isset($_POST['search-term']))
    {
      $postsTitle = "You searched For '" . $_POST['search-term'] . " ' ";
      $posts = searchPosts($_POST['search-term']);

    }
    else if(isset($_GET['id']))
    {
      $posts = getPostsByTopicId($_GET['t_id']);
      $postsTitle = "You searched For posts under '" . $_GET['name'] . " ' ";
    }
    else
    {
      $posts = getPublishedPosts();
    }
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
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

     <!-- include header from app/includes/header -->
     <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
     <!-- include header from app/includes/header -->
<div class="clear"></div>

    <!--page wrapper-->
    <div class="page-wrapper">
      <!--Post Slider-->
  
      <div class="post-slider">
          <h1 class="title-slider">Trending Posts</h1>
  
          <i class="fas fa-chevron-left prev"></i>
          <i class="fas fa-chevron-right next"></i>
  
          <div class="post-wrapper">
  


              <?php foreach($posts as $post){
                    ?>
              <div class="post">
                  <img src="<?php echo BASE_URL . 'assests/images/' . $post['image'];?>" class="slider-image" alt="">
                  <div class="post-info">
                      <h4><a href="single.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'];?></a></h4>
                       <i class="fa fa-user icon" > &nbsp;<?php echo $post['username'];?></i>
                       &nbsp;   &nbsp;   &nbsp;
                      <i class="fa fa-calendar icon" > &nbsp; <?php echo date('F j, Y' , strtotime($post['created_at']));?></i>
                    </div>
              </div>
              <?php }?>

  
          </div>
      </div>
      <!--End posr slider-->
      </div>
  
      <!--End page wrapper-->
    <div class="clear"></div>

<br>
<br>
    <section id="recent-posts">
  


      <div class="main-content">
        <h2 class="recent-post-title"><?php echo $postsTitle ?></h2>

        <?php foreach($posts as $post){
                    ?>
        <div class="posts clearfix">
          <img src="<?php echo BASE_URL . 'assests/images/' . $post['image'];?>" class="post-img" alt="">
          <div class="post-preview">
            <h2><a href="single.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'];?> </a></h2>
            <i class="fa fa-user icon" > &nbsp;<?php echo $post['username']; ?></i>
            &nbsp;   &nbsp;   &nbsp;
            <i class="fa fa-calendar icon" > &nbsp; <?php echo date('F j, Y' , strtotime($post['created_at']));?></i>
            <p class="previw-text">
              <?php echo html_entity_decode(substr($post['body'] , 0 , 150) . '...') ;?>
            </p>
            <a href="single.php?id=<?php echo $post['id'] ?>" class="btn read-more "> Read More</a>
          </div>
        </div>

      <?php }?>




      </div>  




      <div class="sidebar">

        <div class="section search">
          <h2 class="section-title">Search</h2>
          <form action="index.php" method="post">
            <input type="text" name="search-term" class="text-input"
           placeholder="Search..." >
          </form>
        </div>

        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach($topics as $key => $topic){
              ?>
             <li><a href="<?php echo BASE_URL . 'index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name'];  ?></a></li>
            <?php }?>


          </ul>
        </div>
      </div>

  

    </section>

    <div class="clear"></div>

    <div class="page-wrapper2">

    </div>
     <!-- include header from app/includes/footer -->
     <?php include(ROOT_PATH ."/app/includes/footer.php"); ?>
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