<?php
//Set Your server key
\Midtrans\Config::$serverKey = "SB-Mid-server-O1M4fhvjRBlma7rKx9_fTMRh";

// Uncomment for production environment
// \Midtrans\Config::$isProduction = true;

\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

// Fill transaction details
$transaction_details = array(
  'order_id' => rand(),
  'gross_amount' => 145000, // no decimal allowed
);

// Mandatory for Mandiri bill payment and BCA KlikPay
// Optional for other payment methods
$item1_details = array(
    'id' => 'a1',
    'price' => 50000,
    'quantity' => 2,
    'name' => "Apple"
    );

// Optional
$item2_details = array(
    'id' => 'a2',
    'price' => 45000,
    'quantity' => 1,
    'name' => "Orange"
    );

$item_details = array ($item1_details, $item2_details);

// Optional
$billing_address = array(
    'first_name'    => "Andri",
    'last_name'     => "Litani",
    'address'       => "Mangga 20",
    'city'          => "Jakarta",
    'postal_code'   => "16602",
    'phone'         => "081122334455",
    'country_code'  => 'IDN'
    );

// Optional
$shipping_address = array(
    'first_name'    => "Obet",
    'last_name'     => "Supriadi",
    'address'       => "Manggis 90",
    'city'          => "Jakarta",
    'postal_code'   => "16601",
    'phone'         => "08113366345",
    'country_code'  => 'IDN'
    );

$customer_details = array(
    'first_name'    => "Andri", //optional
    'last_name'     => "Litani", //optional
    'email'         => "andri@litani.com", //mandatory
    'phone'         => "081122334455", //mandatory
    'billing_address'  => $billing_address, //optional
    'shipping_address' => $shipping_address //optional
    );

// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
    );

$snapToken = \Midtrans\Snap::getSnapToken($transaction);
?>
	
<html>
  <head>
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-NNwWwHN8Vn9R0TiX"></script>
  </head>
  <body>
    <button id="pay-button">Pay!</button>
    <script type="text/javascript">
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        snap.pay('<?php echo $snap_Token; ?>'); // store your snap token here
      });
    </script>
  </body>
</html>
