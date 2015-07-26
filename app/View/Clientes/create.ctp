<h2>Novo cliente</h2>
<? echo $this->Form->create("Cliente") ?>
    <? echo $this->Form->input("nome") ?>
	<? echo $this->Form->input("cpf_cnpj", array("label"=>"CPF/CNPJ:")) ?>
    <? echo $this->Form->input("email", array("label"=>"E-mail:")) ?>
    <? echo $this->Form->input("observacoes", array( "label"=>"Observações:")) ?>
<? echo $this->Form->end("Salvar") ?>