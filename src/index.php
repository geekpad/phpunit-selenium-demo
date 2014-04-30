<?php


/* validate that user cookie is set to the correct value */
if ( !isset($_COOKIE['user']) || $_COOKIE['user'] !== 'loggedin' ) {

    header("location: login.php?message=". urlencode("You must login to enter protected area!"));
    exit;

} //if


/* check if logout flag was set */
if (isset($_GET['logout'])) {
    setcookie("user","", (time() - 86400));
    $_COOKIE['user'] = null;
    unset($_COOKIE['user']);

    header("location: login.php?message=". urlencode("You have been successfully logged out."));
    exit;
} //if

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHPUnit and Selenium Demo - index page</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <h1>Welcome to protected area!</h1>
        <div class="intro box">
            <p>This is a demo page for the article <a href="http://geekpad.ca/blog/post/automating-browser-testing-with-phpunit-and-selenium" target="_blank">Integration Tests Using PHPUnit and Selenium</a></p>
            <p>If you see this page you have logged in successfully.  A cookie named user has been set and simulates your authentication.</p>
        </div>
        <a href="?logout">logout</a>
    </body>
</html>
