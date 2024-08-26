<?php
include '../connect.php';
if (isset($_POST['add_exp'])) {
    $furniture = $_POST['furniture'];
    $qty = $_POST['qty'];
    $select = $conn->query("select*from export where  funitureid= '$furniture'");
    $y= mysqli_fetch_array($select);

    $select = $conn->query("select * from export where funitureid='$furniture'");
    $row = mysqli_fetch_array($select);
    if ($row['quantity']>=$qty) {
        $select2 = $conn->query("select* from export where funitureid= '$furniture' and exportdate=current_date()");
        if (mysqli_num_rows($select2)>0) {
            $update = $conn->query("update import set quantity = quantity-'$qty' where funitureid= '$furniture'");
            $update = $update = $conn->query("update export set qty = qty+'$qty' where funitureid= '$furniture'
            and exportdate=current_date()");
            $update = $update = $conn->query("update export set quantity = '{$row['quantity']}'+'$qty' where funitureid= '$furniture' 
                                              ");

            if ($update == true) {
                ?>
                <script>
                    alert("funiture exported")
                    window.location.href='../php/dashboard.php?import'
                </script>
                <?php
            }
        }else {
        $insert = $conn->query("insert into export values('$furniture',null,current_date(),'$qty','$qty')");
        $update = $update = $conn->query("update export set quantity = '{$row['quantity']}'+'$qty' where funitureid= '$furniture' 
                                              ");
        $update = $conn->query("update import set quantity = quantity-'$qty' where funitureid= '$furniture'");
        if ($insert == true) {
          ?>
            <script>
                alert("funiture exported")
                window.location.href='../php/dashboard.php?import'
            </script>
            <?php
            
        }

    }
    }else {
    ?>
        <script>
            alert("not enough quantity")
            window.location.href='../php/dashboard.php?import'
        </script>
        <?php
    }
}

?>