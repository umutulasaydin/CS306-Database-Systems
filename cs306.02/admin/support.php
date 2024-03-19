<?php


$URL = "https://cs306-86ad8-default-rtdb.europe-west1.firebasedatabase.app/Chats.json";


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


$msg_res_json = get_messages();

$array = array();
if ($msg_res_json != null){
    $keys = array_keys($msg_res_json);

    for ($i = 0; $i < count($keys); $i++){
        $chat_msg = $msg_res_json[$keys[$i]];
        $name = $chat_msg['name'];
        $chat_topic = $chat_msg['topic'];
        $value = $name;
        $value .= "/";
        $value .= $chat_topic;
        $value = str_replace(" ", "_" ,$value);
        if (!in_array($value, $array) and $name != "Admin"){
            
            $array[] = $value;
        }
    }


}

?>


<form action="chat.php" method="GET">
    <select name="chat">

<?php

    for ($i = 0; $i < count($array); $i++){
        echo "<option value=" .  $array[$i] . ">" .  $array[$i] . "</option>";
    }

?>

</select>
<button>OPEN CHAT</button>
</form>



