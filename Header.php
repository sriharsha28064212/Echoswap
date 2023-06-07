<div class="header">
    <div class="navbar">
    <a href="shop_main.php" style="text-decoration:None;color:black"><h4 class="mt-2">Echo Swap.</h4></a>
        <div class="search_main">
            <input type="text" class="form-control searchbox" placeholder="Search Products"
                aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div>
                <button class="btn btn-dark" type="button">Search</button>
            </div>
        </div>
        <a class="btn btn-dark btn-md post" href="post.php" role="button" style="width:100px">Post</a>
        <!-- <button type="button" class="btn btn-dark btn-md post" style="width:100px">Post</button> -->
        <div class="dropdown account">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php if($user_id != ''){ ?>
                <a class="dropdown-item" href="#">Profile</a>
                <a href="update.php" class="dropdown-item">update profile</a>
                <a href="listings.php" class="dropdown-item">My Listings</a>
                <a href="logout.php" class="dropdown-item"
                    onclick="return confirm('logout from this website?');">logout</a>
                <?php } 
                        else{ ?>
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="register.php">Register</a>
                <?php }?>

            </div>
        </div>
    </div>
</div>
<hr size="3" style="color:black">