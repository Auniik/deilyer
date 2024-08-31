<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deilyer | Home</title>
    <link rel="stylesheet" href="/static/app/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="navbar-container">
            <span class=""><a class="logo" href="#">deilyer</a></span>
            <button class="navbar-toggler" id="navbar-toggler">&#9776;</button>
            <ul id="navbar-menu">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#track-order" id="track-order-btn">Track Order</a></li>
                <li><a href="/dashboard">Login/Signup</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Fast and Reliable Delivery at Your Fingertips</h1>
            <p>Get your packages delivered swiftly and securely with our top-notch delivery service.</p>
            <a href="#contact" class="cta-button">Get in Touch</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="about-content">
            <img src="/static/images/about.png" alt="About Us Illustration" class="about-image">
            <div class="about-text">
                <h2>About Us</h2>
                <p>At Delivery App, we pride ourselves on providing the fastest and most reliable delivery services. Our dedicated team ensures that your packages arrive on time, every time. With cutting-edge technology and a customer-first approach, we are here to meet all your delivery needs.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="contact-content">
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form id="contact-form">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>

                    <button type="submit">Send Message</button>
                </form>
                <div class="contact-details">
                    <p>Phone: +1 800 555 1234</p>
                    <p>Email: support@deliveryapp.com</p>
                    <p>Address: 123 Delivery Lane, Suite 100, City, State, ZIP</p>
                </div>
            </div>
             <div class="contact-image">
                <img src="/static/images/contact.jpg" alt="Contact Us Illustration">
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials">
        <div class="testimonials-content">
            <img src="/static/images/test.png" alt="Testimonials Illustration" class="testimonials-image">
            <div class="testimonials-text">
                <h2>What Our Customers Say</h2>
                <div class="testimonial">
                    <p>"The delivery service was exceptional! Fast and reliable. I will definitely use them again."</p>
                    <span>- Jane Doe</span>
                </div>
                <div class="testimonial">
                    <p>"Great customer support and timely deliveries. Highly recommend for anyone needing delivery services."</p>
                    <span>- John Smith</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Track Order Modal -->
    <div id="track-order-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Track Your Order</h2>
            <form id="track-order-form">
                <label for="order-id">Order ID:</label>
                <input type="text" id="order-id" name="order-id" required>
                <button type="submit">Track</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Delivery App. All rights reserved.</p>
        <p>Follow us on <a href="#">Social Media</a></p>
        <p>Privacy Policy | Terms of Service</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/static/app/script.js"></script>
</body>
</html>
