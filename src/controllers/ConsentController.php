<?php
namespace jordanbeattie\cookieconsent\controllers;

use Craft;
use craft\web\Controller;

class ConsentController extends Controller
{

    protected array|bool|int $allowAnonymous = true;

    /*
     * Default - Save form submission
     */
    public function actionIndex()
    {

        // Ensure the request is a POST request
        $this->requirePostRequest();

        // Get the input
        $request = Craft::$app->getRequest();
        $analyticsToggle = $request->getBodyParam('analyticsToggle');
        $adToggle = $request->getBodyParam('adToggle');

        // Set cookies
        $this->setCookies( $analyticsToggle, $adToggle );

        // Tell page to refresh or not
        $shouldRefresh = $analyticsToggle || $adToggle;

        // Output the 'necessaryToggle' value
        return $this->asJson([
            'refresh' => $shouldRefresh
        ]);

    }
    
    /*
     * Accept all
     */
    public function actionAcceptAll()
    {
        
        $this->requirePostRequest();

        $this->setCookies( true, true );

        return $this->asJson([
            'refresh' => true
        ]);

    }

    /*
     * Set Cookies
     */
    public function setCookies( $analytics, $advertisement )
    {
        setcookie( 'cookieconsent', json_encode([
            'analytics' => $analytics ? true : false, 
            'advertisement' => $advertisement ? true : false
        ]), [
            'path' => '/'
        ]);   
    }

}
