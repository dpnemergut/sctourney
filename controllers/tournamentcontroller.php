<?php

class TournamentController extends Controller {

    public function __construct($model, $action) {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }
    
    public function index() {
        try {
            $tournaments = $this->_model->getTournaments();
            $this->_view->set('tournaments', $tournaments);
            $this->_view->set('title', 'Tournaments from the DB');
            
            return $this->_view->output();
            
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    
    public function details($tournamentId) {
        try {
            $tournament = $this->_model->getTournamentById((int)$tournamentId);
            
            if ($tournament) {
                $this->_view->set('title', $tournament['Tournament_name']);
                $this->_view->set('tournamentBody', $tournament['Tournament_name']);
                $this->_view->set('tournamentDate', $tournament['Tournament_date']);
            } else {
                $this->_view->set('title', 'Invalid tournament ID');
                $this->_view->set('noTournament', true);
            }
            
            return $this->_view->output();
            
        } catch (Exception $e) {
            echo "Application error: " . $e->getMessage();
        }
        
    }

}

