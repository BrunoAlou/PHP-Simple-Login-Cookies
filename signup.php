<?php
$insert = '';
if (isset($_POST['submit'])) {
$password = md5($_POST["password"]);
$email = $_POST["email"];
$name = $_POST["user"];

$pMysqli = new mysqli("DBAdress", "DBUser", "DBPassword", "DBname");
$sql = "INSERT INTO users (name, email,password)
    VALUES ('".$name."','".$email."','".$password."')";

if($pMysqli->query($sql) === TRUE){
    $insert = true;
}else{
    $insert = false;
}
}
?>

<?php include 'header.php'; ?>
<body>

<div class="container-flex">
    <form class="form-signin" name='submitform' method='post' action="<?php echo $_SERVER['PHP_SELF']?>">

        <div class="grid-container">
            <div class="grid-item content">
                    <h1 class="h3 mb-3 font-weight-normal">Realize seu cadastro</h1>

                    <label for="inputUser" class="sr-only">Usuário</label>
                    <input id="inputUser" class="form-control" placeholder="Usuário" name="user" required autofocus>

                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="Email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus>

                    <label for="inputPassword" class="sr-only">Senha</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                    <?php
                    if($insert == true){
                    echo "<div><p style=\"color:green;text-align:center;\">Cadastro Realizado Com Sucesso!<p></div>";
                    }if($insert === false){
                        echo "<div><p style=\"color:red;text-align:center;\">Não foi Possível realizar o cadastro!<p></div>";
                    }else{
                        echo "<div hidden><p style=\"color:red;text-align:center;\">Não foi Possível realizar o cadastro!<p></div>";
                    }

                    ?>

                    <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Salvar</button>
                    <p class="mt-5 mb-3 text-muted">Bruno Alves Lourenço &copy; 2020-2020</p>
            </div>
        </div>
    </form>
</div>
</body>

<?php include 'footer.php'; ?>
