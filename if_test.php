<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
            function if_check($a, $b){
                if($a and $b == 5){
                    echo "same";
                } else {
                    echo "not the same";
                }
            }

            if_check(5, 5);
        ?>
    </body>
</html>