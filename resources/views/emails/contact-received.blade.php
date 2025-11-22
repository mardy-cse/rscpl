<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
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
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #1e40af;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field-label {
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 5px;
        }
        .field-value {
            padding: 10px;
            background-color: #f8f9fa;
            border-left: 3px solid #1e40af;
            border-radius: 4px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }
        .message-box {
            background-color: #f8f9fa;
            border-left: 3px solid #1e40af;
            padding: 15px;
            border-radius: 4px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
        </div>
        <div class="content">
            <p>You have received a new message from your website contact form.</p>
            
            <div class="field">
                <div class="field-label">Name:</div>
                <div class="field-value">{{ $contact->name }}</div>
            </div>

            <div class="field">
                <div class="field-label">Email:</div>
                <div class="field-value">
                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                </div>
            </div>

            @if($contact->phone)
            <div class="field">
                <div class="field-label">Phone:</div>
                <div class="field-value">
                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                </div>
            </div>
            @endif

            @if($contact->subject)
            <div class="field">
                <div class="field-label">Subject:</div>
                <div class="field-value">{{ $contact->subject }}</div>
            </div>
            @endif

            <div class="field">
                <div class="field-label">Message:</div>
                <div class="message-box">{{ $contact->message }}</div>
            </div>

            <div class="field">
                <div class="field-label">Submitted:</div>
                <div class="field-value">{{ $contact->created_at->format('d M Y, h:i A') }}</div>
            </div>
        </div>
        <div class="footer">
            <p>This email was sent from the contact form on your website.<br>
            Roller Shutter & Construction Pte. Ltd. | 66 Tannery Lane #01-03D, Singapore 347805</p>
        </div>
    </div>
</body>
</html>
