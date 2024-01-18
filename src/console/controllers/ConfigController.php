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
        if( $this->hasSourceFile() )
        {
            if( !$this->hasDestinationFile() )
            {
                $this->publishFile();
            }
            else
            {
                $this->line( "Config file already exists.", "error" );
                if( $this->confirm("Do you want to overwrite it?") )
                {
                    $this->publishFile();
                }
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

    /*
     * Publish File
     */
    private function publishFile()
    {
        if( copy( $this->getSourceFile(), $this->getDestinationFile() ) )
        {
            $this->line( "Config file published to config/cookie-consent.php", "success" );
        }
        else
        {
            $this->line( "There was an unknown error publishing the config file", "error" );
        }
    }

    /*
     * Get Source
     */
    private function getSourceFile()
    {
        return __DIR__ . "/../../config/cookie-consent.php";
    }

    /*
     * Get Destination
     */
    private function getDestinationFile()
    {
        return Craft::$app->getPath()->getConfigPath() . '/cookie-consent.php';
    }

    /*
     * Has Source File
     */
    private function hasSourceFile()
    {
        return file_exists( $this->getSourceFile() );
    }

    /*
     * Has Destination File
     */
    private function hasDestinationFile()
    {
        return file_exists( $this->getDestinationFile() );
    }
    
}