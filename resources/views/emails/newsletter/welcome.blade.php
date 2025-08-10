<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to MutmineBeads Newsletter</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #ec4899, #8b5cf6); color: white; padding: 30px; text-align: center; }
        .content { background: #f9f9f9; padding: 30px; }
        .welcome { background: white; padding: 20px; border-radius: 10px; margin: 20px 0; }
        .benefits { display: grid; gap: 15px; margin: 20px 0; }
        .benefit { background: white; padding: 15px; border-radius: 5px; border-left: 4px solid #ec4899; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 14px; }
        .social { text-align: center; margin: 20px 0; }
        .social a { display: inline-block; margin: 0 10px; padding: 10px; background: #ec4899; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Our Community! 🎉</h1>
            <p>You're now part of the MutmineBeads family</p>
        </div>

        <div class="content">
            <div class="welcome">
                <h2>Hi there!</h2>
                <p>Thank you for subscribing to our newsletter! You've just joined thousands of bead lovers who get exclusive access to:</p>
            </div>

            <div class="benefits">
                <div class="benefit">
                    <strong>✨ New Collection Previews</strong><br>
                    Be the first to see our latest designs before anyone else
                </div>

                <div class="benefit">
                    <strong>🎁 Exclusive Offers</strong><br>
                    Subscriber-only discounts and special promotions
                </div>

                <div class="benefit">
                    <strong>📚 Beading Tips & Tutorials</strong><br>
                    Learn new techniques and get inspired with our how-to guides
                </div>

                <div class="benefit">
                    <strong>🎯 Priority Access</strong><br>
                    First access to limited editions and workshop bookings
                </div>
            </div>

            <div class="welcome">
                <h3>What's Coming Next?</h3>
                <p>Keep an eye out for our weekly newsletter featuring:</p>
                <ul>
                    <li>Featured product spotlights</li>
                    <li>Customer creations and stories</li>
                    <li>Upcoming workshop schedules</li>
                    <li>Behind-the-scenes content</li>
                </ul>
            </div>

            <div class="social">
                <p><strong>Follow us on social media for daily inspiration:</strong></p>
                <a href="#">Instagram</a>
                <a href="#">Facebook</a>
                <a href="#">Pinterest</a>
            </div>

            <p style="text-align: center; margin-top: 30px;">
                <strong>Happy beading!</strong><br>
                The MutmineBeads Team
            </p>
        </div>

        <div class="footer">
            <p>MutmineBeads | 123 Craft Street, Ibadan, Oyo State</p>
            <p>You can <a href="{{ $subscriber->getUnsubscribeUrl() }}" style="color: #ec4899;">unsubscribe</a> at any time.</p>
        </div>
    </div>
</body>
</html>
