<?php
    //Sessie
    $title = "Uitgelogd | ";
    session_start();
    //include
?>
<!-- Geef bericht weer -->
<div id="login">
    <h2>Je bent uitgelogd!</h2>
    <a href="../index.php" class="formlink">Klik hier om terug te keren naar de inlog pagina.</a>
</div> 
<?php
    //Beeindig sessie
	unset($_SESSION['user']);
    unset($_SESSION['error']);
	session_destroy();
    //Sluit document af
?>