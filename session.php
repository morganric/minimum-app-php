<?php

    // configure the JSON to use in the session.
    $json = '
        {
            "webAppId": "webapp-id-example",
            "allowedOrigins": ["*"],
            "urlSchemeDetails": {
                "host": "192.168.30.249",
                "port": "8443",
                "secure": true
            },
            "voice":
            {
                "username": "anon",
                "displayName": "anon",
                "domain": "webgateway.example.com",
                "inboundCallingEnabled": true
            }
        }
    ';

    // configure the curl options
    $ch = curl_init("https://192.168.30.249:8443/gateway/sessions/session");
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
    curl_setopt($ch, CURLOPT_HTTPHEADER, [         
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json)
    ]);

    // execute HTTP POST & close the connection
    $response = curl_exec($ch);
    curl_close($ch);

    // decode the JSON and pick out the session token
    $decodedJson = json_decode($response);
    $id = $decodedJson->{'sessionid'};

    // echo the ID we've retrieved
    echo $id;

?>
