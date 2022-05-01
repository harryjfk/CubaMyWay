<?php include_once("config.php");
include ("langsetter.php");
?>
<div class="information">
 <h1>
     <?php echo $_SESSION['languages'] ->GetString("INFORMATION_HEADER");?>
 </h1>
    <p><?php echo $_SESSION['languages'] ->GetString("INFORMATION_BODY");?></p>
</div>