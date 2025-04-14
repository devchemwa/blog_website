<div class="admin-panel">
    <div class="admin-sidebar">
        <aside>
            <ul>
                <li><a href="view-contacts.php">Contacts</a></li>
                <li><a href="new-post.php">New Blog Post</a></li>
                <li><a href="blog-manager.php">Manage Blogs</a></li>
            </ul>
        </aside>
    </div>
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