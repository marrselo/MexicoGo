<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Laptop
 */
class Application_Entity_PartnertSingleAgent extends Application_Entity_Partnert {
    /* entidades publicas */
    
    function registerPlans($params){
            $data['single_agent_packages_id'] = $params['package'];
        $data['feature'] = $params['feature'];
        $data['months'] = $params['months'];
        $data['date_register'] = date('Y-m-d H:i:s');
        $data['active'] = 0;
        $data['single_agent_packages_id'] = $this->_id;
    }
    
}

?>
