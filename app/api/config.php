<?php
    $a = ['casa', 'carro', 'moto', 'jagual', 'jaguar', 'limosine', 'limonada', 'cachorro', 'gato', 'casinha', "sweet", "daddy", 'eye'];
    $b = $_REQUEST;

    $hint = "";

    if ($b) {
        foreach ($i as $a) {
            $hint += "The name of the things is " + $a[array_rand($a)];
        }
    }
    return $hint;
?>