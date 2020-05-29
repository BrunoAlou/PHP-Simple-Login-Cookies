<?php
$situation = null ; 
if (isset($_POST['submit'])) {
$password = md5($_POST["password"]);
$email = $_POST["email"];

$pMysqli = new mysqli("DBAdress", "DBUser", "DBPassword", "DBname");
$sql = "SELECT * FROM users WHERE users.email='$email' AND users.password ='$password' ";
$q = $pMysqli->query($sql);
if($q->num_rows){
    $situation = true;
    $secret_word = 'test';
		$hour = time() + 3600; 
		setcookie('login',$email, $hour); 
		setcookie('password', $password.md5($secret_word), $hour);
    header('Location: list.php');
}else{
    $situation = false;
    header('Location: login.php?situation='.$situation);
}
}
?>


<?php 
if($_GET){
    $situation = false ;   
}
include 'header.php'; ?>
<body>
<div class="container-flex">
    <form class="form-signin" name='submitform' method='post' action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1 class="h3 mb-3 font-weight-normal">Realize seu login</h1>

        <label for="inputEmail" class="sr-only">Email</label>
        <input id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus>

        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <?php
              if($situation == true){
                echo "<div><p style=\"color:green;text-align:center;\">Login Realizado Com Sucesso!<p></div>";
              }if($situation === false){
                echo "<div><p style=\"color:red;text-align:center;\">Senha ou usuário incorreto!<p></div>";
              }else{
                echo "<div hidden><p><p></div>";
              }
        ?>
        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Login</button>
        <p class="mt-5 mb-3 text-muted">Bruno Alves Lourenço &copy; 2020-2020</p>
</div>
</form>
</div>
            </body>
<?php include 'footer.php'; ?>
<script type="text/javascript">
  var situation;
  situation = <?php echo json_encode($situation); ?>;
  if(situation == 'false'){
    var x = document.getElementsByClassName("alert");
    x[0].innerHTML = "<p style=\"color:red;text-align:center;\">Senha Incorreta!<p>";
  }
</script>

</html>