<?php
/**
 * Integration tests for login functionality
 */
class LoginTest extends PHPUnit_Extensions_Selenium2TestCase
{

    /**
     * Defines which browsers are going to be tested
     * @var array
     */
    public static $browsers = array(
        array(
            "name" => "Chrome",
            "browserName" => "chrome",
        ),
        array(
            "name" => "Internet Exprlorer",
            "browserName" => "iexplore",
        ),
        array(
            "name" => "Firefox",
            "browserName" => "firefox",
        ),
    );

    /**
     * setup will be run for all our tests
     */
    protected function setUp()  {
        $this->setBrowserUrl(PHPUNIT_TESTSUITE_EXTENSION_SELENIUM_BASEURL);
        $this->setHost(PHPUNIT_TESTSUITE_EXTENSION_SELENIUM_HOST);
    } // setUp()

    /**
     * Test that logins work
     *
     */
    public function testLoginSuccessful()  {

        $username = 'test';
        $password = 'test';

        $this->url("/login.php");
        $usernameInput = $this->byName("login");
        $usernameInput->clear();
        $this->keys($username);

        $usernameInput = $this->byName("password");
        $usernameInput->clear();
        $this->keys($password);

        $form = current($this->elements($this->using('css selector')->value('form.login')));
        $form->submit();

        /* Check for text on index page */
        $h1 = current($this->elements($this->using('css selector')->value('h1')));
        $this->assertEquals('Welcome to protected area!', $h1->text());

        /* Check that cookie user has been set */
        $authCookie = $this->cookie()->get('user');
        $this->assertEquals('loggedin', $authCookie);

    } // testLoginSuccessful()

} //LoginTest class
