<?php


use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Exception\UnknownErrorException;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class Lab5Test extends TestCase
{
    protected ChromeDriver $driver;


    public function setUp(): void
    {
        putenv('WEBDRIVER_CHROME_DRIVER=C:\bin\chromedriver.exe');
        $this->driver = ChromeDriver::start();
    }

    public function tearDown(): void
    {
        $this->driver->quit();
    }

    /**
     * @throws UnknownErrorException
     */
    public function login()
    {
        $this->driver->get("https://mail.yandex.ru/");
        $this->driver->manage()->window()->maximize();
        $signInToMail = '#root > div > div.PSHeader.PSHeader_theme_light.PSHeader_noCenter.Header_2LmwLn89QheMR2KyKhEGlR.PSHeader_LW3jBtGE8p_8DMgGbrX_v > div.PSHeader-Right > button'; //войти в почту
        $element = $this->driver->findElement(WebDriverBy::cssSelector("$signInToMail"));
        if ($element) {
            $element->click();
            sleep(1);
        }
        $inputLogin = '#passp-field-login'; // поле "Логин или email"
        $element = $this->driver->findElement(WebDriverBy::cssSelector("$inputLogin"));
        if ($element) {
            $element->sendKeys("pashgunn13");
            sleep(1);
        }
        $buttonLogin = '#passp\:sign-in'; // кнопка Войти
        $element = $this->driver->findElement(WebDriverBy::cssSelector("$buttonLogin"));
        if ($element) {
            $element->click();
            sleep(1);
        }
        $inputPassword = '#passp-field-passwd';
        $element = $this->driver->findElement(WebDriverBy::cssSelector("$inputPassword"));
        if ($element) {
            $element->sendKeys("p3L-Twg-3C5-FJB");
            sleep(1);
        }
        $element = $this->driver->findElement(WebDriverBy::cssSelector("$buttonLogin"));
        if ($element) {
            $element->click();
            sleep(1);
        }
        sleep(15);
    }

    /**
     * @throws UnknownErrorException
     */
/*    public function testLogging()
    {
        $this->login();
        sleep(5);
        $element = $this->driver->findElement(WebDriverBy::className('user-account__name'));
        $this->assertEquals('pashgunn13', $element->getText());
        sleep(5);
    }*/

    /**
     * @throws UnknownErrorException
     */
    public function testSearch()
    {
        $this->login();
        $element = $this->driver->findElement(WebDriverBy::cssSelector('#js-apps-container > div.ns-view-app.ns-view-id-65.mail-App.js-mail-App > div.mail-App-Content.js-mail-app-content > div > div.mail-Layout-Container > div > nav > div.ns-view-compose-buttons-box.ns-view-id-78 > div > div > div > a > span.ComposeButton-m__btnText--ZnUxS.ComposeButton-m__btnTextWithIcon--7mOA1'));
        $coordinates = $element->getCoordinates();
        $this->driver->getMouse()->mouseMove($coordinates,0,0)->click();
        sleep(5);
//        if($element) {
//            $element->sendKeys('w');
//            $element->getCoordinates();
//            $element->
//            sleep(2);
//        }

        $element = $this->driver->findElement(WebDriverBy::cssSelector("#compose-field-1"));
        if($element) {
            $element->click();
            sleep(2);
        }

        $element = $this->driver->findElement(WebDriverBy::cssSelector("body > div.Popup2.Popup2_visible.Popup2_target_anchor.Popup2_view_default.ComposeContactsSuggestDesktop.Theme.Theme_root_ps-light.Theme_color_ps-light > div > div.ComposeContactsList.ComposeContactsSuggestDesktop-List > div"));
        if($element) {
            $element->click();
            sleep(2);
        }

        $element = $this->driver->findElement(WebDriverBy::cssSelector("#js-apps-container > div.ns-view-app.ns-view-id-35.mail-App.js-mail-App > div.ns-view-compose-manager-container-box.ns-view-id-55.mail-ComposeManagerContainer_box > div > div > div:nth-child(5) > div > div > div > div.composeReact.ComposeManager-PopupCompose > div > div.composeReact__footer > div > div:nth-child(1) > div.new__root--3qgLa.qa-Compose-ControlPanelButton.ComposeControlPanel-Button.ComposeControlPanel-Button_new.ComposeControlPanel-SendButton.qa-Compose-SendButton.ComposeSendButton.ComposeSendButton_desktop > button"));
        if($element) {
            $element->click();
            sleep(2);
        }

        $element = $this->driver->findElement(WebDriverBy::className('ComposeDoneScreen-Title'));
        $this->assertEquals('Письмо отправлено', $element->getText());
        sleep(5);
    }

    /**
     * @throws UnknownErrorException
     */
    /*public function testComment()
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
    }*/


}