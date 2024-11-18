<h6?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$isLoggedIn = isset($_SESSION['customer_id']);
?>
<body>
<section class="header">
<nav class="navbar navbar-expand-lg bg-body-tertiary" >
  <div class="container-fluid px-3">
    <a class="navbar-brand h1" href="./homepage.php">
      <img src="assets/img/deltech2.png" alt="<?php echo $lang['Deltech']; ?>" style="height: 75px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyNavbar" aria-controls="MyNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <form class="search-bar mx-lg-auto my-2 my-lg-0" role="search" action="search.php" method="GET">
  <div class="input-group">
    <input class="form-control" type="search" name="q" placeholder="<?php echo $lang[''] ?>" aria-label="Search" required />
    <button class="btn search-icon" type="submit">
      <i class="fas fa-search"></i>
    </button>
  </div>
</form>


    <div class="collapse navbar-collapse" id="MyNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link nav-hover" href="./homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-hover" href="./index.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-hover" href="./services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-hover" href="./contact.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-hover" href="./about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-hover" href="./login.php">Log In</a>
        </li>
      </ul>

     
        </div>
      
    </div>
    </nav></section>
</nav>
</body>


<style>
/* Navbar Styles */
.body{
  background-color: white;
}
.header {
  background-color: white;
}
.nav item a {
  font-size: 100px;
}

.navbar {
    box-shadow: white;
    background-color: white;
}

.navbar .nav-link {
    margin-right: 120%;
    color: black;
    font-weight: 650;
    padding: 0.5rem 1rem;
    margin: 10 0.5rem;
    border-radius: 10px;
    transition: all 0.3s ease;
}

/* Profile Icon Styles */
.profile-icon, .menu-icon {
    padding: 0.9rem !important;
}

.profile-icon::after, .menu-icon::after {
    display: none !important; 
}
.search-bar .input-group {
  width: 100%;
  max-width: 400px;
  border-radius: 30px;
  overflow: hidden;
  background-color: #280068;
  display: flex;
  align-items: center;
  height: 40px; /* Set the desired height here */
  margin-left: 400px;
}

.search-bar .form-control {
  border: none;
  border-radius: 0;
  box-shadow: none;
  padding: 0 20px;
  background-color: #280068;
  color: #ffffff;
  height: 100%; /* Ensure it fills the input-group height */
}

.search-bar .form-control::placeholder {
  color: #280068;
}

.search-bar .search-icon {
  background-color: #280068;
  border: none;
  color: #ffffff;
  padding: 0 15px;
  display: flex;
  align-items: center;
  height: 100%; /* Ensure it matches the input-group height */
}

.search-bar .search-icon i {
  font-size: 0.9em;
}

.user-avatar {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: #f8f9fa;
    transition: all 0.3s ease;
}

.user-avatar i {
    font-size: 1.5rem;
    color: #333; 
}

.menu-icon i {
    font-size: 1.2rem;
    color: #333;
}

.user-avatar:hover {
    background-color: #e9ecef;
    transform: translateY(-2px);
}

.dropdown-header {
    padding: 0.5rem 1rem;
    color: #6c757d;
    background-color: #f8f9fa;
}

/* Enhanced Hover Effect */
.nav-hover {
    position: relative;
}

.nav-hover::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 0;
    left: 50%;
    background-color: #007bff;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.nav-hover:hover::after {
    width: 100%;
}

.nav-hover:hover {
    color: #007bff !important;
    background-color: rgba(0, 123, 255, 0.1);
}

/* Search Bar Styles */
.btn-search {
    width: 100%;
    max-width: 400px;
}

@media (max-width: 991.98px) {
    .btn-search {
        max-width: 100%;
        margin: 1rem 0;
    }
}

/* Cart Button Styles */
.cart-btn {
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
}

.cart-btn:hover {
    background-color: #007bff;
    color: white;
}

/* Dropdown Animation */
.animate {
    animation-duration: 0.3s;
    animation-fill-mode: both;
}

.slideIn {
    animation-name: slideIn;
}

@keyframes slideIn {
    0% {
        transform: translateY(1rem);
        opacity: 0;
    }
    100% {
        transform: translateY(0rem);
        opacity: 1;
    }
}

/* Dropdown Styles */
.dropdown-menu {
    border: none;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.dropdown-item {
    padding: 0.7rem 1.5rem;
    transition: all 0.3s ease;
}

.dropdown-item i {
    width: 20px;
    text-align: center;
}

.dropdown-item:hover {
    background-color: rgba(0, 123, 255, 0.1);
    color: #007bff;
}

/* Modal Button Styles */
.modal-footer .btn {
    color: #ffffff;
    transition: all 0.3s ease;
}

.modal-footer .btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.modal-footer .btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
    transform: translateY(-1px);
}

.modal-footer .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.modal-footer .btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
    transform: translateY(-1px);
}

/* Search button styles */
.btn-search .btn-outline-primary {
    color: #007bff;
    border-color: #007bff;
    transition: all 0.3s ease;
}

.btn-search .btn-outline-primary:hover {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    transform: translateY(-1px);
}

/* Responsive Adjustments */
@media (max-width: 991.98px) {
    .navbar-nav {
        padding: 1rem 0;
    }
    
    .nav-item {
      text-transform: none !important;

    }
    
    .nav-hover::after {
        display: none;
    }
}
.nav-link-capitalized {
  text-transform: none;
}

</style>