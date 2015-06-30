<?
    class ClientesController extends AppController{

        public $uses = array("Contato", "Cliente");


        public function login(){
            if($this->request->is("POST")){
                $cliente = $this->Cliente->findByEmail($this->request->data["Cliente"]["email"]);

                if(!empty($cliente)){
                    if($cliente["Cliente"]["senha"]==sha1($this->request->data["Cliente"]["senha"])){
                        // logou
                        $this->Session->write("cliente", $cliente);
                        $this->redirect("/cliente/ordens");
                    }
                }
                $this->Cliente->invalidate("email", "Usuário e/ou senha inválidos.");
            }
        }

        public function index(){
            $this->set("clientes", $this->paginate("Cliente"));
        }
        public function create() {
            $this->set("clientes", $this->Cliente->find("list"));
            if($this->request->is("POST")){
                if($this->Cliente->save($this->request->data)){
                    $this->Session->setFlash("Cliente cadastrado com sucesso!");
                    $this->redirect("/clientes");
                }
            }
        }
        public function edit($id) {
            if($this->request->is("PUT")){
                $this->request->data["Cliente"]["id"] = $id;
                if($this->Cliente->save($this->request->data)){
                    $this->Session->setFlash("Cliente alterado com sucesso!");
                    $this->redirect("/clientes");
                }
            }else{
                $this->request->data = $this->Cliente->findById($id);
            }
        }
        public function delete($id){
            $this->Cliente->delete($id);
            $this->Session->setFlash("Cliente excluído com sucesso!");
            $this->redirect("/clientes");
        }

    }