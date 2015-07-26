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

                    move_uploaded_file($this->request->data["Ordem"]["arquivo"]["tmp_name"], WWW_ROOT.DS."files".DS.$this->Ordem
                                       >id.".jpg");
                    $this->redirect("/contato/ordens");
                }
            }
        }
        
        public function contato_edit($id) {
            if($this->request->is("PUT")){
                $this->request->data["Ordem"]["id"] = $id;

//------------------------------------------------ SEND EMAIL ---------------------------------------------------
                try {
                    require_once(ROOT.'/app/mandrill/src/Mandrill.php');
                    //require_once 'lib/Mandrill.php';
                    $mandrill = new Mandrill('xCGyZBtlhGgI3hLG3ShS-w');                    
                    $message = array(
                        'text' => 'Ordem alterada',
                        'subject' => 'Ordem alterada',
                        'from_email' => 'natalia_rn9@hotmail.com',
                        'from_name' => 'OSS',
                        'to' => array(
                            array(
                                'email' => 'natalia_rn9@hotmail.com',
                                'type' => 'to'
                            )                            
                            )
                        );
                    $async = false;
                    $ip_pool = 'Main Pool';
                    
                    //este parametro é opcional, utilizado apenas em contas pagas para agendar o envio do email
                    //$send_at = '03/07/2015'; 
                    
                    $result = $mandrill->messages->send($message, $async, $ip_pool /*,$send_at*/);
                    print_r($result);
                } catch(Mandrill_Error $e) {
                    // Mandrill errors are thrown as exceptions
                    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
                    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
                    throw $e;
                };
//---------------------------------------------------------------------------------------------------------------------     
            
                if($this->Ordem->save($this->request->data)){
                    $this->Session->setFlash("Ordem alterada com sucesso!");
                    $this->redirect("/contato/ordens");
                }
            }else{
                $this->request->data = $this->Ordem->findById($id);
            }
        }
        
        public function csv(){
            $this->layout = "csv";
            $ordens = $this->Ordem->find("all");
            $this->set("ordens", $ordens);
        }

    }