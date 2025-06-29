<?php
header('Content-Type: application/json');

// Include database connection
include 'includes/database.php';

// Function to sanitize input
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize the input data
    $nama = sanitize($_POST["nama"]);
    $kehadiran = sanitize($_POST["kehadiran"]);
    $pesan = sanitize($_POST["pesan"]);
    
    // Validate input
    if (empty($nama) || empty($kehadiran) || empty($pesan)) {
        echo json_encode(["success" => false, "message" => "Semua kolom harus diisi"]);
        exit();
    }
    
    // Insert into database
    $sql = "INSERT INTO rsvp (nama, kehadiran, pesan) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama, $kehadiran, $pesan);
    
    if ($stmt->execute()) {
        echo json_encode([
            "success" => true, 
            "message" => "RSVP berhasil ditambahkan",
            "nama" => $nama,
            "kehadiran" => $kehadiran,
            "pesan" => $pesan
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }
    
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Metode tidak diizinkan"]);
}

$conn->close();
?>