<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "sql_insert_users";
        ?>
        <div class="mt-4 p-5 bg-primary text-white rounded">
            <h1 class="display-4">Database management system</h1>
            <p class="lead">Revision 2.0</p>
        </div>
        <nav class="navbar navbar-expand-sm bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" target="_blank">Add user</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/phpmyadmin/index.php" target="_blank">phpMyAdmin</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mt-3">
            <div class="d-flex justify-content-center mb-3">
                <?php
                    $connection = mysqli_connect($servername, $username, $password, $dbname);

                     if(!$connection){
                        die("Connection failed: " . mysqli_connect_error());
                        echo '<div class="alert alert-danger w-25 m-4 justify-content-center"><b>Fail!</b> Connection failed</div>';
                    } else{
                        echo '<div class="alert alert-success w-25 m-4 justify-content-center"><b>Success!</b> Connected to database</div>'; 
                    }

                    mysqli_close($connection);
                ?>
            </div>
        </div>
       
    </body>
</html>