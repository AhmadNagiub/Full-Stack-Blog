<header>
      <a href="<?php echo BASE_URL . 'index.php' ?>" class="logo">
        
        <h1 class="logo-text"> <span>A</span>.NAGIUB</h1>
      
      </a>

    
      <i class="fa fa-bars menu-toggle" id="toggle" ></i>
    
      <ul  id="nav">
      
      <?php if(isset($_SESSION['username']))
         {
         ?>
         <li>
          <a href="#">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
          </a>
         <?php } else {
           ?>
           <li></li>
         <?php } ?>
          <ul>
            <li>
              <a href="<?php echo BASE_URL . 'logout.php'?>" class="log-out">Log out</a>
            </li>
          </ul>
        </li>
      </ul>

</header>