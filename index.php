<?php
    @$page = $_GET["page"];
    if($page == ""){
        $page = "./routes/home";
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/styles.css">

</head>
<body>
    <header>
        <article class="containerheader">
            <h2>Gadżety Szczecin</h2>
        </article>
    </header>

    <nav class="topnav" id="myTopnav">
        <a href="index.php?page=./routes/home">Strona główna</a>
        <a href="index.php?page=./routes/add">Dodaj produkt</a>
        <a href="index.php?page=./routes/logreg">Zaloguj/Zarejestruj</a>
        <a href="index.php?page=./routes/myaccount">Moje konto</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>

    <main>
        <center>
        <section class="mainsection">
            <?php
                include($page.".php");
            ?>
        </section>
        </center>
    </main>

        <footer><p>Autor: Marcin Krasowski</p></footer>

    <script>
    function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
    }
    </script>

</body>
</html>

