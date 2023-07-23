<?php

//Get unique Project Purchase code
function purchCode($conn) {
    $code_init = "123456789ABCDEFGHIJKLMNPQRSTUVWXYZ";
    $code_init2 = substr(str_shuffle($code_init), 0, 8);
    $request_code = substr($code_init2, 0, 4) . "-" . substr($code_init2, 4, 7);
    $check_code = mysqli_num_rows(mysqli_query($conn, "select code from otp where code='$request_code'"));
    if ($check_code > 0) {
        purchCode($conn);
    } else {
        return $request_code;
    }
}

function sendsms_post($params1) {
        $url = 'https://api.bulksmslive.com/v2/app/sms';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($params1)));
        $result = curl_exec($ch);
        $res_array = json_decode($result);

        return $res_array;
    }

function sendSMS($mobiles, $message) {
        try {
            $recipients = $mobiles;
           $data = array("email" => "XXXXXXX@gmail.com",
            "password" => "XXXXXXXX",
            "message" => $message,
            "sender_name" => "New Message",
            "recipients" => $recipients,
                "forcednd" => "1");
            $data_string = json_encode($data);
            return sendsms_post($data_string);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return 0;
    }



function sendsms_posts($url, array $params) {
    $params = http_build_query($params);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $output = curl_exec($ch);

    curl_close($ch);
    return $output;
}

function validate_sendsms($response) {
    $validate = explode('||', $response);
    if ($validate[0] == '1000') {
        //return TRUE;
        //return custom response here instead.
        return 1;
    } else {
        return FALSE;
        //return custom response here instead.
    }
}
?>