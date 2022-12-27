<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
//        if (! static::runningInSail()) {
//            static::startChromeDriver();
//        }
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $username = env('LT_USERNAME');
        $access_key = env('LT_ACCESS_KEY');
        $url = "https://".$username.":".$access_key."@hub.lambdatest.com/wd/hub";

        $capabilities = array(
            "browserName" => "Chrome",
            "browserVersion" => "108.0",
            "LT:Options" => array(
                "username" => "ls1372",
                "accessKey" => "q63IXLmuDXeuwX2I8jhwDt0jqTViaPZvevyz2VXmSrGlb1zKjb",
                "video" => true,
                "platformName" => "Windows 10",
                "project" => "WaterAmerica",
                "tunnel" => true,
                "w3c" => true,
                "plugin" => "php-lavarel"
            )
        );

        return RemoteWebDriver::create($url,$capabilities);
    }
}
