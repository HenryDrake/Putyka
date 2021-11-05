<html>

<head>
<title>Norgath V: jídlo a stany</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<style>
body {background-color: black;
      color: yellow}

</style>


</head>

<body>   

 <?php
 
$kod=$_GET['kod'];
$charakter=$_GET['charakter'];
$jmeno=$_GET['jmeno'];
$stan=$_GET['stan'];
$jidlo=$_GET['jidlo'];
 
if($kod!="" && $charakter!="")
{
$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=XXXXXXXX";

$pg=pg_connect($c);

if(!$pg) 
{  echo("Nepovedlo se pÅ™ipojit!");}

$q="SELECT heslo FROM hesla WHERE stranka='$charakter'";

$h=pg_query($pg,$q);

if(!$h) 
{  
echo("Nepovedlo se naÄÃ­st!"); 
}


$a=pg_fetch_array($h);

if($a['heslo']==$kod)
 {
 
 $c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$jmeno = $jmeno . "(" . $charakter . ")";

$q="INSERT INTO objednavky(hrac, stan, jidlo) VALUES ('$jmeno', '$stan', '$jidlo')";

$h=pg_query($pg,$q);

if(!$h) 

{
echo "Nepovedlo se to zapsat!";
}
 
 }
 
 }

 
 ?>



<h2>Stan si zamluvili</h1>

<?php
$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="SELECT * FROM objednavky WHERE stan='ANO'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

while(is_array($a))
 { 
   echo($a['hrac'] . "<br>");
   
      $a=pg_fetch_array($h);
 }


?>

<h2>Jídlo si zamluvili</h1>

<?php


$q="SELECT * FROM objednavky WHERE jidlo='ANO'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

while(is_array($a))
 { 
   echo($a['hrac'] . "<br>");
   
      $a=pg_fetch_array($h);
 }


?>


 <form name="objednat" action="http://norgath.novotnovi.net/objednavky.php" method="GET">
<h2>Zamlouvání jídla a stanů</h2>

Jméno hráče: <input type="text" name="jmeno">  <br>
Jméno postavy: <input type="text" name="charakter">  <br>
Vaše heslo: <input type="password" name="kod">  <br>

Stan: <br>
<input type="radio" name="stan" value="ANO"> ANO <br>
<input type="radio" name="stan" value="NE"> NE <br>

Jídlo: <br>
<input type="radio" name="jidlo" value="ANO"> ANO <br>
<input type="radio" name="jidlo" value="NE"> NE <br>

<input type="submit" value="Zamluvit">

<p>
Poznámka: Jestliže máte zamluvené pouze jídlo/pouze stan a chcete obojí, vyplňte formulář, ale
"ANO" zaškrtněte pouze u toho, co přiobjednáváte.
</p>



</form>

</body>

</html>