<?php
$apiURL = 'https://eu94.chat-api.com/instance83869/';
$token = '9tr5ve0awz8rjvio';

$message = $_GET['text'];
$phone = '62895348096044';

$data = json_encode(
    array(
        'chatId'=>$phone.'@c.us',
        'body'=>$message
    )
);
$url = $apiURL.'message?token='.$token;
$options = stream_context_create(
    array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $data
        )
    )
);
$response = file_get_contents($url,false,$options);
echo $response; exit;

?>