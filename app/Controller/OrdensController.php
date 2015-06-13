<?
    class OrdensController extends AppController{
        public $uses = array("Ordem");

        // chamado no view
        public function getAbertas(){
            return $this->Ordem->find("count", array("conditions"=>array("Ordem.data_finalizado is null")));
        }

        public function contato_index(){
            $this->paginate = array(
                "conditions"=>array(
                    "Ordem.contato_id"=>$this->Session->read("contato.Contato.id")
                )
            );
            $this->set("ordens", $this->paginate("Ordem"));
        }
        public function contato_create(){
            if($this->request->is("POST")){
                $this->request->data["Ordem"]["contato_id"] = $this->Session->read("contato.Contato.id");
                $this->request->data["Ordem"]["cliente_id"] = $this->Session->read("contato.Contato.cliente_id");

                //$this->Ordem->validate = $this->Ordem->validateFuncionario;

                if($this->Ordem->save($this->request->data)){

move_uploaded_file($this->request->data["Ordem"]["arquivo"]["tmp_name"], WWW_ROOT.DS."files".DS.$this->Ordem->id.".jpg");                    
                    //$this->redirect("/contato/ordens");
                }
            }
        }

    }