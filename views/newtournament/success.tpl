<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>

        <h1><?php echo $title; ?></h1>
        <h2>New Tournament Created:</h2>
        
        <h3>Tournament Name</h3>
        <p><?php echo $userData['tournamentName']; ?></p>
        
        <h3>Tournament Date</h3>
        <p><?php echo $userData['tournamentDate']; ?></p>

<?php include HOME . DS . 'includes' . DS . 'footer.inc.php'; ?>

