<?
    class ProdutosController extends AppController{
        public $uses = array("Produto");

        public function funcionario_index(){            
            $this->set("produtos", $this->paginate("Produto"));
        }
        public function funcionario_create(){
            if($this->request->is("POST")){
                $this->request->data["Produto"]["funcionario_id"] = $this->Session->read("funcionario.Produto.id");
                $this->request->data["Produto"]["cliente_id"] = $this->Session->read("funcionario.Produto.cliente_id");
                if($this->Produto->save($this->request->data)){
                    $this->redirect("/funcionario/produtos");
                }
            }
        }
        public function funcionario_edit($id) {
            if($this->request->is("PUT")){
                $this->request->data["Produto"]["id"] = $id;
                if($this->Produto->save($this->request->data)){
                    $this->Session->setFlash("Produto alterado com sucesso!");
                    $this->redirect("/funcionario/produtos");
                }
            }else{
                $this->request->data = $this->Produto->findById($id);
            }
        }
        public function funcionario_delete($id){
            $this->Produto->delete($id);
            $this->Session->setFlash("Produto excluído com sucesso!");
            $this->redirect("/funcionario/produtos");
        }

    }