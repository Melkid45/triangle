<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Job Application</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 700px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 8px; margin-bottom: 25px; }
        .header h2 { margin: 0; font-size: 24px; }
        .job-title { background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .section { margin: 25px 0; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .section-title { font-weight: bold; color: #2c3e50; font-size: 18px; margin-bottom: 15px; padding-bottom: 10px; border-bottom: 2px solid #3498db; }
        .answer { padding: 15px; background: #f8f9fa; border-radius: 5px; margin-top: 10px; line-height: 1.8; }
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin: 20px 0; }
        .info-item { background: #f1f8ff; padding: 15px; border-radius: 5px; }
        .info-label { font-weight: bold; color: #2c3e50; font-size: 14px; }
        .info-value { margin-top: 5px; color: #555; }
        .cv-info { background: #e8f5e9; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .action-buttons { margin-top: 30px; text-align: center; }
        .btn { display: inline-block; padding: 10px 20px; margin: 0 10px; background: #3498db; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .btn-view { background: #2ecc71; }
        .btn-email { background: #9b59b6; }
        .btn-portfolio { background: #e74c3c; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📋 New Job Application Received</h2>
            <div class="job-title">
                <strong>Position:</strong> {{ $job_title }}
            </div>
        </div>
        
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Candidate Name:</div>
                <div class="info-value">{{ $name }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email:</div>
                <div class="info-value">
                    <a href="mailto:{{ $email }}" style="color: #3498db;">
                        {{ $email }}
                    </a>
                </div>
            </div>
            <div class="info-item">
                <div class="info-label">Applied At:</div>
                <div class="info-value">{{ $applied_at->format('F j, Y, g:i a') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">CV Attached:</div>
                <div class="info-value">{{ $cv_name ?? 'No CV' }} ({{ round($cv_size / 1024, 2) }} KB)</div>
            </div>
        </div>
        
        <div class="section">
            <div class="section-title">Why should we select you?</div>
            <div class="answer">{!! nl2br(e($why_apply)) !!}</div>
        </div>
        
        @if(!empty($proud_project))
        <div class="section">
            <div class="section-title">Project they're proud of:</div>
            <div class="answer">{!! nl2br(e($proud_project)) !!}</div>
        </div>
        @endif
        
        <div class="section">
            <div class="section-title">Portfolio Links:</div>
            <div class="answer">
                @php
                    $links = preg_split('/\r\n|\r|\n/', $portfolio);
                @endphp
                @foreach($links as $link)
                    @if(filter_var(trim($link), FILTER_VALIDATE_URL))
                        <a href="{{ trim($link) }}" target="_blank" style="color: #3498db; display: block; margin: 5px 0;">
                            {{ trim($link) }}
                        </a>
                    @else
                        <div style="margin: 5px 0;">{{ trim($link) }}</div>
                    @endif
                @endforeach
            </div>
        </div>
        
        <div class="section">
            <div class="section-title">Salary Expectations:</div>
            <div class="answer">{!! nl2br(e($salary_expectations)) !!}</div>
        </div>
        
        <div class="cv-info">
            <strong>📎 CV File Information:</strong><br>
            • File Name: {{ $cv_name ?? 'Not provided' }}<br>
            • File Size: {{ round($cv_size / 1024, 2) }} KB<br>
            • Format: {{ pathinfo($cv_name ?? '', PATHINFO_EXTENSION) }}
        </div>
        
        <div class="action-buttons">
            <a href="mailto:{{ $email }}" class="btn btn-email">📧 Reply to Candidate</a>
            @if(!empty($portfolio))
                <a href="{{ explode("\n", $portfolio)[0] }}" target="_blank" class="btn btn-portfolio">🌐 View Portfolio</a>
            @endif
        </div>
        
        <div style="margin-top: 30px; padding: 15px; background: #f8f9fa; border-radius: 5px; font-size: 12px; color: #7f8c8d;">
            <strong>Technical Info:</strong><br>
            IP Address: {{ $ip_address }}<br>
            User Agent: {{ Str::limit($user_agent, 100) }}<br>
            Sent via: {{ config('app.name') }} Job Application Form
        </div>
    </div>
</body>
</html>