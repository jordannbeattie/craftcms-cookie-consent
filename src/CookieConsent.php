<?php

namespace jordanbeattie\cookieconsent;

use Craft;
use craft\base\Plugin;
use craft\events\RegisterTemplateRootsEvent;
use craft\web\twig\variables\CraftVariable;
use craft\web\View;
use jordanbeattie\cookieconsent\variables\CookieConsentVariable;
use yii\base\Event;

class CookieConsent extends Plugin
{
    
    /*
     * Variables
     */
    public static $plugin;
    
    public function init()
    {
        
        /*
         * Initiate parent
         */
        parent::init();

        /*
         * Set plugin variable
         */
        self::$plugin = $this;
        
        /*
         * Twig variable
         */
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function( Event $event ){
                $variable = $event->sender;
                $variable->set('cookieConsent', CookieConsentVariable::class);
            }
        );

        /*
         * Templates
         */
        Event::on(
            View::class,
            View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
            function( RegisterTemplateRootsEvent $event ){
                $event->roots['cookie-consent'] = __DIR__ . '/templates';
            }
        );

        Craft::$app->onInit(function() {
            
            $this->setComponents([
                'config' => [
                    'class' => 'craft\services\Config', 
                    'defaultConfig' => include __DIR__ . '/config/cookie-consent.php'
                ]
            ]);
            
        });

        Craft::$app->getView()->hook('cookie-consent', function(array &$context) {
            return Craft::$app->getView()->renderTemplate(
                'cookie-consent/popup', // Path to your template
                $context // Pass context to the template
            );
        });
        
    }

}
