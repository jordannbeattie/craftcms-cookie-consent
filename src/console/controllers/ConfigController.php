<?php

namespace jordanbeattie\cookieconsent\console\controllers;

use Craft;
use craft\console\Controller;
use craft\helpers\Console;
use yii\console\ExitCode;

class ConfigController extends Controller
{
    
    public $defaultAction = 'run';

    public function actionRun(): int
    {
        
        /* Template */
        $source = __DIR__ . "/../../config/cookie-consent.php";

        /* Project config file */
        $destination = Craft::$app->getPath()->getConfigPath() . '/cookie-consent.php'; 

        /* Copy template to config directory */
        if( file_exists( $source ) )
        {
            if( !file_exists( $destination ) )
            {
                copy( $source, $destination );
                $this->line( "Config file published to config/cookie-consent.php", "success" );
            }
            else
            {
                $this->line( "Config file already exists.", "error" );
            }
        }
        else
        {
            $this->line( "There was an error.", "error" );
        }

        return $this->end();

    }

    /*
     * Output
     */
    private function line( $message, $type = null )
    {

        
        switch( $type )
        {
            case "success":
                $type = Console::FG_GREEN;
                break;

            case "warning":
                $type = Console::FG_YELLOW;
                break;

            case "error":
                $type = Console::FG_RED;
                break;

            default:
                $type = null;
                break;
        }

        $this->stdout( 
            $message . PHP_EOL, 
            $type
        );
    }

    /*
     * End Command
     */
    private function end()
    {
        return ExitCode::OK;
    }
    
}