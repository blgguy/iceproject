<?php
require_once('inc/engine.class.php');
session_start();
$rd = new engine();
$sss = $rd->session();
unset($sss);
session_destroy();
$rd->rd('index.php');

?>