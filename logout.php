<?=template_header('logout')?>

<?php
   session_start();

   if(session_destroy()) {
      header("Location: index.php?page=login");
   }
?>
