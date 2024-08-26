<?php
include '../connect.php';
if(!isset($_SESSION['id']))
  header('location:../log/login.php');

  $select1 = $conn->query("select*from funiture,export where export.funitureid=funiture.furnitureid and qty>0");
 if (isset($_POST['generate'])) {
  
 if ($_POST['generate']=='generated') {
    $select1 = $conn->query("select*from funiture,export where
 export.funitureid=funiture.furnitureid and exportdate='{$_POST['date1']}' group by furnitureid  and qty>0");
 }
 if ($_POST['generate']=='generatew') {
    $date = explode('-W',$_POST['week']);
   
    $select1 = $conn->query("select* from funiture,export where
 export.funitureid=funiture.furnitureid and year(export.exportdate)='{$date[0]}' and 
 week(export.exportdate)='{$date[1]}' and qty>0");
 }
 if ($_POST['generate']=='generatem') {
    $select1 = $conn->query("select*from funiture,export where
 export.funitureid=funiture.furnitureid and month(exportdate)='{$_POST['date2']}'  and qty>0");
 }
}
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
    <div class="report">
        <form action="dashboard.php?exportr" method="post">
            <p>
                <u>daily report</u>
                <label for="">date</label>
                <input type="date" name="date1" id="">
                <input type="submit" value="generated" name="generate">
            </p>
            <p>
                <u>weekly report</u><br>
                <input type="week" name="week" id="">
                <input type="submit" value="generatew" name="generate">
            </p>
            <p>
                <u>monthly report</u><br>
                <select name="date2" id="">
                <?php for ($i=1; $i <=12 ; $i++) { 
                    ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <?php
                }
                ?>
                </select>
                <input type="submit" value="generatem"name="generate">
            </p>
        </form>
        <div class="print">print</div>
    </div>
    <div class="table">
        <div class="heads">exported furniture report</div>
        <?php if (mysqli_num_rows($select1)>0) {
           ?>
           <table border="1">

                <thead>
                    <td>furniture</td>
                    <td>date</td>
                    <td>quantity</td>
                </thead>
                <?php foreach($select1 as $x){?>
                <tr>
                    <td><?=$x['furniturename'];?></td>
                    <td><?=$x['exportdate'];?></td>
                    <td><?=$x['qty'];?></td>
                </tr>
                <?php }?>
            </table>
            <?php }else echo "<h1>no result found</h1>"?>
            
    </div>
</body>
<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/js1.js"></script>
</html>