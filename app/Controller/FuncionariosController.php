<?
    class FuncionariosController extends AppController{

        public $uses = array("Funcionario", "FuncionarioOrdem", "Ordem", "Equipamento");

        public function login(){
            if($this->request->is("POST")){
                $funcionario = $this->Funcionario->findByEmail($this->request->data["Funcionario"]["email"]);

                if(!empty($funcionario)){
                    if($funcionario["Funcionario"]["senha"]==sha1($this->request->data["Funcionario"]["senha"])){
                        // logou
                        $this->Session->write("funcionario", $funcionario);
                        $this->redirect("/funcionarios/ordens_funcionarios");
                    }
                }
                
            }
        }

        public function ordens_funcionarios() {
            $this->paginate = array(
                "conditions"=>array(
                    "FuncionarioOrdem.funcionario_id"=>$this->Session->read("funcionario.Funcionario.id")
                )
            );
            $this->set("funcionarios", $this->paginate("FuncionarioOrdem"));

        }

        public function create_ordem() {
            $this->set("ordens", $this->Ordem->find("list"));
            $this->set("equipamentos", $this->Equipamento->find("list"));
            if($this->request->is("POST")){
                $this->request->data["FuncionarioOrdem"]["funcionario_id"] = $this->Session->read("funcionario.Funcionario.id");
                $this->request->data["FuncionarioOrdem"]["ordem_id"] = $this->request->data["FuncionarioOrdem"]["num_ordem"];
                 if($this->FuncionarioOrdem->save($this->request->data)){
                    $this->Session->setFlash("Ordem cadastrada pelo Funcionário com sucesso!");
                    $this->redirect("/funcionarios/ordens_funcionarios");
                }
             }

        }

         public function delete_ordem($id){
            $this->FuncionarioOrdem->delete('first', array('conditions' => array('FuncionarioOrdem.ordem_id' => $id))); //array com condições);
            $this->Session->setFlash("Ordem do Funcionario excluída com sucesso!");
            $this->redirect("/funcionarios/ordens_funcionarios");
        } 

         public function edit_ordem($id){
            
        }
    }