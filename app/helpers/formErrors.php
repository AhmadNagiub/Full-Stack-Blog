<?php 
if((empty($errors)))
        { ?>
        <div class="msg ">
        <?php }
        else { ?>
        <div class="msg error">
        <?php foreach($errors as $error)
        { ?>
        <li><?php echo $error; ?></li>
        <?php } ?>
        </div>
        <?php }?>

