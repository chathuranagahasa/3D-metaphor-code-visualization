<?php

//decode & get POST parameters
$payment = base64_decode($_POST ["payment"]);
$signature = base64_decode($_POST ["signature"]);
$custom_fields = base64_decode($_POST ["custom_fields"]);
//load public key for signature matching
$publickey = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC8b4xixoNYuG1JekBkfzJdCahh
YSedB0/AUucXNGGzpkuuhA26PBT7hJKsDd5S9d/wukcmNpYNJpcIjKdJo5IMhvxD
9LouVfTZyAh1sJb5TRUL7kX8Gb21c31+U+pntfVtOgH6sj53bWH2ejchiYbQD45N
02tKl3+HLwKDdJa50wIDAQAB
-----END PUBLIC KEY-----";
openssl_public_decrypt($signature, $value, $publickey);

$signature_status = false ;
var_dump($signature_status);
if($value == $payment){
    $signature_status = true ;
}

//get payment response in segments
//payment format: order_id|order_refference_number|date_time_transaction|payment_gateway_used|status_code|comment;
$responseVariables = explode('|', $payment);

//if($signature_status == true)
//{
    //display values
    echo $signature_status;
    $custom_fields_varible = explode('|', $custom_fields);
    var_dump($custom_fields_varible);
    echo '<br/>';
    var_dump($responseVariables);
//}else
//{
//    echo 'Error Validation';
//}

$maxPayId = $this->PropertyModel->getMaxPaymentId();
if($maxPayId == null){
    $maxPayId = 0;
}

$maxPayId = $maxPayId + 1;

$arrayPay = array(
    'payment_id' => $maxPayId,
    'amount' => $custom_fields_varible[1],
    'user_id' => $custom_fields_varible[4],
    'payment_date' => date('Y-m-d'),
    'payment_time' => date('H:i:s'),
    'ad_id' => $custom_fields_varible[0],
    'duration' => $custom_fields_varible[2],
    'year' => date('Y'),
    'status'=> "pending",
    'reference' => "REF_BANK_". $custom_fields_varible[0],
    'transactionId' => $responseVariables[1],
    'description' => "online payment",
    'is_featured' => $custom_fields_varible[3],
    'payment_method' => 'online',
);


if(isset($custom_fields_varible[6]) && ($custom_fields_varible[6] == "renew")){
    $adD = $this->PropertyModel->getPropertyDetailsByPropertyIdAdmin($custom_fields_varible[0]);
    $renew_cu = (is_array($adD) && count($adD) != 0) ? $adD[0]->renew_status : 0;

    $arrayProRenew = array(
        'renew_status' => ($renew_cu + 1),
        'renew_pay_app_status' => '1'
    );

    if($custom_fields_varible[5] == "carsale") {
        $this->PropertyModel->updateProperty($arrayProRenew, $custom_fields_varible[0]);
        if ($custom_fields_varible[3] == 1) {
            //var_dump("pay bank");
            $this->PropertyModel->updateFeatureAdDetails($custom_fields_varible[0], $custom_fields_varible[3]);
        }
        $save = $this->PropertyModel->savePaymentDetails($arrayPay);
        if ($save) {
            $this->session->set_flashdata('message_suc', 'Payment done Successfully, Ad submit for approval.');
            redirect('https://bizlink.lk/test/carsale/user/ads/' . $custom_fields_varible[4]);
        }
    }elseif($custom_fields_varible[5] == "property"){
        $this->PropertyModel->updatePropertyPro($arrayProRenew, $custom_fields_varible[0]);
        if($custom_fields_varible[3] == 1){
            //var_dump("pay bank");
            $this->PropertyModel->updateFeatureAdDetailsProperty($custom_fields_varible[0], $custom_fields_varible[3]);
        }
        $save = $this->PropertyModel->savePaymentDetailsPro($arrayPay);
        if($save){
            $this->session->set_flashdata('message_suc', 'Payment done Successfully, Ad submit for approval.');
            redirect('https://bizlink.lk/test/property/user/ads/'.$custom_fields_varible[4]);
        }
    }elseif($custom_fields_varible[5] == "miscellaneous"){
        $this->PropertyModel->updatePropertyMis($arrayProRenew, $custom_fields_varible[0]);
        if($custom_fields_varible[3] == 1){
            //var_dump("pay bank");
            $this->PropertyModel->updateFeatureAdDetailsMis($custom_fields_varible[0], $custom_fields_varible[3]);
        }
        $save = $this->PropertyModel->savePaymentDetailsMis($arrayPay);
        if($save){
            $this->session->set_flashdata('message_suc', 'Payment done Successfully, Ad submit for approval.');
            redirect('https://bizlink.lk/test/miscellaneous/user/ads/'.$custom_fields_varible[4]);
        }
    }

}else{
    if($custom_fields_varible[5] == "carsale"){
        if($custom_fields_varible[3] == 1){
            //var_dump("pay bank");
            $this->PropertyModel->updateFeatureAdDetails($custom_fields_varible[0], $custom_fields_varible[3]);
        }
        $save = $this->PropertyModel->savePaymentDetails($arrayPay);
        if($save){
            $this->session->set_flashdata('message_suc', 'Payment done Successfully, Ad submit for approval.');
            redirect('https://bizlink.lk/test/carsale/user/ads/'.$custom_fields_varible[4]);
        }
    }elseif($custom_fields_varible[5] == "property"){
        if($custom_fields_varible[3] == 1){
            //var_dump("pay bank");
            $this->PropertyModel->updateFeatureAdDetailsProperty($custom_fields_varible[0], $custom_fields_varible[3]);
        }
        $save = $this->PropertyModel->savePaymentDetailsPro($arrayPay);
        if($save){
            $this->session->set_flashdata('message_suc', 'Payment done Successfully, Ad submit for approval.');
            redirect('https://bizlink.lk/test/property/user/ads/'.$custom_fields_varible[4]);
        }
    }elseif($custom_fields_varible[5] == "miscellaneous"){
        if($custom_fields_varible[3] == 1){
            //var_dump("pay bank");
            $this->PropertyModel->updateFeatureAdDetailsMis($custom_fields_varible[0], $custom_fields_varible[3]);
        }
        $save = $this->PropertyModel->savePaymentDetailsMis($arrayPay);
        if($save){
            $this->session->set_flashdata('message_suc', 'Payment done Successfully, Ad submit for approval.');
            redirect('https://bizlink.lk/test/miscellaneous/user/ads/'.$custom_fields_varible[4]);
        }
    }

}

