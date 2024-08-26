<?php 
include '../connect.php';
if (isset($_POST['add_imf'])) {
    $furniture = $_POST['furniture'];
    $qty = $_POST['qty'];
    $select = $conn->query("select*from import where  funitureid= '$furniture'");
        $y= mysqli_fetch_array($select);
    $select = $conn->query("select* from import where funitureid= '$furniture' and importdate=current_date()");
    if (mysqli_num_rows($select)>0) {
        $update = $conn->query("update import set qty = qty+'$qty' where funitureid= '$furniture'
          and importdate=current_date()");
          $update = $conn->query("update import set quantity = '{$y['quantity']}'+'$qty' where funitureid= '$furniture'");
        if ($update == true) {
            ?>
            <script>
                alert("furniture imported")
                window.location.href='../php/dashboard.php?import'
            </script>
            <?php
        }
    }else {
        $insert = $conn->query("insert into import values('$furniture',null,current_date(),'$qty','$qty')");
        
        $update = $conn->query("update import set quantity = '{$y['quantity']}'+'$qty' where funitureid= '$furniture'");
        if ($insert == true) {
                ?>
                <script>
                    alert("furniture imported")
                    window.location.href='../php/dashboard.php?import'
                </script>
                <?php
            }
        
    }

}