<?

//----------------------------------------------------------------------------
// virginia: incluindo chamada para equipamentos quando login estiver correto
//----------------------------------------------------------------------------

class FuncionariosController extends AppController {
	
	public function index(){
		$this->set("funcionarios", $this->paginate("Funcionario"));
	}

	public function login(){
    	
    	//mostra na tela a senha cadastrada no banco
    	//echo($this->request->data["Funcionario"]["senha"]);

    	if($this->request->is("POST")){

			// usa email para identificar o funcionario (login)
        	$funcionario = $this->Funcionario->findByEmail($this->request->data["Funcionario"]["email"]);

        	// mostra o registro completo
        	//pr($funcionario);

        	if(!empty($funcionario)){
            	//if($funcionario["Funcionario"]["senha"]==sha1($this->request->data["Funcionario"]["senha"])){
            	if($funcionario["Funcionario"]["senha"]== ($this->request->data["Funcionario"]["senha"])){

                	// o usuario logou certo. direciona para o formulario de funcionario
                	$this->Session->write("funcionario", $funcionario);
                	//$this->redirect("/contato/funcionario");

                	// (VIRGINIA) o usuario acessa a lista de equipamentos cadastrados
                	$this->redirect("/equipamentos");
            	}
        	}
        	$this->Funcionario->invalidate("email", "Funcionário e/ou senha inválidos.");
    	}
	}

	public function create(){

		if($this->request->is("POST")){
			if($this->Funcionario->save($this->request->data)){
				$this->Session->setFlash("Funcionário gravado com sucesso !");
				$this->redirect("/funcionarios");
			}
		}
	}

	public function edit($id){

		if($this->request->is("PUT")){
			$this->request->data["Funcionario"]["id"] = $id;
			if($this->Funcionario->save($this->request->data)){
				$this->Session->setFlash("Funcionário alterado com sucesso !");
				$this->redirect("/funcionarios");
			}
		}else{
			$this->request->data = $this->Funcionario->findById($id);
		}
	}

	public function delete($id){
		$this->Funcionario->delete($id);
		$this->Session->setFlash("Funcionário deletado com sucesso !");
		$this->redirect("/funcionarios");
	}

}