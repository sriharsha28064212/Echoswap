<?php

include 'config.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}

if (isset($_POST['delete'])) {

    $delete_id = $_POST['products_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_delete = "SELECT * FROM `products` WHERE id = '$delete_id'";
    $verify_delete = mysqli_query($conn, $verify_delete);

    if (mysqli_num_rows($verify_delete) > 0) {
        $select_images = "SELECT * FROM `products` WHERE id = '$delete_id'";
        $select_images = mysqli_query($conn, $select_images);
        $num_images = mysqli_num_rows($select_images);
        while ($fetch_images = mysqli_fetch_assoc($select_images)) {
            $image_01 = $fetch_images['image_01'];
            $image_02 = $fetch_images['image_02'];
            $image_03 = $fetch_images['image_03'];
            $image_04 = $fetch_images['image_04'];
            $image_05 = $fetch_images['image_05'];
            unlink('uploaded_files/' . $image_01);
            if (!empty($image_02)) {
                unlink('uploaded_files/' . $image_02);
            }
            if (!empty($image_03)) {
                unlink('uploaded_files/' . $image_03);
            }
            if (!empty($image_04)) {
                unlink('uploaded_files/' . $image_04);
            }
            if (!empty($image_05)) {
                unlink('uploaded_files/' . $image_05);
            }
        }
        // $delete_saved = "DELETE FROM `saved` WHERE products_id = '$delete_id'";
        // $delete_saved = mysqli_query($conn, $delete_saved);
        // $delete_requests = "DELETE FROM `requests` WHERE products_id = '$delete_id'";
        // $delete_requests = mysqli_query($conn, $delete_requests);
        $delete_listing = "DELETE FROM `products` WHERE id = '$delete_id'";
        $delete_listing = mysqli_query($conn, $delete_listing);
        $success_msg[] = 'listing deleted successfully!';
    } else {
        $warning_msg[] = 'listing deleted already!';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my listings</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/main.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="my-listings">

        <center>
            <h1 class="heading">My Listings</h1>
        </center>

        <div class="box-container">

            <?php
            $total_images = 0;
            $select_products = "SELECT * FROM `products` WHERE id = '$user_id'";
            $select_products_query = mysqli_query($conn, $select_products);
            if (mysqli_num_rows($select_products_query) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products_query)) {

                    $products_id = $fetch_products['id'];

                    if (!empty($fetch_products['image_02'])) {
                        $image_coutn_02 = 1;
                    } else {
                        $image_coutn_02 = 0;
                    }
                    if (!empty($fetch_products['image_03'])) {
                        $image_coutn_03 = 1;
                    } else {
                        $image_coutn_03 = 0;
                    }
                    if (!empty($fetch_products['image_04'])) {
                        $image_coutn_04 = 1;
                    } else {
                        $image_coutn_04 = 0;
                    }
                    if (!empty($fetch_products['image_05'])) {
                        $image_coutn_05 = 1;
                    } else {
                        $image_coutn_05 = 0;
                    }

                    $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

                    ?>
            <form accept="" method="POST" class="box">
                <input type="hidden" name="products_id" value="<?= $products_id; ?>">
                <div class="thumb">
                    <p><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
                    <img src="uploaded_files/<?= $fetch_products['image_01']; ?>" alt="">
                </div>
                <div class="price"><i class="fas fa-indian-rupee-sign"></i><span><?= $fetch_products['price']; ?></span>
                </div>
                <h4 class="name">
                    <?= $fetch_products['Product_name']; ?>
                </h4>
                <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_products['address']; ?></span></p>
                <div class="flex-btn">
                    <a class="btn btn-dark" href="update_products.php?get_id=<?= $products_id; ?>"
                        class="btn">update</a>
                    <input type="submit" name="delete" value="delete" class="btn btn-dark"
                        onclick="return confirm('delete this listing?');">
                </div>
                <a class="btn btn-dark" href="view_products.php?get_id=<?= $products_id; ?>" class="btn">view
                    products</a>
            </form>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet! <a href="post.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
            }
            ?>

        </div>

    </section>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>