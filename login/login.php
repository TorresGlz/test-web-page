<?php 
 //Conexion con la base de datos.
 $conexion= new mysqli("localhost","root", "1234");
   
 if($conexion->connect_errno){
      echo "Fallo al conectar a MySQL:(". $conexion->connect_errno.")";
 }
 else{
 $conexion->select_db("test");
      
 //declaramos como variables a los campos de texto del formulario.
 $nombre=$_POST["txtuser"];
 $password=$_POST["txtpass"];

 //Consulta del usuario y el password
 $consulta="SELECT usuario,password FROM usuario 
 WHERE usuario='$nombre' and password='$password'";
 if($query= $conexion->query($consulta)){
 $row=$query->fetch_array(); 
 $nr =$query->num_rows; 
 //Si existe el usuario lo va a redireccionar a la pagina de Bienvenida.
 if($nr == 1){ 
   header ("Location:alumno.php"); 
 }
 //Si no existe lo va a enviar al login otra vez.
 else if($nr <= 0) { 
               header("Location:index.html"); 
 }  
 }
 else{
 echo $conexion->error;  
 }
}  
?>