<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your License Key</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f9fc;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .license-key, .wsus__invoice_single {
            font-size: 16px;
            background: #f1f1f1;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: left;
            color: #264653;
        }
        .footer {
            font-size: 13px;
            color: #aaa;
            margin-top: 30px;
            text-align: center;
        }
        .ppbox {
            margin-top: 40px;
        }
        .ppbox img {
            width: 150px;
        }
        .store-card {
            margin-bottom: 10px;
        }
        h2, h5, h6 {
            color: #2a9d8f;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Hello {{ $name }},</h2>
    <p>Thank you for your purchase! Your license key for <strong>{{ $product_name }}</strong> is:</p>
    <div class="license-key">{{ $licence_key }}</div>
    <p>Please keep this key safe. If you have any issues, feel free to contact us.</p>

    <div class="wsus__invoice_single">
        <h5>Billing Information</h5>
        <p><strong>Paid:</strong> ₹{{ number_format($order->amount, 2) }}</p>
        <!--<p><strong>Points Used:</strong> {{ $order->paidpoints }} MPoints</p>-->
        <p><strong>GST (18%):</strong> ₹{{ number_format($order->amount - ($order->amount / 1.18), 2) }}</p>
        <p><strong>Amount Without GST:</strong> ₹{{ number_format($order->amount / 1.18, 2) }}</p>
    </div>

    <div class="wsus__invoice_single">
        <h5>Shipping Information</h5>
        <p><strong>{{ $address->name }}</strong></p>
        <p>{{ $address->email }}</p>
        <p>{{ $address->phone }}</p>
        <p>{{ $address->address }}, {{ $address->city }}, {{ $address->state }}, {{ $address->zip }}</p>
        <p>{{ $address->country }}</p>
    </div>

    <div class="wsus__invoice_single">
        <h5>Order Summary</h5>
        <p><strong>Order ID:</strong> #{{ $order->invocie_id }}</p>
        <p><strong>Order Status:</strong> {{ config('order_status.order_status_admin')[$order->order_status]['status'] ?? 'Pending' }}</p>
     <p><strong>Payment Method:</strong> 
   {{ $order->payment_method == 'inr' ? 'INR' : strtoupper($order->payment_method ?? 'N/A') }}
</p>

<p><strong>Payment Status:</strong> 
   {{ $order->payment_status == 1 ? 'Complete' : 'Pending' }}
</p>
<p><strong>Transaction ID:</strong> {{ $order->transaction->transaction_id ?? 'N/A' }}</p>
    </div>

   <div style="margin-top: 40px; padding: 30px; background-color: #f1f1f1; border-radius: 10px;">
    <h2 style="text-align: center; color: #2a9d8f; margin-bottom: 30px;">Download Our Apps</h2>
    <table width="100%" cellspacing="0" cellpadding="0" style="text-align: center;">
        <tr>
            <!-- Android Section -->
            <td style="vertical-align: top; padding: 10px; width: 50%;">
                <h4 style="color: #264653;">Android (Play Store)</h4>
                <p style="margin: 5px 0;">Bitdefender Mobile Security</p>
                <a href="https://play.google.com/store/apps/details?id=com.bitdefender.security" target="_blank">
                    <img src="https://trueshopcart.checkyourweb.site/qrcode/Google_Play_Store_badge_EN.png" alt="Google Play" style="width: 80px; margin-bottom: 10px;">
                </a>
                <p style="margin: 5px 0;">Bitdefender Central</p>
                <a href="https://play.google.com/store/apps/details?id=com.bitdefender.centralmgmt" target="_blank">
                    <img src="https://trueshopcart.checkyourweb.site/qrcode/Google_Play_Store_badge_EN.png" alt="Google Play" style="width: 80px;">
                </a>
            </td>

            <!-- iOS Section -->
            <td style="vertical-align: top; padding: 10px; width: 50%;">
                <h4 style="color: #264653;">iOS (App Store)</h4>
                <p style="margin: 5px 0;">Bitdefender Mobile Security</p>
                <a href="https://apps.apple.com/in/app/bitdefender-mobile-security/id1255893012" target="_blank">
                    <img src="https://trueshopcart.checkyourweb.site/qrcode/App_Store_(iOS).png" alt="App Store" style="width: 50px; margin-bottom: 10px;">
                </a>
                <p style="margin: 5px 0;">Bitdefender Central</p>
                <a href="https://apps.apple.com/in/app/bitdefender-central/id969933082" target="_blank">
                    <img src="https://trueshopcart.checkyourweb.site/qrcode/App_Store_(iOS).png" alt="App Store" style="width: 50px;">
                </a>
            </td>
        </tr>
    </table>
</div>


    <div class="footer">
        &copy; {{ date('Y') }} Your Company. All rights reserved.
    </div>
</div>
</body>
</html>
