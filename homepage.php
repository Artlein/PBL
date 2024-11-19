<?php
session_start();
$pageTitle = 'Homepage';
include './init.php';

// Fetching the latest products for display
$stmt = $con->prepare("SELECT id, name_product, price_product, currency, img_product FROM products ORDER BY created_at DESC LIMIT 8");
$stmt->execute();
$latestProducts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>

        /* General Styling */
        :root {
            --primary-color: #280068;
            --red-color: #B84141;
            --yellow-color: #F7C945;
        }
/* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    overflow-x: hidden;

}

a {
    text-decoration: none;
    color: inherit;
}

h1, h2, h3, h4, h5, h6 {
    margin: 0;
}

/* Hero Slider */
.hero-slider {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

.slider-container {
    display: flex;
    width: 100%;
    transition: transform 0.5s ease-in-out;
    overflow: hidden;

}

.slide {
    flex: 100%; /* Make slides take full width of the parent */
    height: 100%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.slide img {
    width: 100%;
    height: auto;
}

.slide-content {
    position: absolute;
    color: white;
    text-align: center;
    z-index: 2;
}

.slide h1, .slide h5 {
    font-size: 3rem;
    margin: 10px 0;
}

.slide h6 {
    font-size: 1.5rem;
    margin-bottom: 20px;
}

.reserve-now-btn {
    background-color: #ff6200;
    padding: 10px 20px;
    font-size: 1.2rem;
    color: white;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.reserve-now-btn:hover {
    background-color: #e55e00;
}

/* Info Sections */
.info-sections {
    display: flex;
    justify-content: space-between;
    padding: 50px 10%;
    flex-wrap: wrap;
    overflow: hidden;

}

.info-card {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 45%;
    margin-bottom: 20px;
}

.info-card h1 {
    font-size: 2rem;
    margin-bottom: 20px;
}

.info-card ul {
    list-style-type: none;
    padding: 0;
}

.info-card li {
    margin: 10px 0;
}

.info-card li a {
    font-size: 1.2rem;
    color: #333;
}

.info-card li a:hover {
    color: #ff6200;
}

/* Featured Products */
.featured-products {
    background-color: #f4f4f4;
    padding: 50px 10%;
    text-align: center;
    overflow: hidden;

}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 30px;
}

.product-item {
    display: block;
    background-color: white;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
}

.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}

.product-item img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.product-item h3 {
    font-size: 1.5rem;
    margin: 15px 0;
}

.product-item p {
    font-size: 1.2rem;
}

/* Partners Section */
.partners {
    background-color: #fff;
    padding: 50px 10%;
    text-align: center;
    overflow: hidden;
    max-width: 100%;

}

.partner-logo img {
    max-width: 150px;
    margin: 20px;
}

.partners-grid {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    overflow: hidden;

}

.slider {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    overflow: hidden;

}

.partner-logo {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Connect Section */
.connect-section {
    background-color: #2c3e50;
    color: white;
    padding: 50px 10%;
    overflow: hidden;

}

.connect-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    overflow: hidden;

}

.connect-left {
    flex: 1;
    margin-right: 20px;
    min-width: 250px;
}

.connect-title {
    font-size: 2rem;
    margin-bottom: 20px;
}

.social-icons {
    display: flex;
    flex-wrap: wrap;
}

.social-icons a {
    margin-right: 10px;
    margin-bottom: 10px;
}

.social-icons img {
    width: 30px;
    height: 30px;
    transition: opacity 0.3s, transform 0.3s;
}

.social-icons a:hover img {
    opacity: 0.7;
    transform: scale(1.1);
}

.divider {
    width: 1px;
    background-color: #ddd;
    height: 100%;
    margin: 0 20px;
    overflow: hidden;

}

.connect-right {
    flex: 1;
    min-width: 250px;
}

.connect-links {
    margin-bottom: 20px;
}

.connect-links h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.connect-links ul {
    list-style-type: none;
    padding: 0;
}

.connect-links li {
    margin: 10px 0;
}

.connect-links li a {
    color: #fff;
    font-size: 1.2rem;
}

.connect-links li a:hover {
    color: #ff6200;
}

/* Media Queries */
@media (max-width: 100%) {
    .info-sections {
        flex-direction: column;
        padding: 20px;
    }

    .info-card {
        width: 100%;
        margin-bottom: 20px;
    }

    .products-grid {
        grid-template-columns: 1fr;
    }

    .connect-container {
        flex-direction: column;
        align-items: center;
    }

    .divider {
        display: none;
    }
}

@media (max-width: 100%) {
    .hero-slider {
        height: 60vh;
    }

    .slide h1 {
        font-size: 2.5rem;
    }

    .slide h5 {
        font-size: 1.5rem;
    }

    .slide h6 {
        font-size: 1rem;
    }

    .info-sections {
        padding: 20px;
    }

    .info-card {
        width: 100%;
        margin-bottom: 20px;
    }

    .product-item {
        padding: 15px;
    }

    .reserve-now-btn {
        font-size: 1rem;
        padding: 8px 15px;
    }

    .social-icons img {
        width: 25px;
        height: 25px;
    }
}

      
    </style>
</head>
<body>
    <!-- Hero Slider Section -->
    <section class="hero-slider">
        <button class="slider-nav-btn prev-btn" aria-label="Previous slide">❮</button>
        <button class="slider-nav-btn next-btn" aria-label="Next slide">❯</button>

        <div class="slider-container">
            <div class="slide">
                <img src="assets/img/p12.webp" alt="Parking Facility">
                <div class="slide-content">
                    <h6>WELCOME TO</h6>
                    <h1>DELTECH</h1>
                    <h5>PARKING SYSTEMS AND SOLUTIONS INC.</h5>
                    <a href="index.php" class="reserve-now-btn">RESERVE NOW!</a>
                </div>
            </div>
            <div class="slide">
                <img src="assets/img/p13.webp" alt="Parking Solutions">
                <div class="slide-content">
                    <h6>WELCOME TO</h6>
                    <h1>DELTECH</h1>
                    <h5>PARKING SYSTEMS AND SOLUTIONS INC.</h5>
                    <a href="index.php" class="reserve-now-btn">RESERVE NOW!</a>
                </div>
            </div>
            <div class="slide">
                <img src="assets/img/p3.jpg" alt="Parking Technology">
                <div class="slide-content">
                    <h1>WELCOME TO DELTECH</h1>
                    <p>PARKING SYSTEMS AND SOLUTIONS INC.</p>
                    <a href="index.php" class="reserve-now-btn">RESERVE NOW</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Sections -->
    <section class="info-sections">
        <div class="info-card what-we-do">
            <h1>WHAT WE DO</h1>
            <ul>
                <li><a href="parking_system_automation.php">Parking System Automation</a></li>
                <li><a href="autopay_station.php">Autopay Station</a></li>
                <li><a href="mobile_parking_system.php">Mobile Parking System</a></li>
                <li><a href="hotel_lock_sets.php">Hotel Locks Sets</a></li>
                <li><a href="cctv.php">CCTV</a></li>
                <li><a href="access_control_system.php">Access Control System</a></li>
                <li><a href="traffic_signaling_system.php">Traffic Signaling System</a></li>
                <li><a href="pylon_display.php">Pylon Display</a></li>
            </ul>
        </div>
        <div class="info-card our-services">
            <h1>OUR SERVICES</h1>
            <ul>
                <li><a href="parking_station_design.php">Review and Recommend Parking Station Designs</a></li>
                <li><a href="preventive_maintenance.php">Preventive Maintenance for Parking Equipment</a></li>
                <li><a href="equipment_integration.php">Integration of Parking Equipment</a></li>
            </ul>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="featured-products">
        <h1 class="section-title">OUR FEATURED PRODUCTS</h1>
        <div class="products-grid">
            <?php if (empty($latestProducts)): ?>
                <p>No products are available at the moment. Please check back later!</p>
            <?php else: ?>
                <?php foreach ($latestProducts as $product): ?>
                    <a href="product.php?id=<?php echo $product['id']; ?>" class="product-item">
                        <?php $imagePath = 'uploads/' . $product['img_product']; ?>
                        <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($product['name_product'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
                        <h3><?php echo htmlspecialchars($product['name_product'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><?php echo htmlspecialchars($product['price_product'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($product['currency'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <a href="index.php" class="reserve-now-btn">SEE MORE</a>
    </section>

    <!-- Partners Section -->
    <section class="partners">
        <h2>DELTECH INDUSTRY PARTNERS</h2>
        <div class="slider">
            <div class="partners-grid">
                <?php
                $partners = [
                    "sm.png" => "SM",
                    "mpt_mobility.png" => "MPT Mobility",
                    "eton.png" => "Eton Centris",
                    "mactan.png" => "Mactan Cebu Airport",
                    "u_park.png" => "U Park",
                    "megaworld.png" => "Megaworld",
                    "nustar.png" => "Nustar Resort",
                    "makati_medical.png" => "Makati Medical Center",
                    "starmall.png" => "Starmall",
                    "apmc.png" => "APMC",
                    "global.png" => "Global"
                ];

                foreach ($partners as $file => $alt): ?>
                    <div class="partner-logo"><img src="assets/img/<?php echo $file; ?>" alt="<?php echo $alt; ?>"></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Connect Section -->
    <footer class="connect-section">
        <div class="connect-container">
            <div class="connect-left">
                <img src="assets/img/deltech2.png" alt="Deltech Logo">
                <h2 class="connect-title">Connect with Deltech</h2>
                <div class="social-icons">
                    <a href="https://linkedin.com/company/deltech" target="_blank" rel="noopener noreferrer">
                        <img src="assets/img/linkedin.png" alt="LinkedIn">
                    </a>
                    <a href="https://facebook.com/deltech" target="_blank" rel="noopener noreferrer">
                        <img src="assets/img/facebook.png" alt="Facebook">
                    </a>
                    <a href="https://twitter.com/deltech" target="_blank" rel="noopener noreferrer">
                        <img src="assets/img/twitter.png" alt="Twitter">
                    </a>
                    <a href="https://youtube.com/deltech" target="_blank" rel="noopener noreferrer">
                        <img src="assets/img/youtube.png" alt="YouTube">
                    </a>
                    <a href="https://deltech.com/rss" target="_blank" rel="noopener noreferrer">
                        <img src="assets/img/rss.png" alt="RSS">
                    </a>
                    <a href="https://glassdoor.com/deltech" target="_blank" rel="noopener noreferrer">
                        <img src="assets/img/glassdoor.png" alt="Glassdoor">
                    </a>
                    <a href="https://instagram.com/deltech" target="_blank" rel="noopener noreferrer">
                        <img src="assets/img/instagram.png" alt="Instagram">
                    </a>
                    <a href="https://xing.com/deltech" target="_blank" rel="noopener noreferrer">
                        <img src="assets/img/xing.png" alt="Xing">
                    </a>
                </div>
            </div>
            <div class="divider"></div>
            <div class="connect-right">
                <div class="connect-links">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="offices.php">Offices</a></li>
                    </ul>
                </div>
                <div class="connect-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Products</a></li>
                        <li><a href="about.php">Partners</a></li>
                        <li><a href="awards.php">Awards</a></li>
                    </ul>
                </div>
                <div class="connect-links">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="media.php">Media</a></li>
                        <li><a href="email.php">Email</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>


    <?php include $tpl . 'footer.php'; ?>


    <script>
    // Enhanced slider functionality with toggling between two slides
    const sliderContainer = document.querySelector('.slider-container');
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentSlide = 0;  // Track the current slide (either 0 or 1)
    const totalSlides = slides.length;

    // Function to update the slider position
    function updateSlider() {
        // Only show two slides, current and the one toggled to
        const slideWidth = slides[0].offsetWidth; // Get the width of one slide
        sliderContainer.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
    }

    // Go to the next slide (toggle between 0 and 1)
    function nextSlide() {
        currentSlide = (currentSlide + 1) % 2; // Toggle between 0 and 1
        updateSlider();
    }

    // Go to the previous slide (toggle between 0 and 1)
    function prevSlide() {
        currentSlide = (currentSlide - 1 + 2) % 2; // Toggle between 0 and 1
        updateSlider();
    }

    // Event listeners for navigation buttons
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    // Auto-advance slides every 5 seconds
    setInterval(nextSlide, 5000);

    // Adjust for responsive layouts
    window.addEventListener('resize', updateSlider);  // Recalculate on resize
</script>

</body>
</html>