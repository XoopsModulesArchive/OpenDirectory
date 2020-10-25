<?php

// this is the header include for the main page, you can put whatever you want here.
// Typically a logo and a search box
?>
<center>
<table align="center" border="0" width="600">
<tr>
<td align="center" width="600">
<img src="opendirectorybiglogo.gif">
</td>
</tr>
</table>
</center>
<center>
<form method=POST action="index.php">
Search: <input type="textfield" name="search">
<input type="submit" name="submit" value="Search">
<!-- <small><select name=all><option selected value=yes>the entire directory
<option value=no>only in Java/Applets
</select>
</small>
-->
</form>
</center>
<font size="+1">
<?php
$cat = $browse;
$browse_decoded = urldecode($browse);
$browse_euc = array_convert_encoding1($browse_decoded, _CHARSET, 'utf-8');
echo "<a href='" . $filename . "'>Top</a>: ";
$array = explode('/', $browse_euc);
foreach ($array as $stritem) {
    if ('' != $stritem) {
        $add .= '/' . $stritem;

        echo "<a href='" . $replace . urlencode(array_convert_encoding1($add, 'utf-8', _CHARSET)) . "'>" . $stritem . '</a>: ';

        $searchstring = $stritem; // needed for browse_sponsor include php
    }
}
?>
</font>
