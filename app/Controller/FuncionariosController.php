<?
    class FuncionariosController extends AppController{
		
	public $uses = array("Funcionario", "Cliente");
		
	 public function login(){	
            if($this->request->is("POST")){
                $funcionario = $this->Funcionario->findByEmail($this->request->data["Funcionario"]["email"]);
				
                if(isset($funcionario)){
                    if($funcionario["Funcionario"]["senha"]==sha1($this->request->data["Funcionario"]["senha"])){
                        // logou
                        $this->Session->write("funcionario", $funcionario);
                        $this->redirect("/funcionario/funcionarios");
						
                    }
                }
                $this->Funcionario->invalidate("email", "Usuário e/ou senha inválidos.");
            }
        }
	
        public function funcionario_index(){
            $this->set("funcionarios", $this->paginate("Funcionario"));
        }
        public function funcionario_create() {			
            if($this->request->is("POST")){
				$this->request->data["Funcionario"]["senha"] = sha1($this->request->data["Funcionario"]["senha"]);
                if($this->Funcionario->save($this->request->data)){
                    $this->Session->setFlash("Funcionário cadastrado com sucesso!");
                    $this->redirect("/funcionario/funcionarios");
                }
            }
        }
        public function edit($id) {
            if($this->request->is("PUT")){
                $this->request->data["Funcionario"]["id"] = $id;
				$this->request->data["Funcionario"]["senha"] = sha1($this->request->data["Funcionario"]["senha"]);
                if($this->Funcionario->save($this->request->data)){
                    $this->Session->setFlash("Funcionário alterado com sucesso!");
                    $this->redirect("/funcionario/funcionarios");
                }
            }else{
                $this->request->data = $this->Funcionario->findById($id);
            }
        }
        public function delete($id){
            $this->Funcionario->delete($id);
            $this->Session->setFlash("Funcionário excluído com sucesso!");
            $this->redirect("/funcionario/funcionarios");
        }

    }