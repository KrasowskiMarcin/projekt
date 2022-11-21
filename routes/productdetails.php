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
?>
<article class="container">
    <section class ="image">
        <?php
            echo "<img src=$prodImageUrl>";
        ?>
        
    </section>
        <section class ="descriptionContainer">
            <?php
                echo $prodDescription;;
            ?>

        </section>
        
</article>

<style>
center{
    padding-top: 10px;
}

.container > * {
    display: inline-block;
}

.container{
}



.image{
    height: 100x;
    width: 15%;
    /* background-color: red; */
    float:left;
    border: 1px solid;
    padding:10px;
    margin-right: 50px;
}

.image img{
    width: 100%;
    height: auto;
}

.descriptionContainer{
    height: 400px;
    width: 400px;
    
}
</style>
