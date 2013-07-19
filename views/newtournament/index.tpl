<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>

        <h1><?php echo $title; ?></h1>
        
        <?php
            if (isset($errors)) {
                echo '<ul>';
                foreach ($errors as $e) {
                    echo '<li>' . $e . '</li>';
                }
                echo '</ul>';
            }
            
            if (isset($saveError)) {
                echo '<h2>Error saving the new tournament, please try again.</h2>' . $saveError;
            }
        ?>
        
        <form name="newTournamentForm" action="/newtournament/save" method="post">
            
            <p>
                <label for="tournament_name">Tournament Name</label>
                <input value="<?php if(isset($formData)) echo $formData['tournament_name']; ?>" type="text" id="tournament_name" name="tournament_name" required /> *
            </p>
            
            <p>
                <label for="tournament_date">Tournament Date</label>
                <input value="<?php if(isset($formData)) echo $formData['tournament_date']; ?>" type="text" id="tournament_date" name="tournament_date" placeholder="2013-12-25" required /> *
            </p>
            
            <input type="submit" name="tournamentFormSubmit" value="Send" />
        </form>

<?php include HOME . DS . 'includes' . DS . 'footer.inc.php'; ?>

