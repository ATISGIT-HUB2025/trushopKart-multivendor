<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Verify Your OTP</title>
</head>
<body style="background-color:#0a0a0a; color:#fff; font-family: Arial, sans-serif; padding: 24px; margin:0;">
  <div style="max-width: 400px; margin: 0 auto;">
    <img src="{{ asset('qrcode/logo.png') }}" alt="Trueshopkart Logo" width="150" height="50" style="display:block; margin-bottom:24px;" />
    
    <p style="margin-bottom:16px; font-size:16px; line-height:1.5;">
      TRUESHOPKART
    </p>

    <p style="margin-bottom:16px; font-size:16px; line-height:1.5;">
      Someone is attempting to register using your email address.
    </p>

    <p style="margin-bottom:16px; font-size:16px; line-height:1.5;">
      When: {{ \Carbon\Carbon::now('Asia/Kolkata')->format('M d, Y h:i A') }}<br />
      Device: Trueshopkart App or Browser<br />
      Location: India
    </p>

    <p style="margin-bottom:8px; font-weight:600; font-size:16px; line-height:1.5;">
      If this was you, your verification code is:
    </p>

    <p style="margin-bottom:24px; font-weight:800; font-size:24px; line-height:1.5;">
      {{ $otp }}
    </p>

    <p style="margin-bottom:4px; font-size:16px; line-height:1.5;">
      If you didn't request this: <a href="trueshopkart.com" style="color:#3b82f6; text-decoration:none;">click here to deny.</a>
    </p>

    <p style="font-size:16px; line-height:1.5;">
      Do not share this code with anyone. This OTP is valid for 10 minutes.
    </p>
  </div>
</body>
</html>
