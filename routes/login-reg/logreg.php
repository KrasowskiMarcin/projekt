<article class="container">
    <form action="../../index.php" method="POST">
            <p>Login: </p>
            <p><input type="text" name="login"/></p>
            <p>Haslo: </p>
            <p><input type="password" name="passwd"/></p>
            <p> Zapamiętaj mnie: </p>
            <input type="checkbox" name="remember" value=1 />Tak
            <input type="checkbox" name="remember" value=2 />Nie
            <p><input type="submit" /></p>
    </form>
</article>

<style>
.container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}
</style>
