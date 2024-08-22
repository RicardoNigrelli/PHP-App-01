<?php

declare(strict_types=1);

class SuperHero {
    // promoted properties -> PHP 8
    public function __construct(readonly public string $name, public array $powers, public string $planet)
    {}

    public function show_all() {
        return get_object_vars($this);
    }

    public function attack() {
        return "¡$this->name ataca con sus poderes!";
    }

    public function description() {
        $powers = implode (",", $this->powers);
        return "$this->name es un superhéroe que viene de $this->planet 
        y tiene los siguientes poderes: $powers";
    }
}

$hero = new SuperHero("Superman", ["Superfuerza", "super calzones rojos", "rayos laser"], "Krypton");

echo $hero->description()


?>