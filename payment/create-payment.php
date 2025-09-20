<?php
ini_set('display_errors',1);
if(isset($_GET['amount'], $_GET['txnId'], $_GET['mobile'], $_GET['merchantUserId'])){
    $_POST['amount'] = $_POST['amount']*100;
    $payload = base64_encode('{
        "merchantId": "M226VEE2TNZ7S",
        "merchantTransactionId": "' . $_GET['txnId'] . '",
        "merchantUserId": "'.$_GET['merchantUserId'].'",
        "amount": '.$_GET['amount'].',
        "redirectUrl": "https://www.edtechinnovate.com/",
        "redirectMode": "Redirect",
        "callbackUrl": "https://webhook.site/59ac7c8c-a7b7-42d1-9a69-e7cb294368db",
        "mobileNumber": "'.$_GET['mobile'].'",
        "paymentInstrument": {
          "type": "PAY_PAGE"
        }
      }');

      $hash = hash('sha256', $payload . "/pg/v1/pay072a33ae-16fc-4afd-a49f-357828a9d5a2") . "###1";

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.phonepe.com/apis/hermes/pg/v1/pay',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
                    "request": "' . $payload . '"
                }',
        CURLOPT_HTTPHEADER => array(
          'X-VERIFY: ' . $hash,
          'Content-Type: application/json'
        ),
      ));
      $response = curl_exec($curl);     
      curl_close($curl);
      $response = json_decode($response, true);
    //   header('Refresh: 0; url='.);
      header("Location: ".$response['data']['instrumentResponse']['redirectInfo']['url']);
}