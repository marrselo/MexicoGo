<?php
/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_PropertyView extends CST_Entity 
{
    
   static function listingPropertyView(){
       $model = new Application_Model_PropertyView();
       return CST_Utils::fetchPairs($model->listingPropertyView());
   }
    
    public function search($data){
        $consulta['query'] = array();
        $consulta['fields'] = array();
        $fields_querys = array(
            'first_name' => 'age_first_name LIKE ?',
            'last_name' => 'age_last_name LIKE ?',
            'brokerage' => 'age_brokerage LIKE ?'
            //'keyword' => '',
           // 'accountCountry' => 'ciu_id = ?',
           // 'accountRegion' => 'reg_name LIKE ?'
            //'address' => ''
        );
        foreach($data as $key => $val){
            if (!empty($val) and $key != 'accountCountry' and $key != 'accountRegion') {
                $consulta['query'][] = $fields_querys[$key];
                $consulta['fields'][] = '%' . $val . '%';
            }
        }
         //Agrega ciudad
        if($data['accountCountry'] != 0){
            $consulta['query'][] = 'core_ciudades.cd_id = ?';
            $consulta['fields'][] = $data['accountCountry'];
        }
        //Agrega Region
        if($data['accountRegion'] != 0){
            $consulta['query'][] = 'regions.reg_id = ?';
            $consulta['fields'][] = $data['accountRegion'];
        }
        
        $modelAgent = new Application_Model_Agents();
        return $modelAgent->getSearchAgents($consulta);
    }
}
