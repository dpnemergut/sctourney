<?php

class TournamentModel extends Model {

    private $_tournamentName;
    private $_tournamentDate;
    
    public function getTournamentName() {
        return $this->_tournamentName;
    }
    
    public function setTournamentName($tournamentName) {
        $this->_tournamentName = $tournamentName;
    }
    
    public function getTournamentDate() {
        return $this->_tournamentDate;
    }
    
    public function setTournamentDate($tournamentDate) {
        $this->_tournamentDate = $tournamentDate;
    }

    public function getTournaments() {
        $sql = "SELECT
                    t.Tournament_id,
                    t.Tournament_name,
                    t.Tournament_date
                FROM
                    Tournaments t
                ORDER BY
                    t.Tournament_date ASC";
                    
        $this->_setSql($sql);
        $tournaments = $this->getAll();
        
        if (empty($tournaments)) {
            return false;
        }
        
        return $tournaments;
    }
    
    public function getTournamentById($id) {
        $sql = "SELECT
                    t.Tournament_name,
                    t.Tournament_date
                FROM
                    Tournaments t
                WHERE
                    t.Tournament_id = ?";
                    
        $this->_setSql($sql);
        $tournamentDetails = $this->getRow(array($id));
        
        if (empty($tournamentDetails)) {
            return false;
        }
        
        return $tournamentDetails;
    }
    
    public function store() {
        $sql = "INSERT INTO Tournaments
                    (Tournament_name, Tournament_date)
                VALUES
                    (?, ?)";

        $data = array(
            $this->_tournamentName,
            $this->_tournamentDate
        );
        
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }

}

