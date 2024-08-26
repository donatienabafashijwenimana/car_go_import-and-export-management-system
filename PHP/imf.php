<?php
include '../connect.php';
if(!isset($_SESSION['id']))
  header('location:../log/login.php');

include 'updateimport.php';
$selectfun = $conn->query("select* from funiture");
$select1 = $conn->query("select*,sum(quantity) from funiture,import where import.funitureid=funiture.furnitureid
 group by furnitureid");
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
        <div class="heads">imported furniture</div>
           <table border="1">
                <thead>
                    <td class="exp"> <center><button id="exp">export</button></center><button class="act">import</button></td> 

            </thead>
                <thead>
                    <td>furniture</td>
                    <td>date</td>
                    <td id="action">quantity</td>
                </thead>
                <?php foreach($select1 as $x){?>
                <tr>
                    <td><?=$x['furniturename'];?></td>
                    <td><?=date('Y-m-d')?></td>
                    <td><?=$x['quantity'];?></td>
                </tr>
                <?php }?>
            </table>
            <div class="form">
            <div class="loading"></div>

              <form action="../add/addimf.php" method="post"><div class="close">&times</div>
                <label for="">furniture</label>
                <select name="furniture" id="">
                    <?php foreach($selectfun as $y){?>
                    <option value="<?=$y['furnitureid']?>"><?=$y['furniturename']?></option>
                    <?php }?>
                </select>
                <label for="">quantity</label>
                <input type="number" name="qty" id="" required>
                <input type="submit" value="add import" name="add_imf">
              </form>
            </div>

            <div class="formexp">
              <form action="../add/addexp.php" method="post"><div class="close">&times</div>
                <label for="">furniture</label>
                <select name="furniture" id="">
                    <?php foreach($selectfun as $y){?>
                    <option value="<?=$y['furnitureid']?>"><?=$y['furniturename']?></option>
                    <?php }?>
                </select>
                <label for="">quantity</label>
                <input type="number" name="qty" id="" required>
                <input type="submit" value="export" name="add_exp">
              </form>
            </div>
            <?php if (isset($_GET['id'])) {
              ?>
              <div class="formu">
                <?php update($conn,$_GET['id']);?>
              </div>
              <?php
            }
            ?>
    </div>
</body>
<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/js1.js"></script>
</html>