<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	
input[type=text], select {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 20%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 20%;
}
</style>
<body>
<h1 style="background-color:DodgerBlue;">Expresiones Regulares</h1>


<?php 



//patron busqueda repetidas \\b(\\w+)\\s+\\1\\b+
//botones
$btnRemplazar="";
$boton1="";
$boton4="";
$boton2="";
$boton3="";
$boton5="";
$boton12="";
if (isset($_POST['boton1']))$boton1=$_POST['boton1'];
if (isset($_POST['boton2']))$boton2=$_POST['boton2'];
if (isset($_POST['boton5']))$boton5=$_POST['boton5'];
if (isset($_POST['boton3']))$boton3=$_POST['boton3'];
if (isset($_POST['boton4']))$boton4=$_POST['boton4'];
if (isset($_POST['boton12']))$boton12=$_POST['boton12']; 
function eachLetter($imprimir){
$chopped=str_split($imprimir);
foreach ($chopped as $x) {
	echo "$x <br>";
}

}

$lineas = file("contenido.txt");
foreach($lineas as $linea){
 echo "$linea";
}


//buscar las palabra especifica

if ($boton2) {
	
$bus = trim($_POST['buscar']);   


if (preg_match_all("/$bus/i", $linea, $mat, PREG_SET_ORDER, 0))
	{

	echo "<br>HAY COINCIDENCIA<br>";
	var_dump($mat);
	} else 
		{
		echo "<br>NO HAY COINCIDENCIA";
		}
	//reemplazar las palabra especifica	

$rem=trim($_POST['reemplazar']);


echo preg_replace("/$bus/", $rem, $linea);
}

// palabras similares
if ($boton3) {


$bus = trim($_POST['similar']);   


if (preg_match_all("/\b[\>]*$bus*[a-zA-Z]+/i", $linea, $mat, PREG_SET_ORDER, 0))
	{

	echo "<br>HAY COINCIDENCIA<br>";
	var_dump($mat);
	} else 
		{
		echo "<br>NO HAY COINCIDENCIA";
		}

}
 //eleiminar palabras repetidas seguidas

if ($boton1) {
	# code...
	$re = '/\b(\w+)(?: +\1)\b/';
 preg_match_all($re, $linea , $mat, PREG_SET_ORDER);
 var_dump($mat);




}
if ($boton12) {
	# code...
echo implode(' ', array_unique(explode(' ', "<br>$linea<br>")));

}

if ($boton4) {

print_r(strtoupper("<br>$linea<br>"));//convertir de minuscula a mayuscula
	
}
if ($boton5) {
	# code...

print_r(strtolower("<br>$linea<br>"));//convertir de mayuscula a minuscula
}
 ?>

 <div>
	 	<form  method="post" >

	Encontrar palabras similares:<br>
	Ingresa la palabra:<br>
<p><input type="text" name="similar" placeholder="Ingresa"></p>
<p><input type="submit" name="boton3" value="BUSCAR"></p>
	<p><input type="submit" name="boton1" value="Buscar palabras repetidas seguidas"> 
<input type="submit" name="boton12" value="Eliminar palabras repetidas seguidas">
	</p>

Buscar una palabra especifica y reemplazar todas sus apariciones:<br>	

<br>Buscar palabra:<br>
<p><input type="text" name="buscar" placeholder="Buscar"></p>

Palabra ha reemplazar:<br>
<p><input type="text" name="reemplazar" placeholder="Remplazo"></p>
<p><input type="submit" name="boton2" value="REMPLAZAR"></p>

<br>Convertir las palabras de mayusculas a minusculas y viceversa.<br>
<p><input type="submit" name="boton4" value="MINUSCULA A MAYUSCULA"></p>
<P><input type="submit" name="boton5" value="MAYUSCULA A MINUSCULA"></P>
</form>
	 </div>





</body>
</html>