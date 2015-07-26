<?
    class Funcionario extends AppModel{
		
    	/*	public function beforeSave($options = array())
    	{
    		  if (isset($this->data[$this->alias]['senha']))
    		  {
    				$this->data[$this->alias]['senha'] = AuthComponent::password($this->data[$this->alias]['senha']);
    		  }
    		  return true;
    	 }*/

        
        public $validate = array(
            "nome"=>array(
                "rule"=>"notEmpty",
                "message"=>"Informe o nome"
            ),
            "email"=>array(
                        array(
                            "rule"=>"email",
                            "message"=>"Informe um e-mail válido."
                        ),
                        array(
                            "rule"=>"isUnique",
                            "message"=>"Este e-mail já está sendo utilizado."
                        )
            )
        );

    }