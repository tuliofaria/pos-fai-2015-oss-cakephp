<?
    class Funcionario extends AppModel{
        
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