<div class="back-ground" id="fix">
    <div class="navbar">
        <div class="navbar-container">
            <a href="index.php" style="text-decoration:None;color:black">
                <h1 id="title_main">EchoSwap.</h1>
            </a>
            <div class="search_box_wrapper search_main">
                <div class="search_box_item search_box_item_1">
                    <form action="" method="post">
                        <div class="search_box">
                            <input type="text" class="input_search" placeholder="Search products" name="searchTerm" />
                            <span class="icon">
                                <ion-icon name="search-outline" class="i"></ion-icon>
                            </span>
                        </div>
                        <button type="submit" name="search">Search</button>
                    </form>
                </div>
            </div>&nbsp;
            <nav class="nav-links">
                <a href="shop_main.php" class="mr-6 links clicked">Shop Now</a>
                <a href="index.php#Resources" class="mr-6 links clicked">Resources</a>
                <a href="#fotr-Footer" class="mr-6 links clicked">Contact us</a>

            </nav>
            <a href="chat.php" class="mr-6 links clicked"><i class="fa-sharp fa-regular fa-comments fa-2xl"></i></a>
            <div class="nav-click">
                <div class="nav-buttons">
                    <a role="button" class="button-nav btn btn-outline-dark post" href="post.php">
                        Post Product
                    </a>
                    <div class="dropdown account">
                        <button class="btn btn btn-outline-darkbtn-secondary dropdown-toggle" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php if ($user_id != '') { ?>
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <a href="update.php" class="dropdown-item">Update profile</a>
                                <a href="listings.php" class="dropdown-item">My Listings</a>
                                <a href="logout.php" class="dropdown-item"
                                    onclick="return confirm('logout from this website?');">Logout</a>
                            <?php } else { ?>
                                <a class="dropdown-item" href="login.php">Login</a>
                                <a class="dropdown-item" href="register.php">Register</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>