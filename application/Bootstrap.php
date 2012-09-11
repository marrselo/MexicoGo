<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    public function __construct($app) {
        parent::__construct($app);
        $this->bootstrap('multidb'); /* ejecuta un recurso */
        $db = $this->getPluginResource('multidb')/* obtiene el recurso multidb */
                ->getDb('db'); /* obtiene los datos del recurso */
        Zend_Db_Table::setDefaultAdapter($db); /* registra el adaptador */
        Zend_Registry::set('db', $db); /* registra la clase adaptadora */
        $this->getResourceLoader()->addResourceType('entity', 'entitys/', 'Entity');
        $this->getResourceLoader()->addResourceType('service', 'services/', 'Service');
        $response = new Zend_Controller_Response_Http();
        $response->setHeader('Content-Type', 'text/html; charset=utf-8')
                ->setHeader('Accept-Encoding', 'gzip, deflate')
                ->setHeader('Expires', 'max-age=' . 20, true)
                ->setHeader('Cache-Control', 'private', 'must-revalidate')
                ->setHeader('Pragma', 'no-cache', true);
        $response->sendResponse(); 
        
        require_once APPLICATION_PATH . '/../library/phpthumbs/ThumbLib.inc.php';

    }
    
   
    public function _initRouter() {
        
        $frontController = Zend_Controller_Front::getInstance();
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/route.ini');
        $router = $frontController->getRouter();
        $router->addConfig($config, 'routes');
        //------------Url Amigables Front-------------------------------//
        //Contact
        $route = new Zend_Controller_Router_Route_Regex('contact.html',
          array(
          'action' => 'contact',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('contact', $route); 
        //The Magazine
        $route = new Zend_Controller_Router_Route_Regex('magazine.html',
          array(
          'action' => 'magazine',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('magazine', $route);
        //The Magazine Subscribe
        $route = new Zend_Controller_Router_Route_Regex('magazine-subscribe.html',
          array(
          'action' => 'magazinesubscribe',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('magazinesubs', $route);
        //Advance Search
        $route = new Zend_Controller_Router_Route_Regex('advance-search.html',
          array(
          'action' => 'advancesearch',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('advancesearch', $route);
        //Map Search
        $route = new Zend_Controller_Router_Route_Regex('map-search.html',
          array(
          'action' => 'searchmap',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('mapsearch', $route);
        //Partners
        $route = new Zend_Controller_Router_Route_Regex('partners([A-Za-z\-\.]*)',
          array(
          'action' => 'partners',
          'controller' => 'Index',
          'module' => 'default'
          ),
            array(
                1 => 'cat'
            ));
        $router->addRoute('partners', $route);
        //Agents Details
        $route = new Zend_Controller_Router_Route_Regex('agent-details.html([A-Za-z\/\-{0-9}]*)',
          array(
          'action' => 'agentdetail',
          'controller' => 'Index',
          'module' => 'default'
          ),
        array(
            1 => 'agent'
        ));
        $router->addRoute('agentdetail', $route);
        //Agent Results
        $route = new Zend_Controller_Router_Route_Regex('404.html',
          array(
          'action' => 'error',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('error', $route);
        //Agent Results
        $route = new Zend_Controller_Router_Route_Regex('agent-search.html',
          array(
          'action' => 'agentsearch',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('agentsearch', $route);
        //Closing Cost
        $route = new Zend_Controller_Router_Route_Regex('closing-cost.html',
          array(
          'action' => 'closingcost',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('closingcost', $route);
        //------------Url Amigables Partners----------------------------------//
        //News
        $route = new Zend_Controller_Router_Route_Regex('partners/news.html',
          array(
          'action' => 'news',
          'controller' => 'Front',
          'module' => 'partner'
          ));
        $router->addRoute('news_part', $route); 
        //Login
        $route = new Zend_Controller_Router_Route_Regex('partners/login.html',
          array(
          'action' => 'index',
          'controller' => 'Login',
          'module' => 'partner'
          ));
        $router->addRoute('login_part', $route); 
        //Marketing Services
        $route = new Zend_Controller_Router_Route_Regex('partners/marketing-services.html',
          array(
          'action' => 'mservices',
          'controller' => 'Front',
          'module' => 'partner'
          ));
        $router->addRoute('mservices_part', $route); 
        //Account Settings
        $route = new Zend_Controller_Router_Route_Regex('account-settings.html',
          array(
          'action' => 'account',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('accountset', $route); 
        //Profile Page
        $route = new Zend_Controller_Router_Route_Regex('profile-page.html',
          array(
          'action' => 'index',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('profilepage', $route); 
        //Real Estate Listings
        $route = new Zend_Controller_Router_Route_Regex('real-estate-listings.html',
          array(
          'action' => 'realestate',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('realestate', $route); 
         //Reset Password
        $route = new Zend_Controller_Router_Route_Regex('reset-password.html',
          array(
          'action' => 'resetpassword',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('resetpassword', $route);
        //Sign up Now
        $route = new Zend_Controller_Router_Route_Regex('sign-up-now.html',
          array(
          'action' => 'signupnow',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('login', $route);
        //The Magazine
        $route = new Zend_Controller_Router_Route_Regex('partners/online-magazine.html',
          array(
          'action' => 'magazine',
          'controller' => 'Front',
          'module' => 'partner'
          ));
        $router->addRoute('magazine_part', $route);
        //Registry Partners step 1
        $route = new Zend_Controller_Router_Route_Regex('partners/sign-up.html',
          array(
          'action' => 'index',
          'controller' => 'Inscription',
          'module' => 'partner'
          ));
        $router->addRoute('sign_up_part', $route);
        //Registry Partners step 1
        $route = new Zend_Controller_Router_Route_Regex('partners/registry-partners-step-1.html',
          array(
          'action' => 'create-account',
          'controller' => 'Inscription',
          'module' => 'partner'
          ));
        $router->addRoute('registry1', $route);
        //Registry Partners step 2
        $route = new Zend_Controller_Router_Route_Regex('partners/registry-partners-step-2.html',
          array(
          'action' => 'plans',
          'controller' => 'single-agent',
          'module' => 'partner'
          ));
        $router->addRoute('registry2', $route);
        //Registry Partners step 3
        $route = new Zend_Controller_Router_Route_Regex('partners/registry-partners-step-3.html',
          array(
          'action' => 'plan-details',
          'controller' => 'single-agent',
          'module' => 'partner'
          ));
        $router->addRoute('registry3', $route);
        //Registry Partners step 4
        $route = new Zend_Controller_Router_Route_Regex('partners/registry-partners-step-4.html',
          array(
          'action' => 'payment-details',
          'controller' => 'single-agent',
          'module' => 'partner'
          ));
        $router->addRoute('registry4', $route);
        //Registry Partners step 5
        $route = new Zend_Controller_Router_Route_Regex('partners/registry-partners-step-5.html',
          array(
          'action' => 'registry5',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('registry5', $route);
    }    
    

}

