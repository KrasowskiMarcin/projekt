<center><h1> Dodaj Produkt </h1></center>
<article class="container">
    <form action="" method="POST">
                <p>Nazwa produktu </p>
                <p><input type="text" name="prodName"/></p>
                <p>Opis </p>
                <p><textarea name="description"></textarea></p>
                <p>URL obrazu </p>
                <p><input type="text" name="login"/></p>
                <center><p><input type="submit" /></p></center>
    </form>
</article>

<style>
center{
    padding-top: 10px;
}

.container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
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
