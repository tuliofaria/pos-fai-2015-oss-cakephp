<?
    class OrdensController extends AppController{
        public $uses = array("Ordem");

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
                if($this->Ordem->save($this->request->data)){
                    $this->redirect("/contato/ordens");
                }
            }
        }

    }