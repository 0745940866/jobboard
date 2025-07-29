<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JobQuest | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
        }

        header {
            background-color: #0d1b2a;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        nav a {
            margin-left: 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .hero {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/images/office-bg.jpg') center/cover no-repeat;
            color: white;
            padding: 100px 40px;
            text-align: center;
        }

        .hero h2 {
            font-size: 40px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        .btn {
            background-color: #0077b6;
            color: white;
            padding: 15px 30px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #023e8a;
        }

        .section {
            padding: 60px 40px;
            text-align: center;
        }

        .section h3 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .benefits, .testimonials {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 30px;
        }

        .card {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 300px;
            text-align: left;
        }

        .footer {
            background-color: #0d1b2a;
            color: white;
            text-align: center;
            padding: 30px 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>JobQuest</h1>
    <nav>
        <a href="/login">Login</a>
        <a href="/signup">Register</a>
    </nav>
</header>

<section class="hero">
    <h2>Find Your Future With Us</h2>
    <p>Welcome to JobQuest — where opportunities meet talent. We connect great minds to great companies. Discover why thousands trust us to power their careers.</p>
    <a href="/login" class="btn">Get Started</a>
</section>

<section class="section">
    <h3>Why Work With Us?</h3>
    <div class="benefits">
        <div class="card">
            <h4>Trusted Employers</h4>
            <p>We verify every employer and ensure job legitimacy across all listings.</p>
        </div>
        <div class="card">
            <h4>Career Growth</h4>
            <p>Get discovered by top companies looking to hire ambitious talent like you.</p>
        </div>
        <div class="card">
            <h4>Free Guidance</h4>
            <p>Enjoy free resume reviews, interview prep, and career coaching tools.</p>
        </div>
    </div>
</section>

<section class="section">
    <h3>What People Are Saying</h3>
    <div class="testimonials">
        <div class="card">
            <p>“JobQuest helped me land my dream role within 2 weeks of applying. Highly recommend!”</p>
            <strong>- Faith, Software Developer</strong>
        </div>
        <div class="card">
            <p>“I love how easy it is to apply and track my job applications. Great support too!”</p>
            <strong>- Brian, HR Analyst</strong>
        </div>
        <div class="card">
            <p>“The best part is the personalized job alerts. I found opportunities I never knew existed.”</p>
            <strong>- Mercy, UI/UX Designer</strong>
        </div>
    </div>
</section>

<section class="section">
    <h3>Take the First Step Today</h3>
    <p>Don’t wait to be discovered. Create your account and unlock real job opportunities tailored to you.</p>
    <a href="/signup" class="btn">Join Now</a>
</section>

<footer class="footer">
    <p>&copy; {{ date('Y') }} JobQuest. All rights reserved.</p>
    <p>Contact us at: support@jobquest.co.ke | +254 712 345678</p>
</footer>

</body>
</html>
