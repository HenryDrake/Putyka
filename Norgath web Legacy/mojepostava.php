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


<div style="background-color:yellow; color:black; padding-left:10; text-align:right">

<form name="prihlaseni" method="get" action="http://norgath.novotnovi.net/mojepostava.php">

<b>Norgath V: Osobní profil:</b> 

Jméno postavy:
<input type="text" name="charakter">

Heslo:
<input type="password" name="kod">

<input type="submit" value="Přihlásit se">



</form>

</div>

<?php
header("Content-Type: text/html; charset=UTF-8");


$kod=$_GET['kod'];
$charakter=$_GET['charakter'];
$akce=$_GET['akce'];



if($kod!="" && $charakter!="")
{
$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

if(!$pg) 
{  echo("Nepovedlo se pÅ™ipojit!");}

$q="SELECT heslo FROM hesla WHERE stranka='$charakter'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naÄÃ­st!");}

$a=pg_fetch_array($h);

if($a['heslo']==$kod)
 {
echo "<b>MENU:";
echo "<a class='menu' href='http://norgath.novotnovi.net/mojepostava.php?kod=$kod&charakter=$charakter&akce=popis'>Popis postavy</a>";
echo "<a class='menu' href='http://norgath.novotnovi.net/mojepostava.php?kod=$kod&charakter=$charakter&akce=editace'>Editace</a>";
echo "<a class='menu' href='http://norgath.novotnovi.net/mojepostava.php?kod=$kod&charakter=$charakter&akce=domluva'>Domluva s organizátory</a>";
echo "<a class='menu' href='http://norgath.novotnovi.net/mojepostava.php?kod=$kod&charakter=$charakter&akce=vzkazy'>Vzkazy</a></b></div>";

if($akce!="") 
{  
  switch ($akce)
   {
   case "popis": popis($charakter); break;
   case "editace": editace($charakter,$kod); break;
   case "domluva": domluva($charakter,$kod); break;
   case "vzkazy": vzkazy($charakter,$kod); break;
   case "reakce": $cislo=$_GET['cislo']; reakce($cislo,$charakter,$kod); break;
   case "posta": poslatvzkaz($charakter,$kod); break;
   
   }

}

 }
 else
{
echo "Špatně zadané jméno postavy nebo heslo!";
}

}


function popis($jmeno)
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="SELECT * FROM postavy WHERE postava='$jmeno'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

while(is_array($a))
 { 
   echo("<h3>" . $a['postava'] ."</h3><br>");
   echo($a['verejnypopis'] . "<br><hr>");
   echo "<b>NEVEŘEJNÉ INFORMACE:</b><br><hr>";
   echo($a['tajnypopis'] . "<br>");
     
    
      $a=pg_fetch_array($h);
 }

$qb="SELECT * FROM historie WHERE charakter='$jmeno'";

$hb=pg_query($pg,$qb);

if(!$hb) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$ab=pg_fetch_array($hb);

echo "<hr><b>Vlastní historie:</b><hr>";
echo ($ab['popis']);


}

function editace($jmeno,$heslo)
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="SELECT * FROM historie WHERE charakter='$jmeno'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

echo ("<form name='prepisovani' method='get' action='http://norgath.novotnovi.net/prepis.php'>
        <input type='hidden' name='jmeno' value='$jmeno'>
        <input type='hidden' name='heslo' value='$heslo'>
        <textarea name='novahistorie'>" 
        . $a['popis'] .
        "</textarea> 
        <input type='submit' value='Uložit'>"
      );



}

function domluva ($jmeno,$heslo)
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="SELECT * FROM komentare WHERE historie='$jmeno'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

while(is_array($a))
 {  echo("<hr><b>OD: " . $a['org'] ."</b><br>"); 
    echo("<p>" . $a['komentar'] ."</p>");
    echo ("<a href='http://norgath.novotnovi.net/mojepostava.php?kod=$heslo&charakter=$jmeno&akce=reakce&cislo=" . $a['cislo'] . "' class='menu'><li>Reagovat</a><hr>");
    
     
    
      $a=pg_fetch_array($h);}



}

function reakce($odkaz,$jmeno, $heslo)
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="SELECT * FROM komentare WHERE cislo='$odkaz'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

echo ("<form name='prepisovani' method='get' action='http://norgath.novotnovi.net/prepis.php'>
        <input type='hidden' name='puvodnikomentar' value='" .$a['komentar'] . "'>
        <input type='hidden' name='cislo' value='" .$a['cislo'] . "'>
        <textarea name='novareakce'></textarea> 
        <input type='submit' value='Odeslat'>
        <input type='hidden' name='jmeno' value='$jmeno'>
        <input type='hidden' name='heslo' value='$heslo'>"
      );



}

function vzkazy($jmeno,$heslo)
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="SELECT * FROM vzkazovnik WHERE prijemce='$jmeno'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

while(is_array($a))
 {  echo("<hr><b>OD: " . $a['odesilatel'] ."</b><br>"); 
    echo("<p>" . $a['vzkaz'] ."</p><hr>");
       
      $a=pg_fetch_array($h);}

echo ("<a href='http://norgath.novotnovi.net/mojepostava.php?kod=$heslo&charakter=$jmeno&akce=posta' class='menu'>Poslat vzkaz</a>");

}

function poslatvzkaz($jmeno, $heslo)
{



echo ("<form name='komunikace' method='get' action='http://norgath.novotnovi.net/prepis.php'>
        <input type='hidden' name='jmeno' value='$jmeno'>
        <input type='hidden' name='heslo' value='$heslo'>
        Adresát:<br>
        <input type='text' name='adresat'><br> 
        Text vzkazu:<br>
        <textarea name='novyvzkaz'></textarea><br> 
        <input type='submit' value='Odeslat'>"
      );



}

?>





</body>

</html>