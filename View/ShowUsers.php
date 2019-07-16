<?php

namespace View;

class ShowUsers {
    public function render($user){
        //echo "Name: " . $user->name . PHP_EOL;
        //echo "Surname: ". $user->surname . PHP_EOL;
        echo "Name: " . $user['name'] . PHP_EOL;
        echo "Surname: ". $user['surname'] . PHP_EOL;
    }
}