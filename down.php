<?php
ignore_user_abort(true);
require_once("include/connection.php");

$path = "download/"; // change the path to fit your websites document structure
$linkdown = $_GET['file'];

$linkdata = mysql_query("SELECT * FROM files WHERE downloadlink = '$linkdown'");
$meta = mysql_fetch_assoc($linkdata);

$file_name = $meta['source'];
$osc = $meta['filename'];
$hit = $meta['hit'];
$hit++;
$addhit = mysql_query('UPDATE files SET hit="'.$hit.'" WHERE downloadlink="'.$linkdown.'"');
$fullPath = $path.$file_name;

if ($fd = fopen ($fullPath, "rb")) {

    $fsize = filesize($fullPath);

    $path_parts = pathinfo($fullPath);

    $ext = strtolower($path_parts["extension"]);

    switch ($ext) {

        case "pdf":

        header("Content-type: application/pdf");

        header("Content-Disposition: attachment; filename=\"".$osc."\""); // use 'attachment' to force a file download

        break;

        // add more headers for other content types here

        default;

        header("Content-type: '.mime_content_type($link_file).'");

        header("Content-Disposition: filename=\"".$osc."\"");

        break;

    }

    header("Content-length: $fsize");

    header("Cache-control: private"); //use this to open files directly

    while(!feof($fd)) {

        $buffer = fread($fd, 8192);

        echo $buffer;

    }

}

fclose ($fd);

exit;
?>