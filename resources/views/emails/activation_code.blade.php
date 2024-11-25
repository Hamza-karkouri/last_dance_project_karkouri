<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activation Code</title>
</head>
<body style="font-family: 'Arial', sans-serif; background-color: #f7f7f7; margin: 0; padding: 0;">

    <div style="width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
        <!-- Header Section -->
        <div style="background-color: #6a1b9a; padding: 20px; text-align: center; border-radius: 8px 8px 0 0;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Welcome to ChiperEdu</h1>
        </div>

        <!-- Main Content Section -->
        <div style="padding: 20px; color: #333333;">
            <p style="font-size: 18px; line-height: 1.6; text-align: center;">Your request has been approved! Please activate your account using the code below.</p>
            <p style="font-size: 16px; line-height: 1.6; text-align: center; margin-top: 20px;">Your activation code is:</p>
            <p style="font-size: 20px; font-weight: bold; color: #6a1b9a; text-align: center;">{{ $activationCode }}</p>

            <p style="font-size: 16px; line-height: 1.6; text-align: center; margin-top: 20px;">Thank you for choosing ChiperEdu! We are excited to have you onboard.</p>

            <div style="text-align: center; margin-top: 30px;">
                <p style="font-size: 16px; line-height: 1.6; color: #333333;">To activate your account, please click the button below:</p>
                <a href="http://127.0.0.1:8000/notactive" style="background-color: #6a1b9a; color: #ffffff; padding: 12px 30px; text-decoration: none; border-radius: 30px; font-size: 16px; font-weight: bold; display: inline-block; margin-top: 20px; transition: background-color 0.3s;">
                    Activate Account
                </a>
            </div>
        </div>

        <!-- Footer Section -->
        <div style="background-color: #f1f1f1; padding: 15px; text-align: center; font-size: 14px; color: #777777; border-radius: 0 0 8px 8px;">
            <p style="margin: 0;">If you did not request this, please <a href="http://127.0.0.1:8000/notactive" style="color: #6a1b9a; text-decoration: none;">click here</a> to deactivate your account.</p>
        </div>
    </div>

</body>
</html>
