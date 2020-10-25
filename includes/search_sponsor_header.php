<?php

// the $searchstring variable in the amazon.com url is replaced with what the user searched for
if (XOOPS_USE_MULTIBYTES) {
    $amazon_id = 'wanisys-22';

    $searchkey_utf = mb_convert_encoding(trim($searchstring), 'utf-8', _CHARSET);

    $searchkey_utfencoded = urlencode($searchkey_utf);

    $amazon_books = "http://www.amazon.co.jp/exec/obidos/external-search/?mode=books-jp&keyword=$searchkey_utfencoded&tag=$amazon_id";

    $amazon_music = "http://www.amazon.co.jp/exec/obidos/external-search/?mode=music-jp&keyword=$searchkey_utfencoded&tag=$amazon_id";

    $amazon_video = "http://www.amazon.co.jp/exec/obidos/external-search/?mode=vhs-jp&keyword=$searchkey_utfencoded&tag=$amazon_id";
} else {
    $amazon_id = 'wanisys-20';

    $searchkey_euc = $searchstring;

    $searchkey_eucencoded = urlencode($searchkey_euc);

    $amazon_books = "http://www.amazon.com/exec/obidos/external-search/?mode=books&keyword=$searchkey_eucencoded&tag=$amazon_id";

    $amazon_music = "http://www.amazon.com/exec/obidos/external-search/?mode=music&keyword=$searchkey_eucencoded&tag=$amazon_id";

    $amazon_video = "http://www.amazon.com/exec/obidos/external-search/?mode=vhs&keyword=$searchkey_eucencoded&tag=$amazon_id";
}
?>
<center>
<table border="0" width="600" bgcolor="#000080">
<tr>
<td width="100%" bgcolor="#0000FF">
<p align="center"><font color="#FFFFFF"><b>In Association with Amazon </b></font></td>
</tr>
<tr>
<td width="100%">
<table border="0" width="100%" bgcolor="#FFFFFF">
<tr>
<td width="33%" valign="top">
<div align="center"><b>Books</b><br>
Books on <a target="_blank" href="<?=$amazon_books?>"><?=$searchstring?></a></div>
</td>
<td width="33%" valign="top">
<div align="center"><b>Music</b><br>
Music on <a target="_blank" href="<?=$amazon_music?>"><?=$searchstring?></a></div>
</td>
<td width="34%" valign="top">
<div align="center"><b>Videos</b><br>
Videos on <a target="_blank" href="<?=$amazon_video?>"><?=$searchstring?></a></div> </td>
</tr>
</table>
</td>
</tr>
</table>
</center>
<br>
