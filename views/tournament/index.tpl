<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>

        <h1>Tournaments</h1>
        
        <?php
            if ($tournaments):
            foreach ($tournaments as $t): ?>
        
            <article>
                <header>
                    <h1><a href="/tournament/details/<?php echo $t['Tournament_id']; ?>"<?php echo $t['title']; ?>></a></h1>
                    <p>Tournament date: <?php echo $t['Tournament_date']; ?></p>
                </header>
                <p><?php echo $t['Tournament_name']; ?></p>
                <p><a href="/tournament/details/<?php echo $t['Tournament_id']; ?>">Continue</a></p>
            </article>
            
        <?php
            endforeach;
            else: ?>
        
            <h1>Welcome!</h1>
            <p>We currently have no tournaments.</p>
            
        <?php endif; ?>
        
<?php include HOME . DS . 'includes' . DS . 'footer.inc.php'; ?>

