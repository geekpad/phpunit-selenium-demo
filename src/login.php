<?php

$message = isset($_GET['message']) ? $_GET['message'] : '';

/* Validate login if POST has values */
if (count($_POST) > 0) {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($login === 'test' &&  $password === 'test') {
        /* login successful set cookie and redirect to protected area */
        setcookie('user', 'loggedin');
        header("Location: index.php");
        exit;
    } else {
        $message = "Invalid username or password.";
    } //if
} //if

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHPUnit and Selenium Demo - Login page</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <form class="login" method="POST">
            <h1>Login Page</h1>
            <div class="intro box">
                <p>This is a demo page for the article <a href="http://geekpad.ca/blog/post/automating-browser-testing-with-phpunit-and-selenium" target="_blank">Integration Tests Using PHPUnit and Selenium</a></p>
                <p>Use <strong>test</strong> for login and <strong>test</strong> for password to authenticate.</p>
            </div>
            <?php if (strlen($message) > 0): ?>
            <div class="message box"><?php echo htmlspecialchars($message, ENT_QUOTES); ?></div>
            <?php endif; ?>
            <div>
                <label for="login">Login</label>
                <input type="text" id="login" name="login" value="" placeholder="enter login">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="">
            </div>

            <input type="submit" value="login">
        </form>
    </body>
</html>
