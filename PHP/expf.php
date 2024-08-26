<?php
include '../connect.php';
if(!isset($_SESSION['id']))
  header('location:../log/login.php');

$select1 = $conn->query("select*from funiture,export where export.funitureid=funiture.furnitureid group by export.funitureid=funiture.furnitureid");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>
    <div class="table">
        <div class="heads">exported furniture</div>
           <table border="1">

                <thead>
                    <td>furniture</td>
                    <td>date</td>
                    <td>quantity</td>
                </thead>
                <?php foreach($select1 as $x){?>
                <tr>
                    <td><?=$x['furniturename'];?></td>
                    <td><?=date('Y-m-d')?></td>
                    <td><?=$x['quantity'];?></td>
                </tr>
                <?php }?>
            </table>
            
    </div>
</body>
<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/js1.js"></script>
</html>