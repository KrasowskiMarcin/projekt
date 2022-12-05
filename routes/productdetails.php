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
    }
?>

<?php
    echo "<center><h1>$prodName</h1></center>";
    echo "<center><p>$prodDescription</p></center>";
    echo "<img src=$prodImageUrl>";
?>

<style>

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
