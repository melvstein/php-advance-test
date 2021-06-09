<?php

/**
 * Use this file to output reports required for the SQL Query Design test.
 * An example is provided below. You can use the `asTable` method to pass your query result to,
 * to output it as a styled HTML table.
 */

$database = 'nba2019';
require_once('vendor/autoload.php');
require_once('include/utils.php');

/*
 * Example Query
 * -------------
 * Retrieve all team codes & names
 */
echo '<h1>Example Query</h1>';
$teamSql = "SELECT * FROM team";
$teamResult = query($teamSql);
// dd($teamResult);
echo asTable($teamResult);

/*
 * Report 1
 * --------
 * Produce a query that reports on the best 3pt shooters in the database that are older than 30 years old. Only 
 * retrieve data for players who have shot 3-pointers at greater accuracy than 35%.
 * 
 * Retrieve
 *  - Player name
 *  - Full team name
 *  - Age
 *  - Player number
 *  - Position
 *  - 3-pointers made %
 *  - Number of 3-pointers made 
 *
 * Rank the data by the players with the best % accuracy first.
 */
echo '<h1>Report 1 - Best 3pt Shooters</h1>';
// write your query here
$best3pShooters = "SELECT r.name AS player_name, t.name AS full_team_name, pt.age AS Age, r.number AS player_number, r.pos AS position, CONCAT(ROUND((pt.3pt/pt.3pt_attempted)*100), '%') AS 3_pointers_made_percent, pt.3pt AS number_of_3_pointers_made
                    FROM roster AS r INNER JOIN team AS t ON r.team_code = t.code INNER JOIN player_totals AS pt ON r.id = pt.player_id WHERE pt.age > 30 AND pt.3pt <> 0 AND ROUND((pt.3pt/pt.3pt_attempted)*100) > 35 ORDER BY 3_pointers_made_percent DESC";
$best3pShootersResult = query($best3pShooters);
echo asTable($best3pShootersResult);

/* dd($best3pShootersResult); */

/*
 * Report 2
 * --------
 * Produce a query that reports on the best 3pt shooting teams. Retrieve all teams in the database and list:
 *  - Team name
 *  - 3-pointer accuracy (as 2 decimal place percentage - e.g. 33.53%) for the team as a whole,
 *  - Total 3-pointers made by the team
 *  - # of contributing players - players that scored at least 1 x 3-pointer
 *  - of attempting player - players that attempted at least 1 x 3-point shot
 *  - total # of 3-point attempts made by players who failed to make a single 3-point shot.
 * 
 * You should be able to retrieve all data in a single query, without subqueries.
 * Put the most accurate 3pt teams first.
 */
echo '<h1>Report 2 - Best 3pt Shooting Teams</h1>';
// write your query here
$best3pShootersTeam = "SELECT t.name AS team_name, CONCAT(ROUND((SUM(pt.3pt)/SUM(pt.3pt_attempted))*100, 2), '%') AS 3_pointer_accuracy, SUM(pt.3pt) AS 3_point_made_by_the_team, CASE WHEN pt.3pt <> 0 THEN COUNT(pt.3pt) END AS number_of_contributing_players, CASE WHEN pt.3pt_attempted <> 0 THEN COUNT(pt.3pt_attempted) END AS number_of_attempting_players, CASE WHEN pt.3pt = 0 AND pt.3pt_attempted >= 1 THEN COUNT(pt.3pt_attempted) ELSE 0 END AS total_number_of_3point_attempts_made_by_players_who_failed_to_make_a_single_3point_shot
                        FROM roster AS r INNER JOIN team AS t ON r.team_code = t.code INNER JOIN player_totals AS pt ON r.id = pt.player_id GROUP BY team_name ORDER BY 3_pointer_accuracy DESC";
$best3pShootersTeamResult = query($best3pShootersTeam);
//dd($best3pShootersTeamResult);
echo asTable($best3pShootersTeamResult);

?>