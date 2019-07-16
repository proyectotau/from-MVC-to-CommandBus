<?php

namespace View;

class ListUsers {
    public function render($users){
        echo 'Full Names' . PHP_EOL;
        foreach ($users as $user){
            //echo $user->name . ' ' . $user->surname . PHP_EOL;
            echo $user['name'] . ' ' . $user['surname'] . PHP_EOL;
        }
    }
}