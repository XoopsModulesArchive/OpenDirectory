<?php

function array_convert_encoding1($str, $to = _CHARSET, $from = 'UTF-8')
{
    if (function_exists('mb_convert_encoding')) {
        if (is_array($str)) {
            foreach ($str as $key => $val) {
                $str[$key] = array_convert_encoding1($val, $to, $from);
            }

            return $str;
        }

        return mb_convert_encoding($str, $to, $from);
    }

    return $str;
}
?>
<?php
/*
* Version 1.4 - Copyright Bj?n B?resen (c) BIE.no 2002
* Please do not modify outside config section (unless you know what you're doing)
* and do not remove the phpODP button (even if you do know what you're doing)
*
*/
global $myrooturl,$searchstring,$filename;
$filename = $PHP_SELF;
/*
* CONFIG SECTION ----> EDIT THIS + edit the files in /includes/ to change its look!
* If you have questions visit http://www.bie.no/forum and post them in the phpODP support forum!
*
*/
// English users set this to "en" to show amazon.com link
// deutsch users set it to "de" to show amazon.de link
// If you do not want to show the amazon table just leave them blank ("")
$show_search_sponsor = 'en';
$show_browse_sponsor = 'en';
// ODP root URL .. some people say they needed to change this to http://www.dmoz.org/
$rooturl = 'http://dmoz.org';
// If you want so use a certain category at the root ..
// eg. $rootcategory = "/World/Deutsch/"; to show deutsch pages
$rootcategory = '';
/*
* STOP --- > EDITING BELOW SHOULD NOT BE NECESSARY (but could be if externals are changed)
*/
$sponsor_file_search = 'search_sponsor_header.php'; // default
if ('de' == $show_search_sponsor) {
    $sponsor_file_search = 'search_sponsor_header_de.php';
}
$sponsor_file_browse = 'search_sponsor_header.php'; // default
if ('de' == $show_browse_sponsor) {
    $sponsor_file_browse = 'search_sponsor_header_de.php';
}
// replacement variables
$replace = $filename . '?browse=';
$linkstr = '<a href="';
$odp_image_path = '/img/';
$your_image_path = '';
$search_next = '<a href="search';
$search_next_replace = '<a href="' . $filename;
$searchurl = 'http://search.dmoz.org/cgi-bin/search?search=';
$startstr = '<table cellspacing'; // start str to search for on the main page
$endstr = '</td></tr></table>'; // end str to search for on the main page
$startbrws = '<HR>'; // start str to search for when browsing
$endbrws = '<table width="95%" cellpadding=0'; // end str to search for when browsing
$startsrch = '<CENTER>Search:'; // start str to search for when searching
$endsrch = '<TABLE cellpadding=0'; // end str to search for when searching
$noresult = 'No sites matching your query were'; // feedback from dmoz.org when no sites are found
$browse = $_GET['browse'];
$ver = $_GET['ver'];
$start = $_GET['start'];
$utf8 = $_GET['utf8'];
$searchstring = $_POST['search'];
if ('' == $searchstring) {
    $searchstring = $_GET['search'];
}
if (!empty($start) || !empty($utf8)) {
    $searchstring = array_convert_encoding1(urldecode($searchstring), _CHARSET, 'utf-8');
}
$searchstring = str_replace(' ', '%20', $searchstring);
$morecat = $_GET['morecat'];
if ('' == $browse && '' == $searchstring) { // show main page
    include 'includes/main_header.php';

    if ('' == $rootcategory) {
        if ('' != $ver) {
            echo "<a href='http://www.bie.no/products/phpodp'>phpODP 1.4</a>";
        }

        $fp = fopen($rooturl, 'rb');

        $htmlold = implode('', file($rooturl));

        $html = array_convert_encoding1($htmlold, _CHARSET, 'utf-8');

        fclose($fp);

        $startpos = mb_strpos($html, $startstr);

        $html = mb_substr($html, $startpos, mb_strlen($html));

        $endpos = mb_strpos($html, $endstr);

        $html = mb_substr($html, 0, $endpos);

        $html = str_replace($linkstr, $linkstr . $replace, $html);

        $html = str_replace('<img src="' . $odp_image_path, '<img src="' . $your_image_path, $html);

        echo $html;
    } else {
        $fp = fopen($rooturl . $rootcategory, 'rb');

        $htmlold = implode('', file($rooturl . $rootcategory));

        $html = array_convert_encoding1($htmlold, _CHARSET, 'utf-8');

        fclose($fp);

        $startpos = mb_strpos($html, '[ <a');

        if (false !== $startpos) {
            $abc = true;
        }

        if (false === $abc) {
            $startpos = mb_strpos($html, $startbrws);
        }

        $html = mb_substr($html, $startpos, mb_strlen($html));

        if (true === $abc) {
            $html = '<br><center>' . $html;
        }

        $endpos = mb_strpos($html, $endbrws);

        $html = mb_substr($html, 0, $endpos);

        $html = str_replace($linkstr . '/', $linkstr . $replace . '/', $html);

        $html = str_replace('<img src="' . $odp_image_path, '<img src="' . $your_image_path, $html);

        echo $html;
    }

    include 'includes/main_footer.php';
} else {
    if ('' != $browse) { // the user is browsing the categories
        include 'includes/browse_header.php';

        if ('' != $show_browse_sponsor) {
            include 'includes/' . $sponsor_file_browse;
        }

        $fp = fopen($rooturl . $browse, 'rb');

        $htmlold = implode('', file($rooturl . $browse));

        $html = array_convert_encoding1($htmlold, _CHARSET, 'utf-8');

        fclose($fp);

        $startpos = mb_strpos($html, '[ <a');

        if (false !== $startpos) {
            $abc = true;
        }

        if (false === $abc) {
            $startpos = mb_strpos($html, $startbrws);
        }

        $html = mb_substr($html, $startpos, mb_strlen($html));

        if (true === $abc) {
            $html = '<br><center>' . $html;
        }

        $endpos = mb_strpos($html, $endbrws);

        $html = mb_substr($html, 0, $endpos);

        $html = str_replace($linkstr . '/', $linkstr . $replace . '/', $html);

        $html = str_replace('<img src="' . $odp_image_path, '<img src="' . $your_image_path, $html);

        echo $html;

        include 'includes/browse_footer.php';
    } else {
        if ('' != $searchstring) { // the user is searching
            include 'includes/search_header.php';

            if ('' != $show_search_sponsor) {
                include 'includes/' . $sponsor_file_search;
            }

            $searchurl .= $searchstring . ('' == $start ? '' : '&start=' . $start) . ('' == $morecat ? '' : '&morecat=' . $morecat);

            $fp = fopen(array_convert_encoding1($searchurl, 'UTF-8', _CHARSET), 'rb');

            $htmlold = implode('', file(array_convert_encoding1($searchurl, 'UTF-8', _CHARSET)));

            $html = array_convert_encoding1($htmlold, _CHARSET, 'utf-8');

            fclose($fp);

            if (false !== mb_strpos($html, $noresult)) { // no results found
                include 'includes/search_no_result.php';
            } else {
                $startpos = mb_strpos($html, $startsrch);

                $html = mb_substr($html, $startpos, mb_strlen($html));

                $endpos = mb_strpos($html, $endsrch);

                $html = mb_substr($html, 0, $endpos);

                $html = str_replace($linkstr . '/', $linkstr . $replace . '/', $html);

                $html = str_replace('http://dmoz.org', "$filename?browse=", $html);

                $html = str_replace($search_next, $search_next_replace, $html);

                $html = str_replace($filename . '?browse=search?', $filename . '?', $html);

                $html = str_replace('<img src="' . $odp_image_path, '<img src="' . $your_image_path, $html);

                echo $html;
            }

            include 'includes/search_footer.php';
        }
    }
}
echo '<!--bieodp-->';
?>
