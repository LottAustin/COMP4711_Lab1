<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $squares = $_GET['board'];
           $game = new Game($squares);
            if ($game->winner('x'))
                echo 'You win. Lucky guesses!';
            else if ($game->winner('o'))
                echo 'I win. Muahahahaha';
            else
                echo 'No winner yet, but you are losing.';
        ?>
    </body>
</html>

<?php       
        class Game {
            var $position;
            function __construct($squares) {
                $this->position = str_split($squares);
            }
            function winner($token) {
                $won = false;
                for($row=0; $row<3; $row++) {
                    $won = true;
                    for($col=0; $col<3; $col++) {
                        if ($this->position[3*$row+$col] != $token) { $won = false; }
                        //note the negative test
                    }
                    if($won == true) {
                        return $won;
                    }
                    $won = true;
                    for($col=0; $col<3; $col++) {
                        if ($this->position[3*$col+$row] != $token) { $won = false; }
                    } 
                    if($won == true) {
                        return $won;
                    }
                }
                if(($this->position[0] == $token) &&
                ($this->position[4] == $token) &&
                ($this->position[8] == $token)) {
                    $won = true;
                } else if(($this->position[0] == $token) &&
                ($this->position[4] == $token) &&
                ($this->position[8] == $token)) {
                    $won = true;
                }
                return $won;
            }
        }
