<?php include("server.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head> </head>
<body>
<iframe name="votar" style="display:none;"></iframe>
<form action="tip.php" method="post" target="votar">
    <input type="submit" value="Skicka Tips">
    <input type="hidden" name="ad_id" value="2">            
</form>
</body>
</html>

