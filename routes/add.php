<?php
    require_once 'connection.php';
?>

<body> 
    <center><h1> Dodaj Produkt </h1></center>
    <center>
    <section class="container">
    <form action="" method="POST">
                <p>Nazwa produktu </p>
                <p><input type="text" name="prodName"/></p>
                <p>Opis </p>
                <p><textarea name="description"></textarea></p>
                <p>URL obrazu </p>
                <p><input type="text" name="imageUrl"/></p>
                <center><p><input type="submit" /></p></center>
    </form>
    </section>
    </center>

    <?php
        if(isset($_POST['prodName']) && 
        isset($_POST['description']) &&
        isset($_POST['imageUrl'])
        ){
            $name = $_POST['prodName'];
            $description = $_POST['description'];
            $imageUrl = $_POST['imageUrl'];

            if($name != '' && $description != '' && $imageUrl != ''){

            // zapytanie do bazy danych, które wstawi nowy produkt
            $sql = "INSERT INTO `products`(`id`, `nazwa`, `opis`, `url_obrazu`, `user_id`)
	        VALUES (NULL, '$name', '$description', '$imageUrl', '$_COOKIE[userId]')";

            if($result = mysqli_query($connection, $sql)) echo "Dodano $name";
            else echo "Nie udało się dodać produktu";
            }else{
                echo "Uzupełnij wszystkie pola";
            }


        }
    ?>
</body>

<style>
  
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
