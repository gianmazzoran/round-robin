<?php
    class RoundRobin {
        function generate(array $teams = [], bool $shuffle = false) {

            if (count($teams) % 2 != 0) {
                array_push($teams, "BYE");
            }

            if ($shuffle) {
                shuffle($teams);
            }
            
            $number_of_teams = count($teams);
            $rounds = $number_of_teams - 1;

            for ($i=0; $i < $number_of_teams / 2; $i++) { 
                $team1[$i] = $teams[$i];
                $team2[$i] = $teams[$number_of_teams - 1 - $i];
            }

            for ($i = 0; $i < $rounds; $i++) {
                /* stampa le partite di questa giornata */
                echo '<br />'.($i+1).'a Round<br />';
        
                /* alterna le partite in team1 e fuori */
                if (($i % 2) == 0) 
                {
                    for ($j = 0; $j < $number_of_teams / 2 ; $j++) {
                        echo ' '.$team2[$j].' - '.$team1[$j].'<br />';
                    }
                }
                else {
                    for ($j = 0; $j < $number_of_teams / 2 ; $j++) 
                    {
                        echo ' '.$team1[$j].' - '.$team2[$j].'<br />';
                    }
                        
                }
        
                // Ruota in gli elementi delle liste, tenendo fisso il primo elemento
                // Salva l'elemento fisso
                $pivot = $team1[0];
        
                /* sposta in avanti gli elementi di "team2" inserendo 
                all'inizio l'elemento team1[1] e salva l'elemento uscente in "riporto" */
                array_unshift($team2, $team1[1]);
                $riporto = array_pop($team2);

                /* sposta a sinistra gli elementi di "team1" inserendo all'ultimo 
                posto l'elemento "riporto" */
                array_shift($team1);
                array_push($team1, $riporto);
        
                // ripristina l'elemento fisso
                $team1[0] = $pivot ;
            } 
        }

        function generate_rounds(array $teams = [], bool $shuffle = false, int $team_per_rounds = 4) {

            if (count($teams) % $team_per_rounds != 0) {
                array_push($teams, "BYE");
                if (count($teams) % $team_per_rounds != 0) {
                    for ($i=0; $i < count($teams) % $team_per_rounds; $i++) { 
                        array_push($teams, "BYE");
                    }
                }   
            }

            if ($shuffle) {
                shuffle($teams);
            }
            
            $number_of_teams = count($teams);
            $number_of_rounds = $number_of_teams - 1;

            $rounds = array_chunk($teams, $team_per_rounds);
            $rounds_with_match = [];

            $team2 = array_splice($teams,(count($teams)/2));
            $team1 = $teams;

            print_r($team1);
            print_r($team2);

            foreach($rounds as $round) {
                for ($i=0; $i < $team_per_rounds; $i++) { 
                    // The actual scheduling based on round robin
                    for ($i=0; $i < count($team1)+count($team2)-1; $i++){
                        for ($j=0; $j<count($team1); $j++){
                            print_r($round[$i]);
                            // $round[$i][$j]["team1"]=$team1[$j];
                            // $round[$i][$j]["team2"]=$team2[$j];
                        }
                        // Check if total numbers of teams is > 2 otherwise shifting the arrays is not neccesary
                        if(count($team1)+count($team2)-1 > 2){
                            $array_splice = array_splice($team1,1,1);
                            array_unshift($team2,array_shift($array_splice));
                            array_push($team1,array_pop($team2));
                        }
                    }
                }
            }

            print_r($rounds);
        }
    }
?>