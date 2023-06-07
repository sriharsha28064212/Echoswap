<?php include 'config.php' ?>
<?php include 'admin_header.php' ?>
<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="admin.php">Pending Request</a>
</div>
<!-- Page content -->
<div class="content">
  <?php
  // Assuming you have established a database connection
  
  // Fetch all pending products from the temporary table
  $query = "SELECT * FROM temporary_products";
  $result = $conn->query($query);
  
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          // Display the product details in a card
          echo "<div class='product-card'>";
          echo "<h3>" . $row['Product_name'] . "</h3>";
          echo "<p>" . $row['description'] . "</p>";
          echo "<p>Price: $" . $row['price'] . "</p>";
          //echo "<p>User ID: " . $row['id'] . "</p>";
          
          // Accept Button
          echo "<form action='approve_product.php' method='POST'>";
          echo "<input type='hidden' name='product_id' value='" . $row['pid'] . "'>";
          echo "<input type='submit' name='approve' value='Accept'>";
          echo "</form>";
          
          // Deny Button
          echo "<form action='deny_product.php' method='POST'>";
          echo "<input type='hidden' name='product_id' value='" . $row['pid'] . "'>";
          echo "<input type='submit' name='deny' value='Deny'>";
          echo "</form>";
          
          echo "</div>";
      }
  } else {
      echo "No pending products.";
  }
  ?>
    <!-- <table class="table">

    </table> -->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
</body>

</html>