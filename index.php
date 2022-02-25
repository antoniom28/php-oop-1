<?php

class Movie{
    public $name;
    private $genre = [];
    public $duration;
    public $overview;

    public function __construct($_name, $_genre,$_duration, $_overview){
        $this->name = $_name; 
        $this->genre = $_genre; 
        $this->convert_duration($_duration);
        $this->overview = $_overview; 
    }

    public function getGenre($movie){
        $genre_str = "";
        foreach($movie->genre as $gen){
            $genre_str .= " {$gen}";
        }
        return  $genre_str;
    }

    public function convert_duration($_duration){
        if($_duration <= 0){
            $this->duration = "Error";
            return;
        }
        $temp = 0;
        while($_duration - 60 >= 0){
            $_duration -= 60;
            $temp++;
        }
        if($temp > 0){
            if($_duration > 0)
                $this->duration = "{$temp} H e {$_duration} m";
            else
                $this->duration = "{$temp} H";
        } else
            $this->duration = "{$_duration} m";
    }
}

$movie_list = [
    new Movie('Spiderman',['Action', 'Adventure','Superhero'],120,'parla di sto tizio che ha la passione per i ragni'),
    new Movie('Inception',['Action', 'Drama','Science fiction'],133,'ti scoppierà il cervello'),
    new Movie('Annabelle',['Horror', 'Thriller','Mystery'],133,'PAURA??'),
    new Movie('Il Padrino',['Mafia', 'Crime film','Drama'],133,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, quidem? Voluptatibus ex mollitia eum quos repellat suscipit vel dignissimos voluptate, quisquam architecto maiores ipsum repellendus commodi accusantium unde maxime voluptatum!'),
];

//var_dump($movie_list);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>MOVIES</h2>
    <ul>
        <?php
            foreach($movie_list as $movie){
                echo '<li>'
                ."Name : {$movie->name} <br>"
                ."Genre : {$movie->getGenre($movie)} <br>"
                ."Duration : {$movie->duration} <br>"
                ."Overview : {$movie->overview} <br>"
                . '</li>';
            }
        ?>
    </ul>
    <style>
        h2{ text-align: center; }
        li{ 
            line-height: 1.3; 
            margin-bottom: 25px;
        }
    </style>
</body>
</html>
