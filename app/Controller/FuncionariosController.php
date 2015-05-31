<?
    class FuncionariosController extends AppController{

        public function index(){
            $this->set("funcionarios", $this->paginate("Funcionario"));
        }
        public function create() {
            if($this->request->is("POST")){
                if($this->Funcionario->save($this->request->data)){
                    $this->Session->setFlash("Funcionário cadastrado com sucesso!");
                    $this->redirect("/funcionarios");
                }
            }
        }
        public function edit($id) {
            if($this->request->is("PUT")){
                $this->request->data["Funcionario"]["id"] = $id;
                if($this->Funcionario->save($this->request->data)){
                    $this->Session->setFlash("Funcionário alterado com sucesso!");
                    $this->redirect("/funcionarios");
                }
            }else{
                $this->request->data = $this->Funcionario->findById($id);
            }
        }
        public function delete($id){
            $this->Funcionario->delete($id);
            $this->Session->setFlash("Funcionário excluído com sucesso!");
            $this->redirect("/funcionarios");
        }

    }