<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once('./inc/RoundRobin.php');
    $tournament = new RoundRobin;
    $members = [
        'team1',
        'team2',
        'team3',
        'team4',
        'team5',
        'team6',
        'team7',
        'team8',
        'team9',
        'team10',
        'team11',
        'team12',
        'team13',
        'team14',
        'team15',
    ];

    $members = $tournament->validate_teams($members);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<pre><?php $tournament->generate_rounds($members); ?></pre>
</body>
</html>