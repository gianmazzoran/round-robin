<?php

class RoundRobin {
    function generate(array $teams = [], bool $shuffle = true, int $remainder = 4, string $filler = "BYE") {
        if (count($teams) % $remainder != 0){
            array_push($teams, $filler);
            if (count($teams) % $remainder != 0) {
                for ($i = 0; $i < count($teams) % $remainder; $i++) {
                    array_push($teams, $filler);
                }
            }
        }

        if ($shuffle) {
            shuffle($teams);
        }

        if (count($teams) / 2 <= 2) {
            $path = "winner:2";
        } else if (count($teams) / 2 <= 4) {
            $path = "winner:4";
        } elseif (count($teams) / 2 <= 8) {
            $path = "winner:8";
        } elseif (count($teams) / 2 <= 16) {
            $path = "winner:16";
        } elseif (count($teams) / 2 <= 32) {
            $path = "winner:32";
        }

        $team2 = array_splice($teams,(count($teams)/2));
        $team1 = $teams;
        for ($i=0; $i < count($team1)+count($team2) - 1; $i++) {
            for ($j=0; $j<count($team1); $j++) {
                $rounds["Round-" . ($i + 1)]["Match-" . ($j + 1)]["Team-1"] = ["Name" => $team1[$j], "Points" => 0, "path" => $path];
                $rounds["Round-" . ($i + 1)]["Match-" . ($j + 1)]["Team-2"] = ["Name" => $team2[$j], "Points" => 0, "path" => $path];
            }
            if(count($team1)+count($team2)-1 > 2) {
                $s = array_splice( $team1, 1, 1 );
                $slice = array_shift($s);
                array_unshift($team2,$slice);
                array_push( $team1, array_pop($team2));
            }
        }
        return $rounds;
    }

    function assignRandomPoints(array $rounds = []) {
        foreach ($rounds as &$round) {
            foreach ($round as &$match) {
                foreach ($match as &$team) {
                    $team['Points'] = rand(0, 3);
                }
                if ($match['Team-1']['Points'] === $match['Team-2']['Points']) {
;
                }
            }
        }
        return $rounds;
    }

    function detectWinner(array $rounds = []) {
        foreach ($rounds as $round) {
            # code...
        }
    }
}