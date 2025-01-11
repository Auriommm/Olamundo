<header>
    <h1>Hotel</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <li><a href=".php"></a></li>
                <li><a href="logout.php">Sair</a></li>
            <?php 
            }
            ?>
        
        </ul>
    </nav>
</header>