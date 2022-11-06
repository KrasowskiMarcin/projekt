<body>
    <center>
    <section class="container">
        <form action="" method="POST">
                    <center><h1>Zaloguj</h1></center>
                    <p>Login </p>
                    <p><input type="text" name="login"/></p>
                    <p>Hasło </p>
                    <p><input type="password" name="pass"/></p>
                    <center><p><input type="submit" value="Zaloguj"/></p></center>
        </form>
        
        <form action="" method="POST">
                  <center><h1>Zarejestruj</h1></center>
                  <p>Imie i nazwisko </p>
                  <p><input type="text" name="nameSur"/></p>
                  <p>Login </p>
                  <p><input type="text" name="login"/></p>
                  <p>Hasło </p>
                  <p><input type="password" name="pass"/></p>
                  <p>Kontakt </p>
                  <p><textarea name="description"></textarea></p>
                  <center><p><input type="submit" value="Zarejestruj"/></p></center>
      </form>
    </section>
    </center>
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
