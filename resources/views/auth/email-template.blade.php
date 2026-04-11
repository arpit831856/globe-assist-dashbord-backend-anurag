<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #ffffff;
            padding: 30px;
            text-align: center;
            border-bottom: 1px solid #eeeeee;
        }
        .content {
            padding: 40px 30px;
            text-align: center;
            color: #333333;
        }
        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #999999;
        }
        .button {
            display: inline-block;
            padding: 14px 30px;
            background-color: #3a91cf;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 25px;
        }
        .logo {
            width: 150px;
            height: auto;
        }
        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/globe assist logo.png') }}" alt="Globe Assist" class="logo">
        </div>

        <div class="content">
            <h2 style="color: #333;">Password Reset Request</h2>
            <p>Hello,</p>
            <p>You are receiving this email because we received a password reset request for your account at <strong>Globe Assist</strong>.</p>
            
            <a href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}" class="button">Reset Password</a>

            <p style="margin-top: 30px; font-size: 14px; color: #666;">
                If you did not request a password reset, no further action is required.
            </p>
            <p style="font-size: 13px; color: #999;">
                This password reset link will expire in 60 minutes.
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Globe Assist. All rights reserved.</p>
            <p>If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:<br>
            <span style="word-break: break-all; color: #3a91cf;">{{ route('password.reset', ['token' => $token, 'email' => $email]) }}</span></p>
        </div>
    </div>
</body>
</html>
