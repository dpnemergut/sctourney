<?php

class NewTournamentController extends Controller {

    public function index() {
        $this->_view->set('title', 'New Tournament');
        
        return $this->_view->output();
    }
    
    public function save() {
        if (!isset($_POST['tournamentFormSubmit'])) {
            header('Location: /newtournament/index');
        }
        
        $errors = array();
        $check = true;
        
        $tournamentName = isset($_POST['tournament_name']) ? trim($_POST['tournament_name']) : "";
        $tournamentDate = isset($_POST['tournament_date']) ? trim($_POST['tournament_date']) : "";
        
        if (empty($tournamentName)) {
            $check = false;
            array_push($errors, "Name is required.");
        }
        
        if (empty($tournamentDate)) {
            $check = false;
            array_push($errors, "Date is required.");
        }
        
        if (!$check) {
            $this->_setView('index');
            $this->_view->set('title', 'Invalid form data');
            $this->_view->set('errors', $errors);
            $this->_view->set('formData', $_POST);
            
            return $this->_view->output();
        }
        
        try {
            $newTournament = new TournamentModel();
            $newTournament->setTournamentName($tournamentName);
            $newTournament->setTournamentDate($tournamentDate);
            $newTournament->store();
            
            $this->_setView('success');
            $this->_view->set('title', 'Store success.');
            
            $data = array(
                'tournamentName' => $tournamentName,
                'tournamentDate' => $tournamentDate
            );
            
            $this->_view->set('userData', $data);
            
        } catch (Exception $e) {
            $this->_setView('index');
            $this->_view->set('title', 'There was an error creating the tournament.');
            $this->_view->set('formData', $_POST);
            $this->_view->set('saveError', $e->getMessage());
        }
        
        return $this->_view->output();
    }

}

