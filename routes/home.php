<?php
    require_once 'connection.php';
?>

<center><h1>Dostępne gadżety</h1></center>
<article class="container">
<!-- <a href="index.php?page=./routes/productdetails"class="button">Pokaż stronę detali</a> -->

<?php
    // zmienne do itemu
    $item = "item";
    $image = "image";
    $button = "btn";

    // query, które wyświetli obecne produkty, które znajdują się w bazie
    $query = "SELECT * FROM products";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_array($result)){
        $nazwa = $row['nazwa'];
        $url_obrazu = $row['url_obrazu'];

        echo "
        <section class = $item>
            <p> $nazwa </p>
            <img src=$url_obrazu>
            <button class=$button>Szczegóły produktu</button>
        </section>
        ";
		echo '<br><br>';
	}
?>


</article>

<style>
center{
    padding-top: 10px;
}
  a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: blue;
}

.container > * {
    display: inline-block;
}

/* Style itemów */

.item {
    margin: 50px;
  position: relative;
  height: 100px;
    width: 100px;

    
}

.item img {
  width: 100%;
  height: auto;
}

.item .btn {
  position: absolute;
  top: 180%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #001E6C;
  color: white;
  font-size: 16px;
  padding: 6px 12px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

.item .btn:hover {
  background-color:#E8630A; 
}

</style>
