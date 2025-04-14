<!DOCTYPE html>
<html lang="en">
 <?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<div class="admin-panel">
    <div class="admin-sidebar">
        <aside>
            <ul>
                <li><a href="#">Contacts</a></li>
                <li><a href="#new-post">New Blog Post</a></li>
                <li><a href="#">Manage Blogs</a></li>
            </ul>
        </aside>
        <div class="panel">
            <?php  
                        require 'config.php';
                        $conn = mysqli_connect($server,$user, $pass, $db_name);
                        if(!$conn){
                            echo 'Connection Error: ' . mysqli_connect_error();
                        }else{
                        $sql = 'SELECT * FROM blog';
                        $result = mysqli_query($conn,$sql);
                        $blog = mysqli_fetch_assoc( $result ); 
            ?>
            <div class="admin-blog">
                <p><?=$blog['title']; ?></p>
                <p><?=$blog['author'];?></p>
                <p><?=$blog['content'];?></p>
                <p><?=$blog['created_at'];?></p>
            </div>
       <?php } ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>