<?php
include '../connect.php';
if(isset($_POST['add_funiture'])){
 $fname= $_POST['fname'];
 $fownname= $_POST['fownname'];
 if(preg_match('/^[a-zA    -Z ]*$/',$fname) && preg_match('/^[a-zA-Z ]*$/',$fownname)){
    
       $select = $conn->query("select*from funiture where furniturename='$fname'");
    if (mysqli_num_rows($select)<=0) {
     $insert = $conn->query("insert into funiture values(null,'$fname','$fownname',0,0)");
     if ($insert== true) {
        ?><script>
            alert('new furniture added')
            window.location.href='../php/dashboard.php?furiture';
        </script>
        <?php
     }else echo "not";
    }else{
        ?><script>alert('furniture name must be unique')
            
            window.location.href='../php/dashboard.php?furniture';
        </script>
        <?php
    }
    
 }else {
    ?><script>
            alert('furniture name contain only character')
            window.location.href='../php/dashboard.php?furniture';
        </script>
        <?php
 }
}
