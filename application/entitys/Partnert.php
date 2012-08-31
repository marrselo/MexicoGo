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
class Application_Entity_Partnert extends CST_Entity {
    /* entidades publicas */

    public $_id;
    public $_nick;
    public $_idUsuario;
    public $_email;
    public $_fullName;
    public $_chief;
    public $_tipoCuenta;
    public $_estado;
    public $_flagParnetRealState;
    public $_otherTypeAccount;
    protected $_identityUsuario;
    private $_modelPartner;

    function __construct($dataUsuario = null) {
        if ($dataUsuario != null) {
            parent::init($dataUsuario);
        }
        $this->_modelPartner = new Application_Model_Partners();
    }

    function setProperties($dataPartnert, Application_Entity_Usuario $usuario) {
        parent::setProperties($dataPartnert);
        if ($this->_idUsuario != '') {
            $usuario = new Application_Entity_Usuario();
            $usuario->setIdentification($this->_idUsuario);
            $this->_identityUsuario = $usuario;
        } else {
            $this->_identityUsuario = $usuario;
        }
    }

    function setArrayData() {
        $param['par_id'] = $this->_id;
        $param['usu_id'] = $this->_idUsuario;
        $param['par_email'] = $this->_email;
        $param['par_flag_partner_profiler'] = $this->_flagParnetRealState;
        $param['par_state'] = $this->_estado;
        $param['par_full_name'] = $this->_fullName;
        $param['par_chief'] = $this->_chief;
        $param['par_nickname'] = $this->_nick;
        $param['par_other_type_account_id'] = $this->_otherTypeAccount;
        $param['par_acount_type_id'] = $this->_tipoCuenta;
        return $param;
    }

    function createPartner() {
        if ($this->_tipoCuenta != 3) { /* si es distinto de other */
            $param['par_flag_partner_profiler'] = 0;
            $this->_otherTypeAccount = null;
            //$this->_identityUsuario->_rol = 2;
        } else {
            $param['par_flag_partner_profiler'] = 1;
        }
        switch ((int) $this->_tipoCuenta) {
            case 1:
                $this->_identityUsuario->_rol = 1;
                break;
            case 2:
                $this->_identityUsuario->_rol = 2;
                break;
            case 3:
                $this->_identityUsuario->_rol = 3;
                break;
            default:
                break;
        }

        $this->_idUsuario = $this->_identityUsuario->createUser();
        if ($this->_idUsuario != '') {
            return $this->_modelPartner->insert($this->setArrayData());
        } else {
            return false;
        }
    }

    function editPartner() {
        return $this->_modelPartner->update($this->_id, $this->setArrayData());
    }

    function identifiquePartner($idPartner) {
        $param = $this->_modelPartner->getPartner($idPartner);
        if ($param != FALSE) {
            $this->_id = $param['par_id'];
            $this->_idUsuario = $param['usu_id'];
            $this->_email = $param['par_email'];
            $this->_flagParnetRealState = $param['par_flag_partner_profiler'];
            $this->_estado = $param['par_state'];
            $this->_fullName = $param['par_full_name'];
            $this->_chief = $param['par_chief'];
            $this->_nick = $param['par_nickname'];
            $this->_otherTypeAccount = $param['par_other_type_account_id'];
            $this->_tipoCuenta = $param['par_acount_type_id'];
            return TRUE;
        } else {
            return FALSE;
        }
    }

    protected function setArrayDataPaymentDetails($dataImput) {
        if ($this->_id != '') {
            $data['par_id'] = $this->_id;
            $data['par_pay_first_name'] = $dataImput['firstName'];
            $data['par_pay_last_name'] = $dataImput['lastName'];
            $data['par_pay_phone'] = $dataImput['phone1'] . '-' . $dataImput['phone2'] . '-' . $dataImput['phone3'];
            $data['par_pay_company_name'] = $dataImput['companyName'];
            $data['par_pay_rfc'] = $dataImput['rfc'];
            $data['par_pay_mail'] = $dataImput['mail'];
            $data['par_pay_suite_ap_uni'] = $dataImput['siteUpUnit'];
            $data['par_pay_state_id'] = $dataImput['state'] == '' ? null : $dataImput['state'];
            $data['par_pay_zip'] = $dataImput['zip'];
            return $data;
        } else {
            return FALSE;
        }
    }

    function registerPaymentDetails($dataImput) {
        if ($datos = $this->setArrayDataPaymentDetails($dataImput)) {
            return $this->_modelPartner->insertPayment($datos);
        }
    }

    function updatePaymentDetails($dataImput) {
        if ($datos = $this->setArrayDataPaymentDetails($dataImput)) {
            return $this->_modelPartner->updatePayment($datos, $this->_id);
        }
    }

    function verifiquePaymentDetails() {
        return $this->_modelPartner->setPaymentDetails($this->_id);
    }

    static function listingsPartnersAcountType() {
        $modelPartnersAcountType = new Application_Model_PartnersAcountType();
        return $modelPartnersAcountType->fetchPairs(
                        $modelPartnersAcountType->listingsPartnersAcountType()
        );
    }

    static function listingsSingleAgentPackages() {
        $modelSingleAgentPackages = new Application_Model_SingleAgentPackages();
        return $modelSingleAgentPackages->listingsSingleAgentPackages();
    }

    static function listingsOtherAccountType() {
        $modelOtherTypeAccount = new Application_Model_PartnerOtherTypeAccount();
        return $modelOtherTypeAccount->fetchPairs(
                        $modelOtherTypeAccount->listingsPartnersAcountType()
        );
    }

}

?>
