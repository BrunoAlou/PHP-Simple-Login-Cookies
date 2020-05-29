<?php 
if (isset($_COOKIE['login'])) { 


  $pMysqli = new mysqli('localhost', 'root', '@Legend10', 'woweb');
    $email = $_COOKIE['login']; 
    $pass = $_COOKIE['password'];
    $secret = md5('test');


    $password = str_replace($secret, "", $pass);

    $sql = "SELECT * FROM users WHERE users.email='$email' AND users.password ='$password' ";
    $check = $pMysqli->query($sql);
    if($check){
      $situation ='true';
    }
    else{
      $situation ='false';
    }
  }else{
  $situation ='false';
}
?>
<?php
include 'header.php';
$link = mysqli_connect("DBAdress", "DBUser", "DBPassword", "DBname");
mysqli_set_charset($link,'utf8');
?>
<body>
<table class="table" style="margin-bottom: 10rem;">
        <thead>
            <tr>
            <th scope="col"><b>Id</b></th>
            <th scope="col"><b>Nome</b></th>
            <th scope="col"><b>Email</b></th>
            </tr>
        </thead>
<tbody>
<?php    
$sql = mysqli_query($link,"select * from users") or die("Erro");
while($row = $sql->fetch_assoc()){
    print_r('<tr>
    <th scope="row">'. $row['id'] .'</th>
    <td>' . $row['name'] .'</td>
    <td>' . $row['email'] .'</td>
    </tr>
    ');

}
?>
</tbody>
</table>

<?php
include 'footer.php';
?>




<script type="text/javascript">
  var situation;
  situation = <?php echo json_encode($situation); ?>;
  if(situation == 'false'){
    var x = document.getElementsByClassName("table");
    x[0].innerHTML = "<p>Realize Login para acessar a listagem<p>";
    x[0].append('');
  }
</script>
