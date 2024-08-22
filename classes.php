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

    public static function random () {
        $names = ["Thor", "Spiderman", "wolverine", "Ironman"];
        $powers = [
        ["Superfuerza", "Volar"], 
        ["Volar", "Agilidad"],
        ["Agilidad", "Cambio de tamaño"],
        ["Cambio de tamaño", "Superfuerza"] ];
        $planets = ["Asgard", "Tierra", "Krypton"];

        $name = $names[array_rand($names)];
        $power = $powers[array_rand($powers)];
        $planet = $planets[array_rand($planets)];

        // echo "El Superhéroe elegido es $name, que vienene de $planet y tiene los siguientes poderes: " . implode(",", $power);

        return new self($name, $power, $planet);
    }
}

//instanciar
// $hero = new SuperHero("Superman", ["Superfuerza", "super calzones rojos", "rayos laser"], "Krypton");
// echo $hero->description(); //Método publico

//Método estático
$hero = SuperHero::random();
echo $hero->description();
?>