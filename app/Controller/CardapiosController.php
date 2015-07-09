<?
    class CardapiosController extends AppController{

        public $uses = array("Cardapio", "Produto");

        public function funcionario_index(){
             $this->paginate = array(
                "conditions"=>array(
                    "Cardapio.produto_id"=>$this->request->query['produtoId']
                )
            );             
            $this->set("produtos", $this->Produto->find("list"));
            $this->set("Produto",$this->Produto->findById($this->request->query['produtoId']));
            $this->set("cardapios", $this->paginate("Cardapio"));
        }
        public function funcionario_create($id) {
            $this->set("cardapios", $this->Produto->find("list"));
            $this->set("Produto",$this->Produto->findById($id));
            if($this->request->is("POST")){
                $this->request->data["Cardapio"]["produto_id"] = $id;
                if($this->Cardapio->save($this->request->data)){
                    $this->Session->setFlash("Cardapio cadastrado com sucesso!");
                    $this->redirect("/funcionario/cardapios?produtoId=".$id);
                }
            }
        }
        public function funcionario_edit($id) {
            $this->set("cardapios", $this->Produto->find("list"));            
            if($this->request->is("PUT")){                
                $produtoId = $this->request->data["Cardapio"]["produto_id"];
                if($this->Cardapio->save($this->request->data)){
                    $this->Session->setFlash("Cardapio alterado com sucesso!");
                    $this->redirect("/funcionario/cardapios?produtoId=".$produtoId);
                }
            }else{
                $this->request->data = $this->Cardapio->findById($id);                
            }            
        }
        public function funcionario_delete($id){
            $produto = $this->Cardapio->findById($id);
            $this->Cardapio->delete($id);
            $this->Session->setFlash("Cardapio excluído com sucesso!");
            $this->redirect("/funcionario/cardapios?produtoId=".$produto["Cardapio"]["produto_id"]);
        }

    }