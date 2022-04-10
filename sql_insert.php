<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            .error{
                color:red;
            }
        </style>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "sql_insert_users";

        $connection = mysqli_connect($servername, $username, $password, $dbname);

        if(!$connection){
            die("Connection failed: " . mysqli_connect_error()); 
        }
        echo("Connected succesfully"); 
        ?>

        <?php
        $name = $email = $gender = $nameErr = $emailErr = $genderErr = "";

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
            if(
                empty($_POST["gender"])){
                $genderErr = "Gender is required";
            } else {
                $gender = test_input($_POST["gender"]);
            }

        }

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <div id="naglowek"><h1>Database register system</h1></div>
        <div id="formularz">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Name: <input type="text" name="name">
                <span class="error">* <?php echo $nameErr;?></span>

                E-mail: <input type="text" name="email">
                <span class="error">* <?php echo $emailErr;?></span>

                Gender:
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
                <span class="error">* <?php echo $genderErr;?></span>

                <br />
                <input type="submit" name="submit" value="Submit">
        </div>

        <?php
        echo "<h2>Your name:</h2> $name"; 
        echo "<h2>Your E-mail:</h2> $email";
        echo "<h2>Your gender:</h2> $gender <br>";

        $sql_insert = "INSERT INTO php_users (name, email, gender) VALUES ('$_POST[name]', '$_POST[email]', '$_POST[gender]')";

        if(mysqli_query($connection, $sql_insert)){
            echo "New record created succesfully";
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($connection); 
        }

        mysqli_close($connection);
        ?>
    </body>
</html>