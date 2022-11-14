<?php
require_once 'connection.php';
session_start();
$id = $_COOKIE["userId"];
$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($connection, $query);

$nameVal = '';
$loginVal = '';
$contactVal = '';

while($row = mysqli_fetch_array($result)){
    $nameVal =  $row['name'];
    $loginVal =  $row['login'] ;
    $contactVal = $row['contact'];
}
?>

<body>
<center><h1>Moje konto</h1></center>
    <center>
    <section class="container">
    <form action="" method="POST">
                <p>Dane osobowe</p>
                <p><input type="text" name="name" value="<?php echo $nameVal ?>"/></p>
                <p>Nick</p>
                <p><input type="text" name="login" value="<?php echo $loginVal ?>"/></p>
                <p>Kontakt</p>
                <p><textarea name="contact"><?php echo $contactVal ?></textarea></p>
                <center><p><input type="submit" value="Zmień" /></p></center>
    </form>
    </section>
    </center>
</body>

<style>
  
*{
    text-align: center;
}
center{
    padding-top: 10px;
}

.container > * {
    display: inline-block;
}

form{
  padding-left: 20px;
  padding-right: 20px;
}

input[type="submit"]{
    width: 162px;
    height: 41px;

    background-color: #E8630A;
    color: #fff;
    border-radius: 15px;
    padding: 10px;
}

</style>
