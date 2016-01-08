<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
           $position = $_GET['board'];
           $squares = str_split($position);
        
           if (winner('x',$squares)) echo 'You win.';
            else if (winner('o',$squares)) echo 'I win.';
            else echo 'No winner yet.';
        ?>
    </body>
</html>

<?php       
            function winner($token,$position) {
                $won = false;
                for($row=0; $row<3; $row++) {
                    $won = true;
                    for($col=0; $col<3; $col++) {
                        if ($position[3*$row+$col] != $token) { $won = false; }
                        //note the negative test
                    }
                    if($won == true) {
                        return $won;
                    }
                    $won = true;
                    for($col=0; $col<3; $col++) {
                        if ($position[3*$col+$row] != $token) { $won = false; }
                    } 
                    if($won == true) {
                        return $won;
                    }
                }
                if(($position[0] == $token) &&
                ($position[4] == $token) &&
                ($position[8] == $token)) {
                    $won = true;
                } else if(($position[0] == $token) &&
                ($position[4] == $token) &&
                ($position[8] == $token)) {
                    $won = true;
                }
                return $won;
            }
