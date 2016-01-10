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
           $game->display();
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
            function display() {
                echo '<table cols=”3” style=”fontsize:large; fontweight:bold”>';
                echo '<tr>'; // open the first row
                for ($pos=0; $pos<9;$pos++) {
                    echo $this->show_cell($pos);
                    if ($pos %3 == 2) echo '</tr><tr>'; // start a new row for the next square
                }
                echo '</tr>'; // close the last row
                echo '</table>';
            }
            function show_cell($which) {
                $token = $this->position[$which];
                // deal with the easy case
                if ($token <> '')
                return '<td>'.$token.'</td>';
                // now the hard case
                $this->newposition = $this->position; // copy the original
                $this->newposition[$which] = 'o'; // this would be their move
                $move = implode($this->newposition); // make a string from the board array
                $link = '/?board='.$move; // this is what we want the link to be
                // so return a cell containing an anchor and showing a hyphen
                return '<td><a href=”'.$link.'”>-</a></td>';
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
