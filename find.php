<?php
/**
 * This demo is based on the tutorial "Use jQuery and PHP to build an Ajax-driven Web page"
 * http://www.ibm.com/developerworks/opensource/library/os-php-jquery-ajax/index.html
 */

// create connection to MySQL database
$connect = mysql_connect("localhost", "root", "pazzword")
        or die("Couldn't connect to web server.");
// select demo_aphonebook DB
mysql_select_db("demo_aphonebook");

// get the search term
$search_term = $_POST['search_term'];
// clean up the search term
$search_term = strip_tags(substr($search_term, 0, 100));
$search_term = mysql_escape_string($search_term);

$search_query = "SELECT name, phone FROM directory
WHERE name LIKE '%$search_term%' OR phone LIKE '%$search_term%'
ORDER BY name ASC";

$query_result = mysql_query($search_query);

$string = '';

if (mysql_num_rows($query_result) > 0) {
    while ($record = mysql_fetch_object($query_result)) {
        $string .= "<b>" . $record->name . "</b> - ";
        $string .= $record->phone . "</a>";
        $string .= "<br/>\n";
    }
} else {
    $string = "No matches!";
}

echo $string;
?>