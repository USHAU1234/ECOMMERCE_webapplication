<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    die("Access Denied!");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete product query
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    if ($stmt->execute([$id])) {
        header("Location: manage_products.php?msg=Product Deleted Successfully");
        exit();
    } else {
        echo "Error deleting product.";
    }
} else {
    echo "Invalid request!";
}
?>
