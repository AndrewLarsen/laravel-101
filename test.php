<?php

// konstruktør = din start metode
// destruktør = din stopp metode

// string       = vanlig tekst, eks. "abc123";
// integer      = heltall, eks. $tall = 123; $tall = "123a";
// boolean      = true/false
// double/float = desimaler
// array        = kan ses på som en liste, hvor hver liste har en inngangsnøkkel
// objekter     = er en startet klasse

class Dog extends Animal
{
    public function __construct($name, $length, $height) {
        parent::construct($name, $length, $height);
    }
}

class Animal
{
    private $name;
    private $length;
    private $height;

    public function __construct($name, $length, $height) {
        $this->name = $name;
        $this->length = $length;
        $this->height = $height;
    }

    public function getName() {
        return $this->name;
    }

    public function getLength() {
        return $this->length;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getSize() {
        return array(
            'length' => $this->getLength(),
            'height' => $this->getHeight(),
        );
    }

    public function is1m() {
        return ($this->length === 100 ? true : false);
    }
}

$noeKult = new Animal('Fredrik', 100, 75);

//var_dump($noeKult->is1m());

$test1 = 1;
$test2 = 4;

$test3 = ($test1 + $test2);

if ($test3 == 5) {
    echo 'true';
} else {
    echo 'false';
}

?>
