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

}
