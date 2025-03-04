<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class  Remander</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<!-- Media Queries for Mobile Responsiveness -->
<style>
    @media screen and (max-width: 600px) {
        .container {
            width: 100% !important;
        }

        .header img {
            max-width: 55% !important;
        }

        .btn {
            width: 100% !important;
            padding: 12px 0 !important;
        }

        .social-icons a {
            margin: 0 4px !important;
        }

        h1 {
            font-size: 20px !important;
        }

        p {
            font-size: 13px !important;
        }
    }
</style>

<body
    style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f7f9fc; margin-top: 0.5rem;">
    <div
        style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <!-- Header Section -->
        <div style="background-color: #3b7dff; padding: 20px; text-align: center;">
            <img src="https://smartedu.my/wp-content/uploads/2024/03/Logo-white-background-296x99.png"
                alt="SmartEdu Logo" style="max-width: 25%; height: auto;">
        </div>
        <h1 style="font-size: 22px; color: #2d3e50; font-weight: 600; text-align: center; margin-bottom: 10px;">
            Hello {{ $role == 'teacher' ? 'Teacher' : 'Student' }}
        </h1>
        <p style="font-size: 14px; color: #636e77; line-height: 1.6; text-align: center; margin-bottom: 20px;">
            This is a reminder for your upcoming class.
        </p>
        <div style="background-color: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e0e3e7;">
            <p style="font-size: 14px; color: #2d3e50; margin: 8px 0;">
                <strong>Type Of Class:</strong> {{ $scheduleTiming->classType->name }}
            </p>
            <p style="font-size: 14px; color: #2d3e50; margin: 8px 0;">
                <strong>Duration:</strong> {{ $scheduleTiming->minute }}
            </p>
            <p style="font-size: 14px; color: #2d3e50; margin: 8px 0;">
                <strong>Class Date:</strong> {{ $scheduleTiming->schedule_date }}
            </p>
            <p style="font-size: 14px; color: #2d3e50; margin: 8px 0;">
                <strong>Class Time:</strong> {{ \Carbon\Carbon::createFromFormat('H:i:s', $scheduleTiming->schedule_time)->format('h:i A') }}
            </p>
        
            @if ($scheduleTiming->meeting_link)
                <p style="font-size: 14px; color: #2d3e50; margin: 8px 0;">
                    <strong>Join Your class Link:</strong>
                </p>
                <a href="{{ $scheduleTiming->meeting_link }}">{{ $scheduleTiming->meeting_link }}</a>
            @endif
        
            @if ($role == 'teacher' && $scheduleTiming->classType->name == '1-1 Home')
                <p style="font-size: 14px; color: #2d3e50; margin: 8px 0;">
                    <strong>Student Home Address:</strong> {{ $classAddress }}
                </p>
            @endif
            @if ($scheduleTiming->classType->name == 'Physical')
    <p style="font-size: 14px; color: #2d3e50; margin: 8px 0;">
        <strong>Branch:</strong> {{ $scheduleTiming->branch->branch ?? 'Branch name not available' }}
        <br>
        <strong>Address:</strong> {{ $scheduleTiming->branch->address ?? 'Address not' }}
    </p>
@endif
        </div>
             
        <div
            style="background-color: #f7f9fc; text-align: center; padding: 10px 20px; font-size: 12px; color: #a2a6b0;">
            <p>© 2025 Smart Education, All rights reserved.</p>

            <!-- Social Media Icons Section -->
            <p style="margin: 10px 0;">
                <a href="https://www.smartedu.my" style="text-decoration: none; color: #3b7dff; margin: 0 6px;"
                    target="_blank"><img src="https://app.smartedu.my/public/img/www.png" alt="Website" width="20"
                        height="20"></a>
                <a href="https://www.facebook.com/www.smartedu.my"
                    style="text-decoration: none; color: #3b7dff; margin: 0 6px;" target="_blank"><img
                        src="https://app.smartedu.my/public/img/fb.png" alt="Facebook" width="20"
                        height="20"></a>
                <a href="https://www.instagram.com/smartedu.my/"
                    style="text-decoration: none; color: #3b7dff; margin: 0 6px;" target="_blank"><img
                        src="https://app.smartedu.my/public/img/instagram.png" alt="Instagram" width="20"
                        height="20"></a>
                <a href="https://x.com/SmartEdumy" style="text-decoration: none; color: #3b7dff; margin: 0 6px;"
                    target="_blank"><img src="https://app.smartedu.my/public/img/twitter.png" alt="Twitter"
                        width="20" height="20"></a>
                <a href="https://www.linkedin.com/in/smarteducationmy/"
                    style="text-decoration: none; color: #3b7dff; margin: 0 6px;" target="_blank"><img
                        src="https://app.smartedu.my/public/img/linkdin.png" alt="LinkedIn" width="20"
                        height="20"></a>
                <a href="https://www.pinterest.com/SmartEducationMy/"
                    style="text-decoration: none; color: #3b7dff; margin: 0 6px;" target="_blank"><img
                        src="https://app.smartedu.my/public/img/pinterest.png" alt="Pinterest" width="20"
                        height="20"></a>
                <a href="https://www.tiktok.com/@smartedu.my"
                    style="text-decoration: none; color: #3b7dff; margin: 0 6px;" target="_blank"><img
                        src="https://app.smartedu.my/public/img/tiktok.png" alt="TikTok" width="20"
                        height="20"></a>
            </p>
        </div>
    </div>
</body>

</html>

