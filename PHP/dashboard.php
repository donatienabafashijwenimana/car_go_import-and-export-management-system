
<?php
session_start();
   if(!isset($_SESSION['id']))
   header('location:../log/login.php');

  if(isset($_GET['funiture'])){ echo $p="f";}
  elseif(isset($_GET['import'])){$p="im";}
  elseif(isset($_GET['export'])){$p="exp";}
  elseif(isset($_GET['importr'])){$p="impr";}
  elseif(isset($_GET['exportr'])){$p="expr";}
  else {$p="f";}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">

</head>
<body>
   <div class="header">calgo information management system</div>
   <div class="body">
      <div class="left"><?php include('../hrf/right.php')?></div>

      <div class="right"><?php if(isset($_GET['funiture'])){include 'f.php';}
                              elseif(isset($_GET['import'])){include 'imf.php';}
                              elseif(isset($_GET['export'])){include 'expf.php';}
                              elseif(isset($_GET['importr'])){include 'imfreport.php';}
                              elseif(isset($_GET['exportr'])){include 'expreport.php';}
                              else {include 'f.php';}?></div>
   </div>
   <div class="footer">
      <?php include('../hrf/footer.php');?>
   </div>
</body>
</html>
