<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank You for Contacting Us</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 0 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px 0; text-align: center; }
        .header h1 { color: white; margin: 0; font-size: 32px; }
        .content { padding: 40px 20px; background: #fff; }
        .greeting { font-size: 24px; color: #2c3e50; margin-bottom: 25px; }
        .message { font-size: 16px; color: #555; margin-bottom: 30px; line-height: 1.8; }
        .highlight { background: #f8f9fa; padding: 25px; border-radius: 10px; border-left: 5px solid #3498db; margin: 25px 0; }
        .cta-button { display: inline-block; background: #3498db; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; margin: 20px 0; }
        .footer { background: #f8f9fa; padding: 30px; text-align: center; border-top: 1px solid #eee; margin-top: 40px; }
        .company-name { font-size: 18px; font-weight: bold; color: #2c3e50; margin-bottom: 10px; }
        .contact-info { color: #7f8c8d; font-size: 14px; margin-top: 20px; }
        .social-links { margin: 20px 0; }
        .social-links a { margin: 0 10px; color: #3498db; text-decoration: none; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Thank You, {{ $name }}!</h1>
    </div>
    
    <div class="container">
        <div class="content">
            <div class="greeting">
                Dear {{ $name }},
            </div>
            
            <div class="message">
                Thank you for reaching out to us through our contact form. We have successfully received your message and our team will review it shortly.
            </div>
            
            <div class="highlight">
                <p style="margin: 0; color: #2c3e50;">
                    We strive to respond to all inquiries within <strong>24-48 hours</strong> during business days.
                </p>
            </div>
            
            <div class="message">
                In the meantime, you might find answers to common questions in our <a href="#" style="color: #3498db;">FAQ section</a> or browse our <a href="#" style="color: #3498db;">knowledge base</a>.
            </div>
            
            <div style="text-align: center;">
                <a href="{{ url('/') }}" class="cta-button">Visit Our Website</a>
            </div>
        </div>
        
        <div class="footer">
            <div class="company-name">{{ $companyName }}</div>
            <div class="contact-info">
                <p>If you have any urgent inquiries, please feel free to contact us directly.</p>
                <p>Email: {{ config('mail.from.address') }}<br>
                Phone: +1 (555) 123-4567</p>
            </div>
            
            <div class="social-links">
                <a href="#">Facebook</a> • 
                <a href="#">Twitter</a> • 
                <a href="#">LinkedIn</a> • 
                <a href="#">Instagram</a>
            </div>
            
            <div style="color: #95a5a6; font-size: 12px; margin-top: 20px;">
                This is an automated message. Please do not reply to this email.<br>
                © {{ $currentYear }} {{ $companyName }}. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>