<section class="wrap">
<?php
    require_once 'connection.php';
    @$id = $_GET["id"];

    $prodName;
    $prodDescription;
    $prodImageUrl;

    // query baza
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($result)){
        $prodName = $row['nazwa'];
        $prodDescription = $row['opis'];
        $prodImageUrl = $row['url_obrazu'];
        $userId = $row['user_id'];
    }
?>

<?php
    echo "<center><h1>$prodName</h1></center>";
    echo "<center><p>$prodDescription</p></center>";
    echo "<img src=$prodImageUrl>";

?>

<!-- Jeśli user_id przypisane do przedmiotu oraz id zalogowanego usera się pokrywa to -->
<!-- wyświetl formularz  -->
<?php if($userId == $_COOKIE['userId']) : ?>
    <form action="" method="POST">
                <center><p><input type="submit" name="delete" value="usuń produkt"/></p></center>
                <p>Nazwa produktu </p>
                <p><input type="text" name="prodName" value="<?php echo $prodName ?>"/></p>
                <p>Opis </p>
                <p><textarea name="description"><?php echo $prodDescription ?></textarea></p>
                <p>URL obrazu </p>
                <p><input type="text" name="imageUrl" value="<?php echo $prodImageUrl ?>"/></p>
                <center><p><input type="submit" name="edit" value="edytuj"/></p></center>
</form>
<?php endif; ?>


<?php
// usuwanie produktu
if(isset($_POST['delete'])){
    $query = "DELETE FROM products WHERE id=$id";
    $result = mysqli_query($connection, $query);
    // przenieś użytkownika na strone główną
    header('Location: index.php');
}
// edycja produktu
if(isset($_POST['edit'])){
    if(isset($_POST['prodName']) || isset($_POST['description']) || isset($_POST['imageUrl'])){

        $newName = $_POST['prodName'];
        $newDesc = $_POST['description'];
        $newUrl = $_POST['imageUrl'];
        
        $query= "UPDATE products SET nazwa = '$newName', opis = '$newDesc', url_obrazu = '$newUrl' WHERE id = '$id'";
        $result = mysqli_query($connection, $query);
        // refresh strony
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
?>

</section>
<style>

.wrap{
  height: 66vh;
  width: 80%;
  max-width:100%;
  max-height:50vh;

  overflow: -moz-scrollbars-vertical; 
  overflow-y: scroll;
  text-align: center;

  /* border: 1px solid black; */
}

img{
    border: 5px solid black;
    border-radius: 15px;
    height: 25vh;
    width: 25vh;
}
h1{
    color: black;
    font-size: xx-large;
    font-weight: bolder;
}

</style>