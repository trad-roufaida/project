
<?php  
if(count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo '<font color="red" border-right=100px text-align="center" >'. $error."</font>"; ?></p>
  	<?php endforeach ?> 
  </div>
<?php  endif ?>
