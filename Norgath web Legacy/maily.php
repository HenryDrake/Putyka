<?php
$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="SELECT mail FROM seznam";

$h=pg_query($pg,$q);

if(!$h) 
{  echo("Nepovedlo se naĂ„ÂŤĂÂ­st!");}

$a=pg_fetch_array($h);

while(is_array($a))
 { 
   echo($a['mail'] . "; ");
   
      $a=pg_fetch_array($h);
 }


?>