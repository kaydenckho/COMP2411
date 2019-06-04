<?php
defined('UNLOCK_IMPORT') || define('UNLOCK_IMPORT',TRUE);  
require_once __DIR__.'/../../include/tokenRequiredResponse.php';
ReturnSuccessful(array("message"=>"Token is valid"));
?>