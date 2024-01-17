<?php

namespace jordanbeattie\cookieconsent\variables;

use Craft;
use Twig\Markup;

class CookieConsentVariable
{

    /*
     * Render Form
     */
    public function render()
    {

        // Get the template content as a string
        $content = Craft::$app->getView()->renderTemplate( 
            'cookie-consent/popup', 
            []
        );

        // Render the template content as raw string
        return new Markup($content, Craft::$app->charset);
    }

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

        if( isset( $_COOKIE['cookieconsent'] ) )
        {

            $consentCookie = json_decode($_COOKIE['cookieconsent']);
            
            return [
                'set' => true,
                'analytics' => $consentCookie->analytics,
                'advertisement' => $consentCookie->advertisement,
            ];

        }

        return [
            'set' => false,
            'analytics' => false,
            'advertisement' => false,
        ];

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

}
