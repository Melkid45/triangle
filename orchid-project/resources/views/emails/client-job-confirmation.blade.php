<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Application Received</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 0 20px; }
        .header { background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%); padding: 40px 0; text-align: center; }
        .header h1 { color: white; margin: 0; font-size: 28px; }
        .content { padding: 40px 20px; background: #fff; }
        .greeting { font-size: 22px; color: #2c3e50; margin-bottom: 20px; }
        .message { font-size: 16px; color: #555; margin-bottom: 25px; line-height: 1.8; }
        .highlight-box { background: #e8f4fd; padding: 25px; border-radius: 10px; border-left: 5px solid #3498db; margin: 25px 0; }
        .application-details { background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 25px 0; }
        .detail-item { margin: 10px 0; }
        .detail-label { font-weight: bold; color: #2c3e50; }
        .timeline { margin: 30px 0; }
        .timeline-item { display: flex; align-items: flex-start; margin: 20px 0; }
        .timeline-icon { background: #3498db; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px; flex-shrink: 0; }
        .timeline-content { flex: 1; }
        .footer { background: #2c3e50; color: white; padding: 30px; text-align: center; margin-top: 40px; }
        .contact-info { margin: 20px 0; font-size: 14px; opacity: 0.9; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Application Successfully Submitted</h1>
    </div>
    
    <div class="container">
        <div class="content">
            <div class="greeting">
                Dear {{ $name }},
            </div>
            
            <div class="message">
                Thank you for applying for the <strong>{{ $job_title }}</strong> position at {{ config('app.name', 'Our Company') }}. We have successfully received your application and it is now under review.
            </div>
            
            <div class="application-details">
                <h3 style="color: #2c3e50; margin-top: 0;">Application Summary:</h3>
                <div class="detail-item">
                    <span class="detail-label">Position:</span> {{ $job_title }}
                </div>
                <div class="detail-item">
                    <span class="detail-label">Applied on:</span> {{ $applied_at->format('F j, Y') }}
                </div>
                <div class="detail-item">
                    <span class="detail-label">Application ID:</span> {{ substr(md5($email . $applied_at), 0, 8) }}
                </div>
            </div>
            
            <div class="highlight-box">
                <p style="margin: 0; font-size: 18px; color: #2c3e50;">
                    <strong>What happens next?</strong>
                </p>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon">1</div>
                        <div class="timeline-content">
                            <strong>Initial Review</strong><br>
                            Our HR team will review your application within 3-5 business days
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">2</div>
                        <div class="timeline-content">
                            <strong>Shortlisting</strong><br>
                            If your profile matches our requirements, we'll contact you for the next steps
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">3</div>
                        <div class="timeline-content">
                            <strong>Interview Process</strong><br>
                            Successful candidates will be invited for interviews
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="message">
                <strong>Please note:</strong> Due to the high volume of applications we receive, we're only able to contact candidates who have been shortlisted for the next stage. If you don't hear from us within 2 weeks, please understand that we've proceeded with other candidates at this time.
            </div>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/careers') }}" style="display: inline-block; background: #3498db; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                    View Other Open Positions
                </a>
            </div>
        </div>
        
        <div class="footer">
            <div style="font-size: 18px; font-weight: bold; margin-bottom: 15px;">
                {{ config('app.name', 'Our Company') }}
            </div>
            
            <div class="contact-info">
                <p>For any questions regarding your application, please contact:</p>
                <p>📧 {{ config('mail.from.address') }}<br>
                📞 +1 (555) 123-4567</p>
            </div>
            
            <div style="font-size: 12px; opacity: 0.7; margin-top: 20px;">
                This is an automated confirmation email. Please do not reply to this message.<br>
                © {{ date('Y') }} {{ config('app.name', 'Our Company') }}. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>