<?php

session_start();

function get_data($type = 'get', $service = '', $fields = array()) {
    $url = 'https://mochipos.co.nz/onlinestore-ruangthong-ws-1.0/' . $service;

    $headers = array(
        'Content-Type: application/json'
    );
// Open connection
    $ch = curl_init();

// Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);

    if ($type == 'post') {
        curl_setopt($ch, CURLOPT_POST, true);
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    if ($type == 'post') {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    }
// Execute post
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }

// Close connection
    curl_close($ch);
    $res = json_decode($result);
    if ($res) {
        return $res->object;
    }
    return array();
}
//$name = $res->object[0]->name;
function set_session_value($val1='', $val2='', $fields = array()){
	$_COOKIE["$val1"]=$val2;
	
	
}
function get_session_value($val=''){
	return $_COOKIE["$val"];
	
	
}
?>
