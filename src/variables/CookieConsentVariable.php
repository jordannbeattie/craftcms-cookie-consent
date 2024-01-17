<?php

namespace jordanbeattie\cookieconsent\variables;

use Craft;
use Twig\Markup;

class CookieConsentVariable
{

    /*
     * Cookies have been set
     */
    public function hasSetPreferences()
    {
        return isset($_COOKIE['cookieconsent']);
    }

    /*
     * Get Consent
     */
    public function getConsent()
    {

        $properties = [];

        if( isset( $_COOKIE['cookieconsent'] ) )
        {

            $consentCookie = json_decode($_COOKIE['cookieconsent']);
            
            $properties = [
                'set' => true,
                'analytics' => $consentCookie->analytics,
                'advertisement' => $consentCookie->advertisement,
            ];

        }
        else 
        {
            $properties = [
                'set' => false,
                'analytics' => false,
                'advertisement' => false,
            ];
        }

        return $this->createObject( $properties );

    }

    /*
     * Get Config
     */
    public function getConfig()
    {
        $projectConfig = Craft::$app->config->getConfigFromFile('cookie-consent') ?? [];
        $defaultConfig = include __DIR__ . "/../config/cookie-consent.php" ?? [];
        return array_unique( array_merge( $defaultConfig, $projectConfig ), SORT_REGULAR );
    }

    /*
     * Create Object
     */
    private function createObject( $parameters = [] )
    {
        $obj = new \stdClass();
        foreach( $parameters as $key => $val )
        {
            $obj->$key = $val;
        }
        return $obj;
    }

}
