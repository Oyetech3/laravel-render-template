<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #ec4899, #8b5cf6); color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 5px; }
        .priority { background: #fef3c7; border-left: 4px solid #f59e0b; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
            <p>MutmineBeads Website</p>
        </div>

        <div class="content">
            @if($contact->subject === 'custom_order' || $contact->subject === 'bulk_order')
                <div class="priority">
                    <strong>🔥 High Priority:</strong> This is a potential order inquiry!
                </div>
            @endif

            <div class="field">
                <div class="label">Name:</div>
                <div class="value">{{ $contact->full_name }}</div>
            </div>

            <div class="field">
                <div class="label">Email:</div>
                <div class="value">{{ $contact->email }}</div>
            </div>

            @if($contact->phone)
            <div class="field">
                <div class="label">Phone:</div>
                <div class="value">{{ $contact->phone }}</div>
            </div>
            @endif

            <div class="field">
                <div class="label">Subject:</div>
                <div class="value">{{ $contact->subject_formatted }}</div>
            </div>

            <div class="field">
                <div class="label">Message:</div>
                <div class="value" style="background: white; padding: 10px; border-radius: 5px;">
                    {!! nl2br(e($contact->message)) !!}
                </div>
            </div>

            @if($contact->newsletter)
            <div class="field">
                <div class="value" style="color: #10b981;">
                    ✓ Customer opted in to newsletter
                </div>
            </div>
            @endif

            <div class="field">
                <div class="label">Submitted:</div>
                <div class="value">{{ $contact->created_at->format('M j, Y \a\t g:i A') }}</div>
            </div>

            <p style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
                <strong>Action Required:</strong> Please respond to this inquiry within 24 hours for the best customer experience.
            </p>
        </div>
    </div>
</body>
</html>
