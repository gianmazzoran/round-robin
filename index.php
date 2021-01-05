<?php

require_once('./inc/RoundRobin.php');

$tournament = new RoundRobin;
$teams = [
    'Team-A',
    'Team-B',
    'Team-C',
    'Team-D',
];

$matches = $tournament->generate($teams);
$matches = $tournament->assignRandomPoints($matches);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <h1>Teams</h1>
    <pre>
        <?php print_r($teams); ?>
    </pre>
    <h1>Rounds</h1>
    <pre>
        <?php
            print_r($matches);
        ?>
    </pre>
</body>

</html>