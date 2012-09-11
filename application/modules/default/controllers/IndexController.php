<?php

class Default_IndexController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout()->setLayout('layout-front');
        $this->view->headTitle()->setSeparator(' - ');
        $this->view->headTitle('Mexi-Go!');
    }

    public function indexAction() {
        
    }

    public function contactAction() {
        //Si entra por AJAX
        if($this->_request->isXmlHttpRequest()){    
            $this->_helper->layout()->disableLayout();
            if($_POST){
                $data_ajax = $this->getRequest()->getPost();
                parse_str($data_ajax['data'], $formData);
                //Formar el mensaje
                $formData['message'] = 'Phone:'.$formData['phone'].'<br> Message:'.$formData['message'];                
                $res = $this->mandarEmail($formData);
                if($res > 0){
                    $arr_res['res'] = 'ok';
                    $arr_res['msj'] = 'Mensaje enviado exitosamente.';
                }else{
                    $arr_res['res'] = 'error';
                    $arr_res['msj'] = 'Error al mandar el Mensaje.';
                }
                echo json_encode($arr_res);
                exit();
            }
        }
        $this->view->headScript()->appendFile('/front/js/plugins/validity/jquery.validity.js');
        $this->view->headScript()->appendFile('/front/js/contact.js');
        $this->view->headLink()->prependStylesheet('/front/js/plugins/validity/jquery.validity.css');
        $this->view->headTitle('Contact');
    }

    public function magazineAction() {
        $this->view->headTitle('The Magazine');
    }

    public function magazinesubscribeAction() {
        $this->view->headTitle('The Magazine Subscribe');
    }

    public function partnersAction() {
        //Si entra por AJAX
        if ($this->_request->isXmlHttpRequest()) {
            $this->_helper->layout()->disableLayout();
            if ($_POST) {
                $data_ajax = $this->getRequest()->getPost();
                parse_str($data_ajax['data'], $formData);
                foreach ($formData as $key => $val) {
                    $formData[$key] = strip_tags($val);
                }
                $res = Application_Entity_Partnert::search($formData);
                echo json_encode($res);
                exit();
            }
        }
        $this->view->headScript()->appendFile($this->view->baseUrl() . '/front/js/jQuery.clearFields.min.js');
        $this->view->headScript()->appendFile($this->view->baseUrl() . '/front/js/search.js');
        $this->view->headTitle('Partners');
        //Obtiene las regiones
        $regiones = Application_Entity_Ubigeo::getEstados();
        $this->view->regiones = $regiones;
        //Obtiene las categorias
        $categorias = Application_Entity_PartnertEnterprises::listingsSubCategories();
        $this->view->categorias = $categorias;
        $limit = ceil(count($categorias) / 3);
        $this->view->limite = $limit;
        //Obtiene la URL
        $param = str_replace('.html', '', $this->_getParam('cat'));
        $this->view->categoria = $param;
        //Valida color de la pagina
        switch ($param) {
            case '-real-estate':
                $this->view->color = 'red';
                break;
            case '-travel':
                $this->view->color = 'orange';
                break;
            case '-retirement':
                $this->view->color = 'green';
                break;
            case '-partners':
                $this->view->color = 'blue';
                break;
        }
    }

    public function searchmapAction() {
        $this->view->headTitle('Search Map');
    }

    public function advancesearchAction() {
        $this->view->headTitle('Advance Search');
    }

    public function agentdetailAction() {
        $agent = $this->_getParam('agent');        
        $res = Application_Entity_Agent::detail(strip_tags($agent));
        if($res > 0){
            $this->view->agente = $res;
        }else{
            $this->_redirect('/404.html');
        }
        $this->view->headTitle('Agent Detail');
    }
    public function getUrlParams(){
        $params = array();
        parse_str($_SERVER['REQUEST_URI'],$params);
        return $params;
    }
    public function agentsearchAction() {
        $data = array();
        if($this->getRequest()->isPost()){
            //LImpia campos de HMTL
            foreach ($_POST as $key=>$val){
                $data[$key] = strip_tags($_POST[$key]);
            }     
            $this->view->campos_info = $data;
        }
        $this->view->headScript()->appendFile('/front/js/plugins/validity/jquery.validity.js');
        $this->view->headScript()->appendFile('/front/js/agents.js');
        $this->view->headLink()->prependStylesheet('/front/js/plugins/validity/jquery.validity.css');
        //Obtiene ciudades
        $cities = Application_Entity_Ubigeo::getAllCiudades();
        $this->view->ciudades = $cities;
        //Obtiene estados
        //$estados = Application_Entity_Ubigeo::get
        $this->view->headTitle('Find Agent');
        ///Paginado
        $res = Application_Entity_Agent::search($data);
        if(!empty($res['data']) and is_array($res['data'])){
            $this->view->num_agt = count($res['data']);        
            $paginator = Zend_Paginator::factory($res['data']);
            $page = $this->_getParam('page',1);
            $paginator->setItemCountPerPage(2);
            $paginator->setCurrentPageNumber($page);
             $this->view->list = $paginator;                 
        }else{
            $this->view->no_found = '<h3 class="oswald lateral">AGENTS NO FOUND.</h3>';
        }
        
    }

    public function agentsearch2Action() {
        $this->view->headTitle('Agent Results');
    }

    public function propertydetailAction() {
        $this->view->headTitle('Property Detail');
    }

    public function errorAction() {
        $this->view->headTitle('Page No Found');
    }

    //Funcion para madra correo
    public function mandarEmail($data) {
        include_once realpath(APPLICATION_PATH . '/../library/phpmailer/class.phpmailer.php');
        $msj = 'Nombre:' . $data['name'] . '<br>';
        $msj.= 'Email:' . $data['email'] . '<br>';
        $msj.= 'Mensaje:' . $data['message'] . '<br>';
        $mail = new PHPMailer(true);
        try {

            $mail->Host = "symbol.websitewelcome.com";
            $mail->From = $data['email'];
            $mail->FromName = $data['name'];
            $mail->Subject = "Email from Profile " . $data['name'];
            $mail->AddAddress("contact@lunchweb.mx");
            $mail->IsHTML();
            $mail->Body = $msj;
            $mail->Send();
            return 1;
        } catch (phpmailerException $e) {
            return $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            return $e->getMessage(); //Boring error messages from anything else!
        }
    }
    
    public function closingcostAction(){
         $this->view->headTitle('Closing Cost');
    }

}

