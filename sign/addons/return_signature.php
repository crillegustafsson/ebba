<?php
$json_sig_data = file_get_contents('assets/json_sig_data.txt');
echo stripslashes($json_sig_data);
?>