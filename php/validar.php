<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion =mysqli_connect("localhost", "root","", "login_bd");

$consulta="SELECT*FROM usuarios where usuarios= '$usuario' and contraseña='$contraseña' ";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.php")

}else{
    ?>
    <?php
    include("index.php");
    ?>
    <h3 class="bad">ERROR EN LA AUTENTIFICACION</h3>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);