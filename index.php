<?php

require_once('./inc/RoundRobin.php');

$tournament = new RoundRobin;
$teams = $tournament->generate(4);
$matches = $tournament->generate_matches($teams);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nome team</th>
                <th>Punti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $team) { ?>
                <tr>
                    <td><?php echo $team['name']; ?></td>
                    <td><?php echo $team['points']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <section>
        <h1>Match</h1>
        <?php
        foreach ($matches as $match) {
            echo $match['Team1']['name'] . " VS " . $match["Team2"]['name'] . "<br><br>";
        }
        ?>
    </section>
</body>

</html>