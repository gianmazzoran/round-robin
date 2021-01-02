<?php

require_once('./inc/RoundRobin.php');

$tournament = new RoundRobin;
$teams = [
    'Team-A',
    'Team-B',
    'Team-C',
    'Team-D',
    'Team-E',
    'Team-F',
    'Team-G',
    'Team-H',
    'Team-I',
    'Team-L',
    'Team-M',
    'Team-N',
    'Team-O',
    'Team-P',
    'Team-Q',
    'Team-R',
    'Team-S',
    'Team-T',
];

$matches = $tournament->generate($teams);

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
    <pre>
        <?php print_r($matches); ?>
    </pre>
</body>

</html>