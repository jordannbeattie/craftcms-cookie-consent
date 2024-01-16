<?php

namespace jordanbeattie\gtmconsent;

use Craft;
use craft\base\Plugin;
use craft\events\RegisterTemplateRootsEvent;
use craft\web\twig\variables\CraftVariable;
use craft\web\View;
use jordanbeattie\gtmconsent\variables\GtmConsentVariable;
use yii\base\Event;

class GtmConsent extends Plugin
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
                $variable->set('gtmConsent', GtmConsentVariable::class);
            }
        );

        /*
         * Templates
         */
        Event::on(
            View::class,
            View::EVENT_REGISTER_SITE_TEMPLATE_ROOTS,
            function( RegisterTemplateRootsEvent $event ){
                $event->roots['gtm-consent'] = __DIR__ . '/templates';
            }
        );

        Craft::$app->onInit(function() {
            
            $this->setComponents([
                'config' => [
                    'class' => 'craft\services\Config', 
                    'defaultConfig' => include __DIR__ . '/config/gtm-consent.php'
                ]
            ]);
            
        });
        
    }

}
