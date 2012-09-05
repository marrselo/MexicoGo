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
        //------------Url Amigables------------------------------------//
        //Contact
       /* $route = new Zend_Controller_Router_Route_Regex('news.html',
          array(
          'action' => 'news',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('contact', $route); 
        //Marketing Services
        $route = new Zend_Controller_Router_Route_Regex('marketing-services.html',
          array(
          'action' => 'mservices',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('mservices', $route); 
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
        $route = new Zend_Controller_Router_Route_Regex('magazine.html',
          array(
          'action' => 'magazine',
          'controller' => 'Index',
          'module' => 'default'
          ));
        $router->addRoute('magazine', $route);
        //Registry Partners step 1
        $route = new Zend_Controller_Router_Route_Regex('registry-partners-step-1.html',
          array(
          'action' => 'registry1',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('registry1', $route);
        //Registry Partners step 2
        $route = new Zend_Controller_Router_Route_Regex('registry-partners-step-2.html',
          array(
          'action' => 'registry2',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('registry2', $route);
        //Registry Partners step 3
        $route = new Zend_Controller_Router_Route_Regex('registry-partners-step-3.html',
          array(
          'action' => 'registry3',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('registry3', $route);
        //Registry Partners step 4
        $route = new Zend_Controller_Router_Route_Regex('registry-partners-step-4.html',
          array(
          'action' => 'registry4',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('registry4', $route);
        //Registry Partners step 5
        $route = new Zend_Controller_Router_Route_Regex('registry-partners-step-5.html',
          array(
          'action' => 'registry5',
          'controller' => 'Profile',
          'module' => 'default'
          ));
        $router->addRoute('registry5', $route);*/
    }    
    

}

