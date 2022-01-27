
    <header>
      <div class="logo">
        
        <a style="text-decoration:none" href="<?php echo BASE_URL . 'index.php'?>"><h1 class="logo-text"> <span>A</span>.NAGIUB</h1> </a>
      
      </div>

    
      <i class="fa fa-bars menu-toggle" id="toggle" ></i>
    
      <ul  id="nav">
        <li>
          <a href="<?php echo BASE_URL . 'index.php'?>	">Home</a>
        </li>
        <li>
          <a href="#">About</a>
        </li>
        <li>
          <a href="#">Services</a>
        </li>

      <?php if(isset($_SESSION['id']))
      {?>
        <li>
          <a href="#">
            <i class="fa fa-user"></i>
            <!-- A.Nagiub -->
            <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
          </a>
          <ul>

         <?php if($_SESSION['admin'])
         {
         ?>
            <li>
              <a href="<?php echo BASE_URL . 'admin/dashboard.php'?>">Dashboard</a>
            </li>
         <?php } else {
           ?>
           <li></li>
         <?php } ?>


            <li>
              <a href="<?php echo BASE_URL . 'logout.php'?>" class="log-out">Log out</a>
            </li>
          </ul>
        </li>

     <?php }
     else 
     {?>
        <li>
          <a href="<?php echo BASE_URL . 'register.php'?>">Sign up</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . 'login.php'?>">Log in</a>
        </li>
     <?php } ?>






      </ul>

    </header>
