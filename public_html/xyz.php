<?php
session_start();

include_once 'C:\xampp\htdocs\Laundry_App\admin_panel\config\dbconnect.php';
$subtotal = 0;
$shipping = 10.00; // Fixed shipping fee
$tax_rate = 0.10;  // 10% tax rate
$unique_id  = $_SESSION['unique_id'];

// Fetch cart items from the database
$selectcart = mysqli_query($conn, "SELECT * FROM `cart` where unique_id = $unique_id");
if (mysqli_num_rows($selectcart) > 0) {
    while ($fetch_cart = mysqli_fetch_assoc($selectcart)) {
        $subtotal += $fetch_cart['price'] * $fetch_cart['quantity'];
    }
}

$tax = $subtotal * $tax_rate;
$total = $subtotal + $tax + $shipping;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="utf-8">


    <style>
        .edit-b button {
            border: none;
            padding: 5px;
            background: none;
            color: rgb(255, 132, 0);
        }

        .delete-b button {
            border: none;
            padding: 5px;
            background: none;
            color: rgb(255, 62, 62);
        }

        .steps {
            display: flex;
            width: 70%;
            margin-left: 170px;
        }

        .row-main {
            padding: 25px;
        }

        .page-title-overlap {
            height: 180px;
        }

        .step-item {

            flex-basis: 0;
            flex-grow: 1;
            transition: color .25s ease-in-out;
            text-align: center;
            text-decoration: none !important
        }

        .step-item:first-child .step-progress {
            border-radius: .125rem;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .step-item:last-child .step-progress {
            border-radius: .125rem;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .step-progress {
            position: relative;
            width: 100%;
            height: .25rem
        }

        .step-count {
            position: absolute;
            top: -0.75rem;
            left: 50%;
            width: 1.625rem;
            height: 1.625rem;
            margin-left: -0.8125rem;
            border-radius: 50%;
            font-size: .875rem;
            line-height: 1.625rem
        }

        .step-label {
            padding-top: 1.5625rem
        }

        .step-label>i {
            margin-top: -0.25rem;
            margin-right: .425rem;
            font-size: 1.2em;
            vertical-align: middle
        }

        @media(max-width: 499.98px) {
            .step-label {
                font-size: .75rem
            }

            .step-label>i {
                display: none
            }
        }

        .steps-dark .step-item {
            color: #7d879c
        }

        .steps-dark .step-count,
        .steps-dark .step-progress {
            color: #4b566b;
            background-color: #f3f5f9
        }

        .steps-dark .step-item:hover {
            color: #4b566b
        }

        .steps-dark .step-item.active.current {
            color: #373f50;
            pointer-events: none
        }

        .steps-dark .step-item.active .step-count,
        .steps-dark .step-item.active .step-progress {
            color: #fff;
            background-color: var(--cz-primary)
        }

        .steps-light .step-item {
            color: rgba(255, 255, 255, .55)
        }

        .steps-light .step-count,
        .steps-light .step-progress {
            color: #fff;
            background-color: #485268
        }

        .steps-light .step-item:hover {
            color: rgba(255, 255, 255, .8)
        }

        .steps-light .step-item.active.current {
            color: #fff;
            pointer-events: none
        }

        .steps-light .step-item.active .step-count,
        .steps-light .step-item.active .step-progress {
            color: #fff;
            background-color: #FFA33E
        }
    </style>


</head>

<body>
    <?php

    include "heder.php";
    ?>

    <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                        <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Payment</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 text-light mb-0">Checkout</h1>

            </div>

        </div>
        <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="shop-cart.html">
                <div class="step-progress"><span class="step-count">1</span></div>
                <div class="step-label"><i class="fa-solid fa-cart-shopping"></i>Cart</div>
            </a><a class="step-item active" href="checkout-details.html">
                <div class="step-progress"><span class="step-count">2</span></div>
                <div class="step-label"><i class="fa-solid fa-user"></i>Details</div>
            </a><a class="step-item active " href="shipping.php">
                <div class="step-progress"><span class="step-count">3</span></div>
                <div class="step-label"><i class="fa-solid fa-truck-fast"></i>Shipping</div>
            </a><a class="step-item active current" href="payment.php">
                <div class="step-progress"><span class="step-count">4</span></div>
                <div class="step-label"><i class="fa-solid fa-credit-card"> </i>Payment</div>
            </a><a class="step-item" href="checkout-review.html">
                <div class="step-progress"><span class="step-count">5</span></div>
                <div class="step-label"><i class="fa-solid fa-circle-check"></i>Review</div>
            </a></div>
    </div><br>




    <?php
    $apiKey = '96434309-7796-489d-8924-ab56988a6076';
    $merchantId = 'PGTESTPAYUAT86';
    $keyIndex = 1;
    $totalAmount = $total;
    // PGTESTPAYUAT
echo $totalAmount;
    $paymentData = array(
        'merchantId' => $merchantId,
        'merchantTransactionId' => "MT7850590068188104",
        "merchantUserId" => "MUID123",
        'amount' => 10 * $total, // Amount in paisa (10 INR)
        'redirectUrl' => "http://localhost/Laundry_App/payment_success",
        'redirectMode' => "POST",
        'callbackUrl' => "http://localhost/Laundry_App/payment_success",
        "merchantOrderId" => "12345",
        "mobileNumber" => "99999999999",
        "message" => "payment success",
        "email" => "abc@gmail.com",
        "shortName" => "om",
        "paymentInstrument" => array(
            "type" => "PAY_PAGE",
        )
    );          


    $jsonencode = json_encode($paymentData);
    $payloadMain = base64_encode($jsonencode);


    $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
    $sha256 = hash("sha256", $payload);
    $final_x_header = $sha256 . '###' . $keyIndex;
    $request = json_encode(array('request' => $payloadMain));

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $request,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "X-VERIFY: " . $final_x_header,
            "accept: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $res = json_decode($response);
        

         if (isset($res->success) && $res->success == '1') 
          {
              $paymentCode = $res->code;
              $paymentMsg = $res->message;
              $payUrl = $res->data->instrumentResponse->redirectInfo->url;


              echo "<a href ='".$payUrl."'>pay now</a>";

            //   header('Location:' . $payUrl);
         }
    
    }

    ?>

</body>

</html>