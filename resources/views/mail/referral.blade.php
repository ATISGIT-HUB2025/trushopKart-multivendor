<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>You Have a Referral</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }
        .container {
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }
        .btn {
            display: inline-block;
            background: #023364;
            color: #ffffff !important;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Hello,</h2>
    <p>You've been invited to join us through a referral!</p>
    <p>Click the button below to get started:</p>

    <a href="{{ $referral_link }}" class="btn">Join Now</a>

    <p>If the button above doesn't work, copy and paste the link below into your browser:</p>
    <p><a href="{{ $referral_link }}">{{ $referral_link }}</a></p>

    <div class="footer">
        &copy; {{ date('Y') }} Your Company. All rights reserved.
    </div>
</div>
</body>
</html>
