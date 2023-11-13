<header>
    <div class="head">
        <span class = "span1">
        <img class ="logo" src="img/b.png" alt="company logo" width="100px">
        </span>
        <nav class = "nav">
        <a href="home.php"><strong>Home</strong></a>
        <a href="profile.php"><strong>Transactions</strong></a>
        <a href="accact.php"><strong>Accounts</strong></a>
        <a href="utilities.php"><strong>Services</strong></a>
        <a href="others.php"><strong>Contact</strong></a>
        </nav>
        <span class = "span">
        
        
        <button id="notifications_b" class= "aa">&#128276;</button>
        
        <span id="notificationCounter"><?php echo getNotificationCount(); ?></span>
        <script>updateNotificationCount(<?php  echo getNotificationCount(); ?>);</script>
        <?php
        function getNotificationCount() 
        {
            $counter=0;
            include "notificationdisp.php";
            if ($nresult->num_rows > 0)
            { while ($row = $nresult->fetch_assoc()) {$counter ++;  }}
            return $counter;
        }
        ?>
        <button id="settings" class= "aa">&#9881;</button>
        <button class= "ab"><a href="logout.php">Log out</a></button>
        </span>
    </div>
</header>
