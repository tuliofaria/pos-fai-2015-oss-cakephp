<?php
    class Ordem extends AppModel{
        public $useTable = "ordens";

        public $validate = array(
            "valor"=>array(
                "rule"=>"notEmpty",
                "message"=>"Informe o valor"
            )
        );

        public $validateFuncionario = array(
            "valor"=>array(
                "rule"=>"notEmpty",
                "message"=>"Informe o valor"
            )
        );

    }