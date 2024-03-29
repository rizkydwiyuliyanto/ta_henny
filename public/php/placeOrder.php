<?php

/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
                              
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
//SAMPLE REQUEST START HERE

require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';
// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-MVGxqtmrd0Px9HGcVimOIxE0';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $_POST["jumlah"],
    ),
    'item_details' => array(
        array(
            "id" => rand(),
            "name" => $_POST["jenis_donasi"],
            "price" => $_POST["jumlah"],
            "quantity" => 1,
        )
    ),
    'customer_details' => array(
        'first_name' => $_POST["nama_pengirim"],
        'phone' => $_POST["no_telp"],
        // 'last_name' => 'pratama',
        // 'email' => 'budi.pra@example.com',
    ),
    "enabled_payments" => [
        "credit_card", "cimb_clicks",
        "bca_klikbca", "bca_klikpay", "bri_epay", "echannel", "permata_va",
        "bca_va", "bni_va", "bri_va", "cimb_va", "other_va", "gopay", "indomaret",
        "danamon_online", "akulaku", "shopeepay", "kredivo", "uob_ezpay"
    ],
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
echo $snapToken;
