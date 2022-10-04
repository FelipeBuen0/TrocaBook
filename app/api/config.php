<?php
    // $a = ['casa', 'carro', 'moto', 'jagual', 'jaguar', 'limosine', 'limonada', 'cachorro', 'gato', 'casinha', "sweet", "daddy", 'eye'];
    $b = $_REQUEST;

    $arr = array(1, 2, 3, 4);
    foreach ($arr as &$value) {
        $value = $value * 2;
    }
    // foreach ($a as $res) {
    //     $res = "The name of the things is " . $a[array_rand($a)];
    // }

    return "Results:" . $value;
?>