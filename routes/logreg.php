<?php
require_once 'connection.php';

session_start();
if($_SESSION["loggedIn"] == true){
    session_destroy();
    $past = time() - 3600;
foreach ( $_COOKIE as $key => $value )
{
    setcookie( $key, $value, $past, '/' );
}
    $id = $_SESSION["userId"];
    setcookie("userId", $id, time() + 3600, '/');
}else{
    echo "";
}
?>

<body>
    <center>
    <section class="container2">
        <section class="wrapLogReg">
        <form action="" method="POST">
                    <center><h1>Zaloguj</h1></center>
                    <p>Login </p>
                    <p><input type="text" name="login"/></p>
                    <p>Hasło </p>
                    <p><input type="password" name="pass"/></p>
                    <center><p><input type="submit" name="loginIn" value="Zaloguj"/></p></center>
        </form>
        
        <form action="index.php?page=./routes/logreg" method="POST">
                  <center><h1>Zarejestruj</h1></center>
                  <p>Imie i nazwisko </p>
                  <p><input type="text" name="nameSur"/></p>
                  <p>Login </p>
                  <p><input type="text" name="login"/></p>
                  <p>Hasło </p>
                  <p><input type="password" name="pass"/></p>
                  <p>Powtórz hasło</p>
                  <p><input type="password" name="passRepeat"/></p>
                  <p>Kontakt </p>
                  <p><textarea name="contact"></textarea></p>
                  <center><p><input type="submit" name="register" value="Zarejestruj"/></p></center>
      </form>
    </section>
    </section>
    </center>

    <?php
        if(isset($_POST['loginIn'])){
            if(isset($_POST['login']) && 
            isset($_POST['pass'])){

            $login = $_POST['login'];
            $password = $_POST['pass'];
            $query = "SELECT * FROM users WHERE login = '$login'";

            if($login != '' || $password != ''){
                
                $result = mysqli_query($connection, $query);
                while($row = mysqli_fetch_array($result)){
                    if(password_verify($password, $row['password'])){
                        echo 'Zalogowano jako '.$row['name'];
                        $_SESSION["loggedIn"] = true;
                        $_SESSION["userId"] = $row["id"];
                    }else{
                        session_destroy();
                        echo "Błąd logowania";
                        // $_SESSION["loggedIn"] = false;
                    }
                }
            }               
            }
        }


        if(isset($_POST['register'])){
            if(isset($_POST['nameSur']) && 
            isset($_POST['login']) &&
            isset($_POST['pass'])
            ){
                $name = $_POST['nameSur'];
                $contact = $_POST['contact'];
                $login = $_POST['login'];
                $password = $_POST['pass'];
                $passRepeat = $_POST['passRepeat'];
                
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
        
                    // zapytanie do bazy danych, które wstawi nowego uzytkownika
                    $sql = "INSERT INTO `users`(`id`, `name`, `login`, `password`, `contact`)
                    VALUES (NULL, '$name', '$login', '$password_hash', '$contact')";
                    
                    // sprawdzenie czy pola nie są puste
                    if($name != '' && $login != '' && $contact != '' && $password != '' && $passRepeat != '' ){
                        // sprawdzenie czy powtórzone hasło się zgadza
                        if($password != $passRepeat){
                            echo "Hasła się nie zgadzają, sprawdź czy w obu rubrykach są takie same";
                        }else{
                            // czy istnieje duplikat
                            $checkQuery = mysqli_query($connection, "SELECT * FROM `users` WHERE login = '$login'");
                            if($checkQuery->num_rows == 0 ){
                                if($result = mysqli_query($connection, $sql)) echo "Dodano użytkownika $name";
                                else echo "Nie udało się dodać użytkownika";   
                            }else{
                                echo "Taki użytkownik już istnieje";
                            }


             
                        }
                    }else{
                        echo "Sprawdź, czy pola nie są puste";
                    }
            }
        }
    ?>
</body>

<style>
  
center{
    padding-top: 10px;
  
}

.container2 > * {
    display: inline-block;
}

.wrapLogReg{
    overflow: -moz-scrollbars-vertical; 
    overflow-y: scroll;
    height: 55vh;
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
