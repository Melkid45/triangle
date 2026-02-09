<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 700px; margin: 0 auto; padding: 20px; }
        .header { background: #f8f9fa; padding: 25px; border-radius: 8px; margin-bottom: 25px; }
        .header h2 { color: #2c3e50; margin: 0; }
        .content { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .field { margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
        .field:last-child { border-bottom: none; }
        .label { font-weight: bold; color: #2c3e50; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }
        .value { font-size: 16px; color: #555; }
        .message-box { background: #f8f9fa; padding: 20px; border-radius: 5px; border-left: 4px solid #3498db; }
        .meta-info { background: #f1f8ff; padding: 15px; border-radius: 5px; margin-top: 25px; font-size: 13px; color: #666; }
        .meta-label { font-weight: bold; color: #2c3e50; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📨 New Contact Form Submission</h2>
        </div>
        
        <div class="content">
            <div class="field">
                <div class="label">From:</div>
                <div class="value">{{ $name }}</div>
            </div>
            
            <div class="field">
                <div class="label">Email:</div>
                <div class="value">
                    <a href="mailto:{{ $email }}" style="color: #3498db; text-decoration: none;">
                        {{ $email }}
                    </a>
                </div>
            </div>
            
            <div class="field">
                <div class="label">Website:</div>
                <div class="value">
                    @if($website != 'Not provided')
                        <a href="{{ $website }}" target="_blank" style="color: #3498db; text-decoration: none;">
                            {{ $website }}
                        </a>
                    @else
                        {{ $website }}
                    @endif
                </div>
            </div>
            
            <div class="field">
                <div class="label">Message:</div>
                <div class="value message-box">
                    {!! nl2br(e($messageText)) !!}
                </div>
            </div>
            
            <div class="meta-info">
                <div><span class="meta-label">Submitted at:</span> {{ $submittedAt }}</div>
                <div><span class="meta-label">IP Address:</span> {{ $ipAddress }}</div>
                <div><span class="meta-label">User Agent:</span> {{ Str::limit($userAgent, 100) }}</div>
            </div>
        </div>
        
        <div style="margin-top: 30px; text-align: center; color: #95a5a6; font-size: 12px;">
            This email was automatically generated from the contact form on {{ config('app.name') }}
        </div>
    </div>
</body>
</html>