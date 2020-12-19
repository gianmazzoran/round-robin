<?php
class RoundRobin
{
    /**
     * Check number of teams and compare to $team_per_rounds to fill empty spots
     * 
     * @param array $teams An array of teams
     * 
     * @param int $team_per_rounds Number of teams for each rounds
     * 
     * @param string $filler String containing the filler name (ex. BYE)
     * 
     * @param bool $shuffle Whether to shuffle the teams before generating the schedule, default is false
     * 
     * @return array An array of teams divided in rounds.
     */
    function generate_rounds(array $teams = [], bool $shuffle = false, int $team_per_rounds = 4, string $filler = "BYE")
    {

        // Add $filler to $teams
        if (count($teams) % $team_per_rounds != 0) {
            array_push($teams, $filler);
            if (count($teams) % $team_per_rounds != 0) {
                for ($i = 0; $i < count($teams) % $team_per_rounds; $i++) {
                    array_push($teams, $filler);
                }
            }
        }


        // If true shuffle teams otherwise seed
        if ($shuffle) {
            shuffle($teams);
        }

        // Get number of rounds based on number of teams - 1
        $number_of_rounds = count($teams) - 1;

        // Divide teams in ruonds based on $team_per_rounds
        $rounds = array_chunk($teams, $team_per_rounds);

        // Split $teams in two arrays: $team1 (home) and $team2 (away)
        for ($i = 0; $i < count($teams) / 2; $i++) {
            $team1[$i] = $teams[$i];
            $team2[$i] = $teams[count($teams) - 1 - $i];
        }

        print_r($rounds);
    }

    /**
     * Check number of teams and compare to $team_per_rounds to fill empty spots
     * 
     * @param int $number_of_teams Number of teams
     * 
     * @param array $filler Array containing the filler (ex. BYE)
     * 
     * @return array An array of teams.
     */
    function generate(int $number_of_teams = 4, int $team_per_rounds = 4, bool $shuffle = true, array $filler = ["name" => "BYE", "points" => 0])
    {
        $teams = [];

        for ($i = 1; $i < $number_of_teams + 1; $i++) {
            array_push($teams, ['name' => 'Team-' . $i, 'points' => 0]);
        }

        if (count($teams) % $team_per_rounds != 0) {
            array_push($teams, $filler);
            if (count($teams) % $team_per_rounds != 0) {
                for ($i = 0; $i < count($teams) % $team_per_rounds; $i++) {
                    array_push($teams, $filler);
                }
            }
        }

        if ($shuffle) {
            shuffle($teams);
        }

        return $teams;
    }

    /**
     * Generate matches
     * 
     * @param array $teams An array containing team info
     * 
     * @return array An array containing all the matches
     */
    function generate_matches(array $teams = [])
    {
        $number_of_teams = count($teams);

        $matches = [];

        for ($i = 0; $i < $number_of_teams; $i++) {

            for ($j = 0; $j < $number_of_teams; $j++) {

                if ($teams[$i] != $teams[$j]) {
                    array_push($matches, ["Team1" => $teams[$i], "Team2" => $teams[$j]]);
                }
            }
        }

        print_r($matches);
        return $matches;
    }
}
