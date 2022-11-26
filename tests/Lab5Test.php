<?php

require 'vendor\autoload.php';

use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Exception\UnknownErrorException;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class Lab5Test extends TestCase
{
    protected ChromeDriver $driver;

    public function build_chrome_capabilities(): DesiredCapabilities
    {
        return DesiredCapabilities::chrome();
    }

    public function setUp(): void
    {
        putenv('WEBDRIVER_CHROME_DRIVER=C:\bin\chromedriver.exe');
        $this->driver = ChromeDriver::start();
    }

    public function tearDown(): void
    {
        $this->driver->quit();
    }

    //with sleep
    /**
     * @throws UnknownErrorException
     */
    public function login()
    {
        $this->driver->get("https://shikimori.one/");
        $this->driver->manage()->window()->maximize();
        $element = $this->driver->findElement(WebDriverBy::cssSelector('a.menu-icon.sign_in'));
        if ($element) {
            $element->click();
//            sleep(2);
        }
        $element = $this->driver->findElement(WebDriverBy::cssSelector('a.b-oauth_token.b-tooltipped.vkontakte'));
        if ($element) {
            $element->click();
//            sleep(2);
        }
        $element = $this->driver->findElement(WebDriverBy::cssSelector('input:nth-child(7)'));
        if ($element) {
            $element->sendKeys("79646397009");
//            sleep(1);
        }
        $element = $this->driver->findElement(WebDriverBy::cssSelector('input:nth-child(9)'));
        if ($element) {
            $element->sendKeys("E2my-0ziy");
//            sleep(20);
        }
        $element = $this->driver->findElement(WebDriverBy::id('install_allow'));
        if ($element) {
            $element->click();
            sleep(20);
        }
    }


    //without sleep
    /**
     * @throws UnknownErrorException
     */
    /*public function login()
    {
        $this->driver->get("https://shikimori.one/");
        $this->driver->manage()->window()->maximize();
        $element = $this->driver->findElement(WebDriverBy::cssSelector('a.menu-icon.sign_in'));
        if ($element) {
            $element->click();
            //sleep(1);
        }
        $element = $this->driver->findElement(WebDriverBy::cssSelector('a.b-oauth_token.b-tooltipped.vkontakte'));
        if ($element) {
            $element->click();
            //sleep(1);
        }
        $element = $this->driver->findElement(WebDriverBy::cssSelector('input:nth-child(7)'));
        if ($element) {
            $element->sendKeys("79646397009");
            //sleep(1);
        }
        $element = $this->driver->findElement(WebDriverBy::cssSelector('input:nth-child(9)'));
        if ($element) {
            $element->sendKeys("E2my-0ziy");
            //sleep(1);
        }
        $element = $this->driver->findElement(WebDriverBy::id('install_allow'));
        if ($element) {
            $element->click();
            //sleep(1);
        }
    }*/

    /**
     * @throws UnknownErrorException
     */
    public function testLogging()
    {
        $this->login();
        $element = $this->driver->findElement(WebDriverBy::className("nickname"));
        $this->assertEquals('pashgunn', $element->getText());
    }

    /**
     * @throws UnknownErrorException
     */
    /*public function testSearch()
    {
        $finder = "#dashboards_show > header > div.global-search > label > input";
        $naruto = "#dashboards_show > header > div.global-search > div > div > a:nth-child(1) > div.info > div.name > span";
        $name = "#animes_show > section > div:nth-child(1) > header > h1";

        $this->login();

        $element = $this->driver->findElement(WebDriverBy::cssSelector("$finder"));
        if($element) {
            $element->sendKeys("Наруто");
            sleep(2);
        }

        $element = $this->driver->findElement(WebDriverBy::cssSelector("$naruto"));
        if($element) {
            $element->click();
            sleep(2);
        }

        $element = $this->driver->findElement(WebDriverBy::cssSelector("$name"));
        $this->assertEquals("Наруто / Naruto", $element->getText());
    }*/

    /**
     * @throws UnknownErrorException
     */
    public function testComment()
    {
        $menu = "#dashboards_show > header > div.menu-dropdown.profile > span > a";
        $viewed = "#profiles_show > section > div:nth-child(1) > div.profile-head > div.c-info > div > div.b-stats_bar.anime > div.stat_names > div:nth-child(3) > a";
        $search = "#user_rates_index > section > div:nth-child(1) > div > div.menu-slide-outer.x199 > div > div > div.b-collection_search > div > input";
        $contains = "#user_rates_index > section > div:nth-child(1) > div > div.menu-slide-outer.x199 > div > div > div.list-groups > table > tbody";

        $this->login();
        sleep(4);

        $element = $this->driver->findElement(WebDriverBy::cssSelector("$menu"));
        if($element) {
            $element->click();
            sleep(2);
        }

        $element = $this->driver->findElement(WebDriverBy::cssSelector("$viewed"));
        if($element) {
            $element->click();
            sleep(2);
        }

        $element = $this->driver->findElement(WebDriverBy::cssSelector("$search"));
        if($element) {
            $element->sendKeys("Наруто");
            sleep(2);
        }

        $element = $this->driver->findElement(WebDriverBy::cssSelector("$contains"));
        if($element) {
            $element->getText();
            sleep(2);
        }

        if ($element) {
            $this->assertTrue((bool)$element->getText());
        }
    }


}