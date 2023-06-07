<?php include "config.php";

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
 }else{
    $user_id = '';
    header('location:login.php');
 }
 
 if(isset($_POST['post'])){
 
    $id = create_unique_id();
    $Product_name = $_POST['Product_name'];
    $Product_name = filter_var($Product_name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);
    $address = $_POST['address'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $category = $_POST['category'];
    $category = filter_var($category, FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);
 
    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
    $image_02_ext = pathinfo($image_02, PATHINFO_EXTENSION);
    $rename_image_02 = create_unique_id().'.'.$image_02_ext;
    $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
    $image_02_size = $_FILES['image_02']['size'];
    $image_02_folder = 'uploaded_files/'.$rename_image_02;
 
    if(!empty($image_02)){
       if($image_02_size > 2000000){
          $warning_msg[] = 'image 02 size is too large!';
       }else{
          move_uploaded_file($image_02_tmp_name, $image_02_folder);
       }
    }else{
       $rename_image_02 = '';
    }
 
    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
    $image_03_ext = pathinfo($image_03, PATHINFO_EXTENSION);
    $rename_image_03 = create_unique_id().'.'.$image_03_ext;
    $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
    $image_03_size = $_FILES['image_03']['size'];
    $image_03_folder = 'uploaded_files/'.$rename_image_03;
 
    if(!empty($image_03)){
       if($image_03_size > 2000000){
          $warning_msg[] = 'image 03 size is too large!';
       }else{
          move_uploaded_file($image_03_tmp_name, $image_03_folder);
       }
    }else{
       $rename_image_03 = '';
    }
 
    $image_04 = $_FILES['image_04']['name'];
    $image_04 = filter_var($image_04, FILTER_SANITIZE_STRING);
    $image_04_ext = pathinfo($image_04, PATHINFO_EXTENSION);
    $rename_image_04 = create_unique_id().'.'.$image_04_ext;
    $image_04_tmp_name = $_FILES['image_04']['tmp_name'];
    $image_04_size = $_FILES['image_04']['size'];
    $image_04_folder = 'uploaded_files/'.$rename_image_04;
 
    if(!empty($image_04)){
       if($image_04_size > 2000000){
          $warning_msg[] = 'image 04 size is too large!';
       }else{
          move_uploaded_file($image_04_tmp_name, $image_04_folder);
       }
    }else{
       $rename_image_04 = '';
    }
 
    $image_05 = $_FILES['image_05']['name'];
    $image_05 = filter_var($image_05, FILTER_SANITIZE_STRING);
    $image_05_ext = pathinfo($image_05, PATHINFO_EXTENSION);
    $rename_image_05 = create_unique_id().'.'.$image_05_ext;
    $image_05_tmp_name = $_FILES['image_05']['tmp_name'];
    $image_05_size = $_FILES['image_05']['size'];
    $image_05_folder = 'uploaded_files/'.$rename_image_05;
 
    if(!empty($image_05)){
       if($image_05_size > 2000000){
          $warning_msg[] = 'image 05 size is too large!';
       }else{
          move_uploaded_file($image_05_tmp_name, $image_05_folder);
       }
    }else{
       $rename_image_05 = '';
    }
 
    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_01_ext = pathinfo($image_01, PATHINFO_EXTENSION);
    $rename_image_01 = create_unique_id().'.'.$image_01_ext;
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_size = $_FILES['image_01']['size'];
    $image_01_folder = 'uploaded_files/'.$rename_image_01;
 
    if($image_01_size > 2000000){
       $warning_msg[] = 'image 01 size too large!';
    }else{
       $insert_Product = "INSERT INTO `temporary_products`(id, pid, Product_name, address, price, category, image_01, image_02, image_03, image_04, image_05, description) VALUES('$user_id','$id','$Product_name', '$address', $price, '$category', '$rename_image_01', '$rename_image_02', '$rename_image_03', '$rename_image_04', '$rename_image_05', '$description')"; 
       $insert_Product= mysqli_query($conn,$insert_Product);
       move_uploaded_file($image_01_tmp_name, $image_01_folder);
       $success_msg[] = 'Product posted successfully!';
    }
 
 }

?>

<!DOCtype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <title>Post</title>
</head>

<body>
    <?php include "Header.php"?>
    <section class="Product-form">

        <form action="" method="POST" enctype="multipart/form-data" style="">
            <h3>Product details</h3>
            <hr>
            <div class="box">
                <p>Product name <span>*</span></p>
                <input type="text" name="Product_name" required maxlength="50" placeholder="Enter Product name"
                    class="input">
            </div>
            <div class="flex">
                <div class="box">
                    <p>Product price <span>*</span></p>
                    <input type="number" name="price" required min="0" max="9999999999" maxlength="10"
                        placeholder="Enter Product price" class="input">
                </div>
                <div class="box">
                    <p>Seller address <span>*</span></p>
                    <input type="text" name="address" required maxlength="100" placeholder="Enter Product full address"
                        class="input">
                </div>
                <div class="box">
                    <p>Category <span>*</span></p>
                    <select name="category" required class="input">
                        <option value="electronics">Electronics</option>
                        <option value="furniture">Furniture</option>
                        <option value="homeDecor">Home Decor</option>
                        <option value="clothing">Clothing and Accessories</option>
                        <option value="beautyproducts">Beauty and Personal Care</option>
                        <option value="babyproducts">Kids and Baby</option>
                        <option value="outdoor products">Outdoor and Recreation</option>
                        <option value="sustainableresources">Sustainable Living Resources</option>
                    </select>
                </div>
                <div class="box">
                    <p>Product description <span>*</span></p>
                    <textarea name="description" maxlength="1000" class="input" required cols="30" rows="10"
                        placeholder="Write about Product..."></textarea>
                </div>
                <div class="box">
                    <p>image 01 <span>*</span></p>
                    <input type="file" name="image_01" class="input input_img" accept="image/*" required>
                </div>
                <div class="flex">
                    <div class="box">
                        <p>image 02</p>
                        <input type="file" name="image_02" class="input input_img" accept="image/*">
                    </div>
                    <div class="box">
                        <p>image 03</p>
                        <input type="file" name="image_03" class="input input_img" accept="image/*">
                    </div>
                    <div class="box">
                        <p>image 04</p>
                        <input type="file" name="image_04" class="input input_img" accept="image/*">
                    </div>
                    <div class="box">
                        <p>image 05</p>
                        <input type="file" name="image_05" class="input input_img" accept="image/*">
                    </div>
                </div>
            </div>
            <!-- <input type="submit" value="post Product" class="btn" name="post"> -->
            <button type="submit" class="btn btn-dark" name="post">Post Product</button>
        </form>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 

</body>

</html>