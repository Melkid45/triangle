<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Новое сообщение с контактной формы</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #f8f9fa; padding: 20px; border-radius: 5px; }
        .content { margin: 20px 0; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #333; }
        .value { padding: 10px; background: #f8f9fa; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Новое сообщение с контактной формы</h2>
        </div>
        
        <div class="content">
            <div class="field">
                <div class="label">ФИО:</div>
                <div class="value">{{ $name }}</div>
            </div>
            
            <div class="field">
                <div class="label">Email:</div>
                <div class="value">{{ $email }}</div>
            </div>
            
            <div class="field">
                <div class="label">Веб-сайт:</div>
                <div class="value">{{ $website }}</div>
            </div>
            
            <div class="field">
                <div class="label">Сообщение:</div>
                <div class="value">{{ $messageText }}</div>
            </div>
        </div>
        
        <p><small>Сообщение отправлено: {{ now()->format('d.m.Y H:i') }}</small></p>
    </div>
</body>
</html>