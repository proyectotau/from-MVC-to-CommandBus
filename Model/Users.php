<?php

namespace Model;

class Users {
    private $data = [
        1 => [
          'name' => 'Adam',
          'surname' => 'Adler',
        ],
        2 => [
            'name' => 'Beth',
            'surname' => 'Bethler',
        ],
        3 => [
            'name' => 'Charly',
            'surname' => 'Chardler',
        ],
    ];

    public function all(){
        return $this->data;
    }

    public function find($id){
        return $this->data[$id];
    }

    /*public function __get($property){
        return $this->data[$property];
    }*/
}