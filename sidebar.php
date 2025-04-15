
<div class="sidebar">
    <aside>
        <ul>
            <li>
                    <form action="searchResults.php" method = "POST">
                        <input required type="search" name="search" id="sidebar-search" placeholder="Search By Author..."><br><br>
                        <input type="submit" value="Search" name="sidebar-submit" id="submit">
                    </form>
            </li>
            <li><h3>Categories</h3></li>
            <li><a href="web-dev.php">Web Development</a></li>
            <li><a href="#">Technology</a></li>
            <li><a href="#">Lifestyle</a></li>
            <li><h3>Recent Posts</h3></li>
            <?php
            require 'config.php';
            $conn = mysqli_connect($server,$user,$pass,$db_name);
            if(!$conn){
                die('CONNECTION ERROR: ' . mysqli_connect_error());
            }else{
                $sql = 'select title from blog';
                $result = mysqli_query($conn,$sql);
                $titles = mysqli_fetch_all($result); 
            ?>
            <li><a href="#recent-posts"><?=$titles[0][0];?></a></li>
            <?php } ?>
        </ul>
    </aside>
</div>