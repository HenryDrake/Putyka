<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="generator" content="pspad editor, www.pspad.com">
  <meta name="description" content="http://norgath.novotnovi.net">
  <meta name="robots" content="all, follow">
  <meta name="author" content="design a kod: henry drake ; mailto:mr.funktastic@seznam.cz">
  <meta name="keywords" content="tøemošnice,larp,norgath,fantasy,døevárny,novotnovi,drake,elfin,dracak,ad,academia draconica" lang="cs">
  <title>Norgath LARP</title>

<link rel="stylesheet" href="styles.css" type="text/css">
<link rel="shortcut icon" href="images/favico.gif">

</head>
  
  
<body>


<center>
<div id="obal">
    <div id="ramhlavicek"> 
      <div class="hlava1"></div>
      <div class="hlava2"></div>
    </div>
        
     
   
   
         
        
       
          
     
         
<!--TOTO JE LEVE MENU-->
  <div id="leftmenu">
    <br><center>
    <div class="leftbutton"><img src="images/ico.jpg"><a href="index.html">Úvod</a></div>                   <br>
    <div class="leftbutton"><img src="images/ico.jpg"><a href="mistokonani.html">Místo konání</a></div>     <br>
    <div class="leftbutton"><img src="images/ico.jpg"><a href="prihlaseni.html">Pøihlášení</a></div>        <br>
  <div class="leftbutton"><img src="images/ico.jpg"><a href="knihanavstev.html">Kniha návštìv</a></div>   <br>
    <div class="leftbutton"><img src="images/ico.jpg"><a href="kontakt.html">Kontakt</a></div>              <br>
    <div class="leftbutton"><img src="images/ico.jpg"><a href="galerie.html">Galerie</a></div>              <br>
    <div class="leftbutton"><img src="images/ico.jpg"><a href="ostatni.html">Ostatní</a></div>             
    
    
        <br><br>
    
    <div align="center">
      <div class="leftbutton">Pøátelé:</div>
       <a href="http://dracak.com" target="_blank"><img src="images/ikony/dracak.gif" alt="Dracak" width="88" border="0" height="31"></a><br>
       <a href="http://erric.cz" target="_blank"><img src="images/ikony/erric.gif" alt="Erric.cz" width="88" border="0" height="31"></a><br>
       <a href="http://norgath.novotnovi.net" target="_blank"><img src="images/ikony/our1.gif" alt="Norgath LARP" width="88" border="0" height="31"></a><br>
       <br>
       
      
       
    </div>
  </div> 
  <!--TOTO JE KONEC LEVEHO MENU-->  
    
    







<!--TOTO JE PRAVE MENU-->  
     <div id="rightmenu">
          <div class="zahlavi"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
          <a href="zakladniinformace.html">Základní informace</a> - <a href="pravidla.html">Pravidla</a> - <a href="osvete.html">O svìtì</a> - <a href="obecneznalosti.html">Obecné znalosti</a></div>
 
 
 
 <!--TOTO JE OBSAH...........................................................-->          
      <div class="obsah">
          <font color="#808080" size="6">Pøihlášení</font>
 



 <!--CLANEK V OBSAHU-->             
      <center><div class="article">
                <div class="articletop"></div>
                <div class="articlein">
                      
                      
                      <center><div class="articletext">
                      <div class="dodatky">...</div>
                      <div class="nadpis-normal"><br>P&#345;ihlášení na Norgath V</div>
  


<?php
header("Content-Type: text/html; charset=UTF-8");


$c="host=pgsql port=5432 dbname=kuba.novotnovi.net user=kuba.novotnovi.net password=XXXXXXXX";

$pg=pg_connect($c);
if(!$pg) 
{  echo("Nepovedlo se pA™ipojit!");}

$q="SELECT * FROM seznam";

$h=pg_query($pg,$q);
if(!$h) 
{  echo("Nepovedlo se naÄ?A­st!");}

$a=pg_fetch_array($h);


?>

<table border="1">
<tr>
<td>Jméno</td>
<td>Postava</td>
</tr>

<?php

while(is_array($a))
 {  echo("<tr>"); 
    echo("<td>" . $a['hernijmeno'] ."</td>");

    echo("<td>" . $a['postava'] ."</td>");   
      $a=pg_fetch_array($h);}
      
      ?>

</table>
                      <div class="dodatky">Autor: ...</div>
                      
                      </div> 
                </div>
                <div class="articlebottom"></div>
              </div>
 <!--KONEC CLANKU V OBSAHU-->       
      <br>



 
<br>
      </div>
  <!--TOTO JE KONEC OBSAHU.................................................-->           
    <div id="reset"></div>
     </div>
 <!--TOTO JE KONEC PRAVEHO MENU-->     
     
     <div id="pata"></div>
  
 
</div>
</center>

</body>
</html>
