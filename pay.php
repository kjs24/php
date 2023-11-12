<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$id = "junsu"; //임의로 설정
$price = 15000; //임의로 설정
$goods_id = "12A23"; //임의로 설정
$conn = mysqli_connect('localhost','root','','pay');

$sql = "SELECT * FROM account";
$result = mysqli_query($conn, $sql);

if (isset($_GET['ch'])) {
  if ($_GET['ch'] === '0') {
?>
    <h6>결제에 실패하였습니다.</h6>
<?php
  }
}

while ($row = mysqli_fetch_array($result)) {

  if ($id == $row['id'] || $id == $row['email']) {
    break;
  }else{
    ?>
        <meta http-equiv="refresh" content="0;URL='pay.php?ch=0'">
    <?php
  }
}
?>
      <h2>아이디:<?php echo $row['id'];?></h2>
      <h2>계좌번호:<?php echo $row['account_num'];?></h2>
      <form action="login_process2.php" method="POST">
          <h2><input type='password' name='pay_password' placeholder="pay password"></h2>
    <?php
    if (isset($_GET['ch'])) {
        if ($_GET['ch'] === '0') {
    ?>
    <h6>결제에 실패하였습니다</h6>
    <?php
            }
        }
    ?>
    <input type='submit' value='결제'>
  </form>
      <h2><input type='text' name='id' placeholder="id"></h2>
    <h2><input type='password' name='password' placeholder="password"></h2>
      <form id='my_frm' action='pay_process.php' method='POST'>
        <input type='hidden' name='id' value="<?php echo $_POST['id'];?>">
        <input type='hidden' name='account_num' value="<?php echo $row['account_num'];?>">
        <input type='hidden' name='price' value="<?php echo $price;?>">
        <input type='hidden' name='goods_id' value="<?php echo $goods_id;?>">   
      </form>

      <script>
     //아이디 일치하면 아이디, 계좌번호 보내며 pay_process.php 페이지로 이동 자스코드
          window.onload = function() {
          let frm = document.querySelector('form#my_frm');
          frm.submit();
        }
      </script>

  <?php  


?>
</body>
</html>