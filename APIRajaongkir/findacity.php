<?php

$id_province = $_GET['id_province'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_province,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: 69497ad385ed6fe8affff1e33c448326"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response);
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
}

foreach ($data->rajaongkir->results as $city) {
    echo '<option value="' . $city->city_id . '">' . $city->city_name . '</option>';
}