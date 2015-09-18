<?php

$token = 'RDUH7FZIRY3TKFEHNHK2';
$json = 'https://www.eventbriteapi.com/v3/events/'.$eventID.'/?token='.$token;

$jsonfile = file_get_contents($json, TRUE);
$event = json_decode($jsonfile);

?>