<?php

$value = $_GET['chat'];
$value = explode("/", $value);
$guest_name = $value[0];
$guest_name = str_replace("_", " ", $guest_name);
$chat_topic = $value[1];
$chat_topic = str_replace("_", " ", $chat_topic);


echo '<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>

<div class="menu">
<div class="back"><i class="fa fa-chevron-left"></i> <img src="https://i.imgur.com/DY6gND0.png" draggable="false"/></div>
<div class="name">' . $guest_name . ' - ' . $chat_topic . '</div>
<div class="last">18:09</div>
</div>
<ol class="chat">';

$URL = "https://cs306-86ad8-default-rtdb.europe-west1.firebasedatabase.app/Chats.json";

header("refresh: 60");

function get_messages() { 
    global $URL;
    $ch = curl_init();
    curl_setopt_array($ch, [ CURLOPT_URL => $URL,
                            CURLOPT_POST => FALSE, // It will be a get request 
                            CURLOPT_RETURNTRANSFER => true, ]);
    $response = curl_exec($ch); 
    curl_close($ch);
    return json_decode($response, true); 
}

function send_msg($msg, $name, $topic, $receiver) { 
    global $URL;
    $ch = curl_init();
    $msg_json = new stdClass();
    $msg_json->msg = $msg;
    $msg_json->name = $name;
    $msg_json->receiver = $receiver;
    $msg_json->time = date('H:i');
    $msg_json->topic = $topic;
    $encoded_json_obj = json_encode($msg_json); 
    curl_setopt_array($ch, array(CURLOPT_URL => $URL,
                                CURLOPT_POST => TRUE,
                                CURLOPT_RETURNTRANSFER => TRUE,
                                CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                CURLOPT_POSTFIELDS => $encoded_json_obj ));
    $response = curl_exec($ch); 
    return $response;
}

$msg_res_json = get_messages();

if (isset($_POST['usermsg'])) {
    $user_msg = $_POST['usermsg'];
    send_msg($user_msg, "Admin", $chat_topic, $guest_name);
}

?>



<?php
$keys = array_keys($msg_res_json);
for ($i = 0; $i < count($keys); $i++){
    $chat_msg = $msg_res_json[$keys[$i]];
    $name = $chat_msg['name'];
    $msg = $chat_msg['msg'];
    $time = $chat_msg['time'];
    $chat_receiver = $chat_msg['receiver'];
    $topic = $chat_msg['topic'];
    if ( (($name == $guest_name) or ($chat_receiver == $guest_name)) and $topic == $chat_topic){
        if ($name == 'Admin') {
            $from = 'self';
        } else {
            $from = 'other';
        }
       echo  '
       <li class="'.$from.'">
       <div class="avatar">
                <img src="https://i.imgur.com/DY6gND0.png" draggable="false"/>
            </div>
                <div class="msg">
                    <p><b>'.$name.'</b></p>
                    <p>'.$msg.'</p>
                    <time>'.$time.'</time>
                </div>
            </li>';
    }
    
    
}

$url = $_SERVER['REQUEST_URI']; 
echo "</ol>
    <form name='form' action = ". $url ." method='POST'>
    <input name='usermsg' class='textarea' type='text' placeholder='Type here!'/>
    <input type='submit' style='display: none' />
    </form>;";

?>
