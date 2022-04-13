<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <style>
            .error{
                color:red;
            }
        </style>
    </head>
    <body>
        <?php
        /* Server credentials */
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "sql_insert_users";

            $connection = mysqli_connect($servername, $username, $password, $dbname);

        /* Check for connection to the DB */
            if(!$connection){
                die("Connection failed: " . mysqli_connect_error());
                echo '<div class="alert alert-danger w-25 m-4 justify-content-center"><b>Fail!</b> Database connection failed</div>';
            } else{
                echo '<div class="alert alert-success w-25 m-4 justify-content-center"><b>Success!</b> Connected to database</div>'; 

            }

        /* Function trimming unnecessary data from the inputs */
            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

        /* Initalize variables, check if all inputs are full */
            $name = $email = $nameErr = $emailErr = "";

            $sql = "INSERT INTO php_users (name, email) VALUES ('$_POST[name]', '$_POST[email]')";

            function sql_insert($connection, $sql){
                if(mysqli_query($connection, $sql)){
                    echo '<div class="alert alert-success w-25 m-4 justify-content-center"><b>Success!</b> New record created succesfully</div>'; 
                } else {
                    echo '<div class="alert alert-danger w-25 m-4 justify-content-center"><b>Error!</b> ' . $sql . '<br>' . mysqli_error($connection) . '</div>';
                }
            };
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["name"])){
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                }
    
                if(empty($_POST["email"])){
                    $emailErr = "E-mail is required";
                } else {
                    $email = test_input($_POST["email"]);
                }

                if(!empty($_POST["name"]) and !empty($_POST["email"])){
                    sql_insert($connection, $sql);
                } else {
                    echo '<div class="alert alert-danger w-25 m-4 justify-content-center"><b>Error!</b> All fields need to be filled</div>';
                }
            }
        
        /* MySQL Query */
            /*$sql = "INSERT INTO php_users (name, email) VALUES ('$_POST[name]', '$_POST[email]')";


            if(mysqli_query($connection, $sql)){
                echo '<div class="alert alert-success w-25 m-4 justify-content-center"><b>Success!</b> New record created succesfully</div>'; 
            } else {
                /* echo "Error: " . $sql . "<br>" . mysqli_error($connection); */
                /*echo '<div class="alert alert-danger w-25 m-4 justify-content-center"><b>Error!</b> ' . $sql . '<br>' . mysqli_error($connection) . '</div>';
            } */

            mysqli_close($connection);
        ?>
        <!--- main forms -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Name: <input type="text" name="name">
            <span class="error">* <?php echo $nameErr;?></span>
            E-mail: <input type="text" name="email">
            <span class="error">* <?php echo $emailErr;?></span>
            <br />
            <input type="submit" name="submit" value="Submit">
        </form>
        <!-- end of forms -->

    </body>
</html>