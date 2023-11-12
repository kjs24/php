<?php
    
    $conn = mysqli_connect('localhost','root','','pay_record');
    $sql="
            INSERT INTO users (id,account_num,goods_id,price)
            VALUES('{$_POST['id']}','{$_POST['account_num']}','{$_POST['price']}','{$_POST['goods_id']}')
        ";
        
     mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0;URL='pay_success.php?ch'">