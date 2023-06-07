<?php
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve'])) {
    $productId = $_POST['product_id'];
    
    // Fetch the product details from the temporary table
    $query = "SELECT * FROM temporary_products WHERE pid = '$productId'";
    $result = $conn->query($query);
    $product = $result->fetch_assoc();
    
    // Insert the product into the approved products table
    $query = "INSERT INTO `products`(`id`, `pid`, `Product_name`, `address`, `price`, `category`, `image_01`, `image_02`, `image_03`, `image_04`, `image_05`, `description`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssisssssss",$product['id'], $product['pid'], $product['Product_name'], $product['address'],$product['price'],$product['category'],$product['image_01'],$product['image_02'],$product['image_03'],$product['image_04'],$product['image_05'],$product['description']);
    $stmt->execute();
    $stmt->close();
    
    // Delete the product from the temporary table
    $query = "DELETE FROM temporary_products WHERE pid = '$productId'";
    $stmt = $conn->query($query);
    
    // Redirect the admin back to the admin interface
    header("Location: admin.php");
    exit();
}
?>
