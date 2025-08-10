<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank you for contacting MutmineBeads</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #ec4899, #8b5cf6); color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; }
        .highlight { background: #ecfdf5; border: 1px solid #10b981; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You!</h1>
            <p>We've received your message</p>
        </div>

        <div class="content">
            <p>Hi {{ $contact->first_name }},</p>

            <p>Thank you for contacting MutmineBeads! We've received your message about <strong>{{ $contact->subject_formatted }}</strong> and we're excited to help you.</p>

            <div class="highlight">
                <strong>What happens next?</strong>
                <ul style="margin: 10px 0 0 20px;">
                    <li>Our team will review your message within the next few hours</li>
                    <li>You'll receive a personal response within 24 hours</li>
                    <li>For urgent matters, feel free to call us at +234 (0) 123-456-7890</li>
                </ul>
            </div>

            @if($contact->subject === 'custom_order')
                <p><strong>Custom Order Inquiry:</strong> We're thrilled you're interested in a custom piece! Our design team will prepare some initial ideas and material options for you.</p>
            @elseif($contact->subject === 'workshop')
                <p><strong>Workshop Inquiry:</strong> Our next workshop sessions are filling up quickly. We'll send you available dates and details soon.</p>
            @elseif($contact->subject === 'wedding_collection')
                <p><strong>Wedding Collection:</strong> Congratulations on your upcoming wedding! We'll put together some beautiful options for your special day.</p>
            @endif

            <p>In the meantime, feel free to:</p>
            <ul>
                <li>Browse our <a href="{{ url('/products') }}" style="color: #ec4899;">latest collections</a></li>
                <li>Follow us on social media for daily inspiration</li>
                <li>Read about our <a href="{{ url('/services') }}" style="color: #ec4899;">services</a></li>
            </ul>

            @if($contact->newsletter)
                <p style="color: #10b981; font-weight: bold;">✓ You've been subscribed to our newsletter for exclusive offers and new collection previews!</p>
            @endif

            <p>Thank you for choosing MutmineBeads!</p>

            <p style="margin-top: 30px;">
                Best regards,<br>
                <strong>The MutmineBeads Team</strong>
            </p>
        </div>

        <div class="footer">
            <p>MutmineBeads | 123 Craft Street, Ibadan, Oyo State | info@mutminebeads.com</p>
        </div>
    </div>
</body>
</html>
