<html>
<head>
<title>Moje postava</title>

<style>
body {background-color: black;
      color: yellow;
      margin:30}
      
a {color: yellow}

textarea {width: 500;
          height:300}
          
.menu {background-color: yellow;
          color:black;
          margin:10;
          padding:3}

</style>

</head>

<body>

<?php
$jmeno=$_GET['jmeno'];
$heslo=$_GET['heslo'];
$novahistorie=$_GET['novahistorie'];
$puvodnikomentar=$_GET['puvodnikomentar'];
$novareakce=$_GET['novareakce'];
$cislo=$_GET['cislo'];
$novyvzkaz=$_GET['novyvzkaz'];
$adresat=$_GET['adresat'];



echo "Hotovo!<br>";
echo "<a href='http://norgath.novotnovi.net/mojepostava.php?kod=$heslo&charakter=$jmeno'>Zpět</a>";

if($novahistorie!="")
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=XXXXXXXXXXXX";

$pg=pg_connect($c);
if(!$pg) 
{
echo "Nepovedlo se to zapsat!";
}



$q = "UPDATE historie SET popis = '$novahistorie' WHERE charakter='$jmeno'";

$h=pg_query($pg,$q);
if(!$h) 

{
echo "Nepovedlo se to zapsat!";
}

}

if($novareakce!="")
{

$novahodnota = $puvodnikomentar . "<br><b><i>Vaše reakce</i></b><br>" . $novareakce;

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);
if(!$pg) 
{
echo "Nepovedlo se to zapsat!";
}



$q = "UPDATE komentare SET komentar = '$novahodnota' WHERE cislo='$cislo'";

$h=pg_query($pg,$q);
if(!$h) 

{
echo "Nepovedlo se to zapsat!";
}

}

if($novyvzkaz!="")
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);
if(!$pg) 
{
echo "Nepovedlo se to zapsat!";
}

$q="INSERT INTO vzkazovnik(odesilatel, prijemce, vzkaz) VALUES('$jmeno', '$adresat', '$novyvzkaz')";

$h=pg_query($pg,$q);
if(!$h) 

{
echo "Nepovedlo se to zapsat!";
}

}


?>

</body>
</html>
