<?php
$md5_hash = md5(rand(0,999));
$security_code = substr($md5_hash, 20, 10);
mkdir ('../download/'.$security_code.'');
?>