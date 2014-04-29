<?php

/* validate that user cookie is set to the correct value */
if ( !isset($_COOKIE['user']) || $_COOKIE['user'] !== 'loggedin' ) {

        header("Location: login.php?message=". urlencode("You must login to enter protected area"));
        exit;

} //if

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome to protected area!</h1>
    </body>
</html>
