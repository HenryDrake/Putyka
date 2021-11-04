<html>
<head>
<title>Profil organizátora</title>

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

<form name="prihlaseni" method="get" action="http://norgath.novotnovi.net/orgovani.php">

<b>Norgath V: Profil organizátora:</b> 

Org:
<input type="text" name="organizator">

Heslo:
<input type="password" name="kod">

<input type="submit" value="Přihlásit se">



</form>

</div>

<?php
header("Content-Type: text/html; charset=UTF-8");


$kod=$_GET['kod'];
$organizator=$_GET['organizator'];
$akce=$_GET['akce'];



if($kod!="" && $organizator!="")
{
$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

if(!$pg) 
{  echo("Nepovedlo se pA™ipojit!");}

$q="SELECT heslo FROM orghesla WHERE stranka='$organizator'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naÄ?A­st!");}

$a=pg_fetch_array($h);

if($a['heslo']==$kod)
 {
echo "<b>MENU:";
echo "<a class='menu' href='http://norgath.novotnovi.net/orgovani.php?kod=$kod&organizator=$organizator&akce=postavy'>Editace postav</a>";
echo "<a class='menu' href='http://norgath.novotnovi.net/orgovani.php?kod=$kod&organizator=$organizator&akce=komentare'>Komentáře</a>";
echo "<a class='menu' href='http://norgath.novotnovi.net/orgovani.php?kod=$kod&organizator=$organizator&akce=historie'>Historie</a>";
echo "<a class='menu' href='http://jakub.novotnovi.net/postavy.htm' target='_blank'>Přidat postavu</a>";
echo "<a class='menu' href='http://jakub.novotnovi.net/Seznam.php?kod=hejkaliporici' target='_blank'>Seznam přihlášených</a>";
echo "<a class='menu' href='http://jakub.novotnovi.net/prohlizenipostav.php?kod=hejkaliporici' target='_blank'>Přehled postav</a><br>";




if($akce!="") 
{  
  switch ($akce)
   {
   case "postavy": postavy($organizator, $kod); break;
   case "komentare": komentare($organizator, $kod); break;
   case "historie": historie(); break;
   case "editacepostav": $postava=$_GET['postava']; editacepostav($postava); break;
   case "komentovani": komentovani($organizator, $kod); break;
   }

}

 }
 else
{
echo "Špatně zadané jméno nebo heslo!";
}

}


function postavy($organizator, $kod)
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="SELECT postava FROM postavy";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

while(is_array($a))
 { 
 $jmeno=$a['postava'];
   echo("<a href='http://norgath.novotnovi.net/orgovani.php?kod=$kod&organizator=$organizator&akce=editacepostav&postava=$jmeno'>");
   echo($a['postava'] . "</a><br>");
     
    
      $a=pg_fetch_array($h);
 }

}

function editacepostav($jmeno)
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
 echo ("<form name='prepisovani' method='get' action='http://norgath.novotnovi.net/orgprepis.php'>
        <input type='hidden' name='jmeno' value='$jmeno'>
        <h1>Veřejný popis</h1>
        <textarea name='novypopis'>" 
        . $a['verejnypopis'] .
        "</textarea> ");
      
      echo ("<h1>Tajný popis</h1>
      <textarea name='novetajne'>" 
        . $a['tajnypopis'] .
        "</textarea> ");
        
        echo ("<h1>Jméno</h1>
        <textarea name='novejmeno'>" 
        . $a['postava'] .
        "</textarea> ");
      
      echo ("<h1>Hráč</h1>
      <textarea name='novyhrac'>" 
        . $a['hrac'] .
        "</textarea> 
        <input type='submit' value='Uložit'>"
      );
     
    
      $a=pg_fetch_array($h);
 }




}

function komentare ($org,$kod)
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="SELECT * FROM komentare WHERE org='$org'";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

while(is_array($a))
 {  echo("<hr><b>PRO: " . $a['historie'] ."</b><br>"); 
    echo("<p>" . $a['komentar'] ."</p>");
 
    
     
    
      $a=pg_fetch_array($h);}

echo "<a href='http://norgath.novotnovi.net/orgovani.php?kod=$kod&organizator=$org&akce=komentovani' class='menu'><li>Napsat komentář</a>";

}

function komentovani($org,$kod)
{

echo ("<form name='komentuji' method='get' action='http://norgath.novotnovi.net/orgprepis.php'>
        <input type='hidden' name='jmeno' value='$org'>
        Adresát:<br>
        <input type='text' name='komentadresat'><br> 
        Číslo:<br>
        <input type='text' name='cislokomentu'><br> 
        Text komentáře:<br>
        <textarea name='novykomentar'></textarea><br> 
        <input type='submit' value='Odeslat'>"
      );
    



}

function historie()
{

$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);



$qb="SELECT * FROM historie";

$hb=pg_query($pg,$qb);

if(!$hb) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$ab=pg_fetch_array($hb);

 while(is_array($ab))
 {  echo("<hr><b>" . $ab['charakter'] ."</b><br>"); 
    echo("<p>" . $ab['popis'] ."</p><hr>");

      $ab=pg_fetch_array($hb);}


}

function poslatvzkaz($jmeno)
{



echo ("<form name='komunikace' method='get' action='http://norgath.novotnovi.net/prepis.php'>
        <input type='hidden' name='jmeno' value='$jmeno'>
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