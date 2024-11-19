<?php
ob_start(); 
session_name('admin_session');
session_start();
$pageTitle = 'Dashboard';
include './init.php';

if (isset($_SESSION['username'])) {
    $do = isset($_GET['do']) ? $_GET['do'] : 'dashboard';
    if ($do == 'dashboard') {

        // Fetch total subtotal for completed orders
        $totalSubtotal = $con->query("SELECT SUM(subtotal) AS total_subtotal FROM orders WHERE order_status = 'completed'")->fetchColumn();
        
        // Fetch total number of customers
        $customersCount = $con->query("SELECT COUNT(*) AS total_customers FROM customers")->fetchColumn();
        
        // Fetch total number of tickets
        $ticketsCount = $con->query("SELECT COUNT(*) AS total_tickets FROM support_tickets")->fetchColumn();
        
        // Removed customer inquiries count since we only need the link to open the inquiries

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        .dashboard {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .page-title {
            color: #f7b32b;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Dashboard Cards */
        .dashboard-card {
            background: linear-gradient(145deg, #280068, #3c007a);
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .dashboard-icon {
            font-size: 40px;
            margin-bottom: 10px;
            color: #f7b32b;
        }

        /* Links */
        .dashboard-link {
            text-decoration: none;
            color: inherit;
        }

        .dashboard-link:hover .dashboard-card {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="container my-5">
            <h1 class="page-title mb-4 text-center"><?php echo $pageTitle; ?></h1>
            <div class="dashboard-status py-3">
                <div class="row">
                    <!-- Total Sell Card -->
                    <div class="col-md-3 mb-4">
                        <div class="card dashboard-card">
                            <div class="card-body text-center">
                                <i class="fas fa-dollar-sign dashboard-icon"></i>
                                <h4 class="card-title">Total Sell</h4>
                                <p class="card-text"><?php echo number_format($totalSubtotal, 2); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Customers Card -->
                    <div class="col-md-3 mb-4">
                        <div class="card dashboard-card">
                            <div class="card-body text-center">
                                <i class="fas fa-users dashboard-icon"></i>
                                <h4 class="card-title">Customers</h4>
                                <p class="card-text"><?php echo $customersCount; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Tickets Card -->
                    <div class="col-md-3 mb-4">
                        <a href="admin_ticket_list.php" class="dashboard-link">
                            <div class="card dashboard-card">
                                <div class="card-body text-center">
                                    <i class="fas fa-ticket-alt dashboard-icon"></i>
                                    <h4 class="card-title">Tickets</h4>
                                    <p class="card-text"><?php echo $ticketsCount; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Customer Inquiries Card -->
                    <div class="col-md-3 mb-4">
                        <a href="admin_chat_list.php" class="dashboard-link">
                            <div class="card dashboard-card">
                                <div class="card-body text-center">
                                    <i class="fas fa-comments dashboard-icon"></i>
                                    <h4 class="card-title">Customer Inquiries</h4>
                                    <p class="card-text">Click to Open</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<?php
    }
} else {
    // Redirect to login if not logged in
    header('location: index.php');
    exit();
}

ob_end_flush();
include $tpl . 'footer.php';
?>