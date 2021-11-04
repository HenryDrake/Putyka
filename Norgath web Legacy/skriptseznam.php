<?php
$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=604822275";

$pg=pg_connect($c);

$q="UPDATE seznam SET postava = 'vlastní' WHERE hernijmeno='Rodrigo'";

$h=pg_query($pg,$q);


     
     
    
      $a=pg_fetch_array($h);





















?>
