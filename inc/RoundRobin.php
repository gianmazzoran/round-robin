<?php
    class RoundRobin {
        function validate_teams($teams) {
            // Check if number of teams is even, if not add team "BYE" as placeholder
            if (count($teams) % 2 != 0) {
                array_push($teams, 'BYE');
            }

            return $teams;
        }

        // Determine number of rounds based on number of teams
        function generate_rounds($teams = array(), bool $shuffle = true) {
            
            // Shuffle teams by default
            if ($shuffle) {
                shuffle($teams);
            }

            $number_of_teams = count($teams);
            $number_of_team_per_rounds = ceil($number_of_teams / 2);

            // Check if number of teams per round are greater than 1, if not return the teams without modificaions
            if ($number_of_team_per_rounds > 1) {

                // Check if teams are more than 8, if so fix the amount of teams per round to 4
                if ($number_of_team_per_rounds > 4) {
                    $number_of_team_per_rounds = 4;
                }

                // Divide the teams in rounds
                $number_of_rounds = array_chunk($teams, $number_of_team_per_rounds, true);
            } else {
                $number_of_rounds = $teams;
            }

            // TODO: create the match for each round
            $team1 = [];
            $team2 = [];

            print_r($number_of_rounds);
        }
    }
?>