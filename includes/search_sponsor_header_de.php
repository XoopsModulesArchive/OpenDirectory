<?php

// the $searchstring variable in the amazon.com url is replaced with what the user searched for
// modified for Amazon.de, 11.04.2002 by Peter Schuetz, www.PSchuetz.com / www.GewusstWie.ch
$amazon_id = 'gewusstwiech-21';
$amazon_books = "http://www.amazon.de/exec/obidos/external-search?tag=$amazon_id&keyword=$searchstring&index=books-de&index=blended";
$amazon_music = "http://www.amazon.de/exec/obidos/external-search?tag=$amazon_id&keyword=$searchstring&index=music";
$amazon_dvd = "http://www.amazon.de/exec/obidos/external-search?tag=$amazon_id&keyword=$searchstring&index=dvd-de";
$amazon_video = "http://www.amazon.de/exec/obidos/external-search?tag=$amazon_id&keyword=$searchstring&index=vhs-de";
$amazon_games = "http://www.amazon.de/exec/obidos/external-search?tag=$amazon_id&keyword=$searchstring&index=video-games-de";
$amazon_softw = "http://www.amazon.de/exec/obidos/external-search?tag=$amazon_id&keyword=$searchstring&index=ce-de";
?>
<center>
<table border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
<div align="center">In Zusammenarbeit mit <b>Amazon.de</b>: Medien zum Thema</div>
</td>
</tr>
<tr>
<td>
<table width="100%" border="1" cellspacing="0" cellpadding="3" bordercolor="#000000">
<tr bgcolor="#CCCCCC">
<td width="16%">
<div align="center"><b>B&uuml;cher</b></div>
</td>
<td width="16%">
<div align="center"><b>Musik</b></div>
</td>
<td width="16%">
<div align="center"><b>DVD</b></div>
</td>
<td width="16%">
<div align="center"><b>Videos</b></div>
</td>
<td width="16%">
<div align="center"><b>Games</b></div>
</td>
<td width="16%">
<div align="center"><b>Software</b></div>
</td>
</tr>
<tr>
<td width="16%">
<div align="center"><a href="<?=$amazon_books?>">
<?=$searchstring?>
</a></div>
</td>
<td width="16%">
<div align="center"><a href="<?=$amazon_music?>">
<?=$searchstring?>
</a></div>
</td>
<td width="16%">
<div align="center"><a href="<?=$amazon_dvd?>">
<?=$searchstring?>
</a></div>
</td>
<td width="16%">
<div align="center"><a href="<?=$amazon_video?>">
<?=$searchstring?>
</a></div>
</td>
<td width="16%">
<div align="center"><a href="<?=$amazon_games?>">
<?=$searchstring?>
</a></div>
</td>
<td width="16%">
<div align="center"><a href="<?=$amazon_softw?>">
<?=$searchstring?>
</a></div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</center>
