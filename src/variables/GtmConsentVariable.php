<?php

namespace jordanbeattie\gtmconsent\variables;

use Craft;
use Twig\Markup;

class GtmConsentVariable
{

    /*
     * Render Form
     */
    public function render()
    {

        // Get the template content as a string
        $content = Craft::$app->getView()->renderTemplate( 
            'gtm-consent/popup', 
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
        return isset($_COOKIE['gtmconsent']);
    }

    /*
     * Get Consent
     */
    public function getConsent()
    {

        if( isset( $_COOKIE['gtmconsent'] ) )
        {

            $consentCookie = json_decode($_COOKIE['gtmconsent']);
            
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

}
