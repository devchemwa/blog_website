<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>

<body>
    <?php include 'navbar.php'; ?>
    <?php
    require 'config.php';
    $conn = mysqli_connect(hostname: $server, username: $user, password: $pass, database: $db_name);
    if ($conn == false) {
        print ('Connection Error: ' . mysqli_connect_error());
    } else {
        if (isset($_POST['sidebar-submit'])) {
            $search = htmlspecialchars(string: $_POST['search']);
            $query = "select title, author, content from blog where author = '$search';";
            $results = mysqli_query(mysql: $conn, query: $query);
            $blogs = mysqli_fetch_all(result: $results);
            if ($blogs == true) {
                for ($i = 0; $i < count(value: $blogs); $i++) { ?>
                    <div class="blog-details">
                        <div class="searchResults">
                        <p><b><?= $blogs[$i][0]; ?></b></p>
                        <p><i><?=$blogs[$i][1]; ?></i></p>
                        <p><?=$blogs[$i][2];?></p>
                        </div>
                    </div>
                    <?php include 'footer.php'; ?>
                </body>
                </html>
<?php }
            } else {
                echo "No Records Found" . "<br>";
            }
        }
    }
    mysqli_free_result(result: $results);
    mysqli_close(mysql: $conn);
?>