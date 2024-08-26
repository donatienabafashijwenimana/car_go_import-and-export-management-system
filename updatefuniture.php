<?php
include 'connect.php';
function update($conn,$id){
    $select = $conn->query("select*from funiture where furnitureid='$id'");
    $row = mysqli_fetch_array($select);
    ?>
    <form action="../updatefuniture.php" method="post"><div class="close">&times</div>
    <input type="hidden" name="id" value="<?=$id?>">
        <label for="">furniture name</label>
        <input type="text" name="fname" id=""required value="<?=$row['furniturename']?>">
        <label for="">furniture owner name</label>
        <input type="text" name="fownname" id=""required value="<?=$row['furnitureownername']?>">
        <input type="submit" value="update furniture" name="update">
    </form>
    <?php
}
if(isset($_POST['update'])){
    
    $select = $conn->query("select*from funiture where furniturename='{$_POST['fname']}' and
                              furnitureid<>'{$_POST['id']}'");
    if(preg_match('/^[a-zA-Z ]*$/',$fname) && preg_match('/^[a-zA-Z ]*$/',$fownname)){
    if(mysqli_num_rows($select)<=0){
      $up = $conn->query("update funiture set furniturename='{$_POST['fname']}',
      furnitureownername='{$_POST['fownname']}' where furnitureid='{$_POST['id']}'");
      if ($up == true) {
        ?><script>alert('furniture updated')
            
        window.location.href='php/dashboard.php?furniture';
    </script>
    <?php
      }
    }else{
        ?><script>alert('furniture name must be unique')
            
        window.location.href='php/dashboard.php?furniture';
    </script>
    <?php
    }
}else {
    ?><script>alert('furniture name contain character only')
            
        window.location.href='php/dashboard.php?furniture';
    </script>
    <?php
}
}
?>