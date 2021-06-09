<?php
class Nba extends Dbh{

    public function teams()
    {
        $sql = "SELECT * FROM team";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll())
        {
            return $result;
        }
    }

    public function players()
    {
        $sql = "SELECT * FROM roster";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll())
        {
            return $result;
        }
    }

    public function player($id)
    {
        $sql = "SELECT r.name AS player_name, t.name AS full_team_name, pt.age AS age, r.number AS player_number, r.pos AS position, CONCAT(ROUND((pt.3pt/pt.3pt_attempted)*100), '%') AS 3_pointers_made_percent, pt.3pt AS number_of_3_pointers_made
        FROM roster AS r INNER JOIN team AS t ON r.team_code = t.code INNER JOIN player_totals AS pt ON r.id = pt.player_id WHERE pt.player_id = ? AND pt.3pt <> 0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

}