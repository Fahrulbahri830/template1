<?php
// Start the session to use for secure admin login
session_start();

// Include database connection
include 'includes/database.php';

// Define admin credentials - in a real production environment, use proper authentication system
$admin_username = "admin";
$admin_password = "adminpassword123"; // In production, use hashed passwords

$loggedIn = false;
$error = '';

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        $loggedIn = true;
    } else {
        $error = "Username atau password salah!";
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}

// Check if admin is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    $loggedIn = true;
}

// Handle delete RSVP
if ($loggedIn && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // Use prepared statement to prevent SQL injection
    $delete_sql = "DELETE FROM rsvp WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $success_message = "Data berhasil dihapus!";
    } else {
        $error_message = "Gagal menghapus data: " . $conn->error;
    }
    $stmt->close();
}

// Handle export to CSV
if ($loggedIn && isset($_GET['export'])) {
    // Output headers for CSV file download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=rsvp_data.csv');
    
    // Create output stream
    $output = fopen('php://output', 'w');
    
    // Set column headers
    fputcsv($output, array('ID', 'Nama', 'Kehadiran', 'Pesan', 'Tanggal'));
    
    // Get data from database
    $sql = "SELECT * FROM rsvp ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
    // Output each row of data
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, array(
            $row['id'],
            $row['nama'],
            $row['kehadiran'],
            $row['pesan'],
            $row['created_at']
        ));
    }
    
    fclose($output);
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Undangan Pernikahan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #D4AF37;
            --accent-color: #8B0000;
            --text-color: #333333;
            --background-color: #FFF9F0;
            --light-gold: #F5E7C1;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--text-color);
            background-color: var(--background-color);
            line-height: 1.6;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .admin-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .admin-header h1 {
            font-size: 2rem;
            color: var(--accent-color);
        }
        
        .login-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 1rem;
            text-align: center;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: #fff;
            width: 100%;
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        
        .btn-danger:hover {
            background-color: #bd2130;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        
        .btn-export {
            background-color: #28a745;
            color: #fff;
            margin-right: 10px;
        }
        
        .btn-export:hover {
            background-color: #218838;
        }
        
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .admin-actions {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .admin-table th,
        .admin-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .admin-table th {
            background-color: var(--accent-color);
            color: #fff;
        }
        
        .admin-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .admin-table tr:hover {
            background-color: #f1f1f1;
        }
        
        .action-btn {
            padding: 8px 12px;
            font-size: 0.8rem;
            border-radius: 4px;
        }
        
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .badge-success {
            background-color: #e6f7e6;
            color: #28a745;
        }
        
        .badge-danger {
            background-color: #fbebeb;
            color: #dc3545;
        }
        
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        
        .pagination a {
            padding: 8px 16px;
            margin: 0 5px;
            background-color: #fff;
            border: 1px solid #ddd;
            text-decoration: none;
            color: var(--text-color);
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .pagination a.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="admin-header">
            <h1>Admin Panel - Undangan Pernikahan</h1>
            <p>Kelola data RSVP undangan pernikahan Anda</p>
        </div>
        
        <?php if (!$loggedIn): ?>
            <?php if ($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <div class="login-form">
                <h2>Login Admin</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
            </div>
        <?php else: ?>
            <div class="admin-actions">
                <div>
                    <a href="admin.php?export=true" class="btn btn-export">
                        <i class="fas fa-file-export"></i> Export to CSV
                    </a>
                </div>
                <a href="admin.php?logout=true" class="btn btn-secondary">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
            
            <?php if (isset($success_message)): ?>
                <div class="success-message"><?php echo $success_message; ?></div>
            <?php endif; ?>
            
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            
            <?php
            // Pagination setup
            $results_per_page = 10;
            
            // Count total number of records
            $count_query = "SELECT COUNT(*) as total FROM rsvp";
            $count_result = $conn->query($count_query);
            $count_row = $count_result->fetch_assoc();
            $total_records = $count_row['total'];
            
            // Calculate total number of pages
            $total_pages = ceil($total_records / $results_per_page);
            
            // Get current page
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $results_per_page;
            
            // Retrieve RSVP data with pagination
            $sql = "SELECT * FROM rsvp ORDER BY created_at DESC LIMIT $offset, $results_per_page";
            $result = $conn->query($sql);
            ?>
            
            <div style="overflow-x:auto;">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kehadiran</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                echo "<td><span class='badge " . ($row['kehadiran'] == 'Hadir' ? 'badge-success' : 'badge-danger') . "'>" . $row['kehadiran'] . "</span></td>";
                                echo "<td>" . htmlspecialchars($row['pesan']) . "</td>";
                                echo "<td>" . date('d M Y H:i', strtotime($row['created_at'])) . "</td>";
                                echo "<td><a href='admin.php?delete=" . $row['id'] . "' class='btn btn-danger action-btn' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'><i class='fas fa-trash'></i> Hapus</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' style='text-align: center;'>Belum ada data RSVP.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <?php if ($total_pages > 1): ?>
                <div class="pagination">
                    <?php if ($current_page > 1): ?>
                        <a href="admin.php?page=<?php echo ($current_page-1); ?>">&laquo; Previous</a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="admin.php?page=<?php echo $i; ?>" class="<?php echo ($i == $current_page) ? 'active' : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($current_page < $total_pages): ?>
                        <a href="admin.php?page=<?php echo ($current_page+1); ?>">Next &raquo;</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
        <?php endif; ?>
    </div>
</body>
</html>