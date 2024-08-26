<?php
include '../connect.php';
if(!isset($_SESSION['id']))
  header('location:../log/login.php');

function update($conn,$id){
    $select = $conn->query("select*from funiture,import where 
    import.funitureid=funiture.furnitureid");
    $row = mysqli_fetch_array($select);
    ?>
    <form action="updateimport.php"><div class="close">&times;</div>
        <label for="">funiture</label>
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="text" name="funiture" value="<?=$row['furniturename']?>" readeonly>
        <label for="">quantity</label>
        <input type="number" name="qty" value="<?=$row['quantity']?>">
        <input type="submit" value="update" value="update">
    </form>
    <?php
}
if(isset($_POST['update'])){
    if ($_POST['qty']>0) {
        $update = $conn->query("update export set quantity = '{$_POST['qty']}' where funitureid='{$_POST['qty']}'");
        if ($update= true) {
           ?>
           <script>
            alert("updated")
            window.location.href='dashboard.php?import'
           </script>
           <?php
        }else {
            ?>
           <script>
            alert("not updated")
            window.location.href='dashboard.php?import'
           </script>
           <?php
        }
    }else {
        ?>
           <script>
            alert("quantity must be greater than 0")
            window.location.href='dashboard.php?import'
           </script>
           <?php
    }
}