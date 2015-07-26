<h2>Alterar cliente</h2>
<? echo $this->Form->create("Cliente") ?>
    <? echo $this->Form->input("nome") ?>
	<? echo $this->Form->input("cpf_cnpj", array("label"=>"CPF/CNPJ:")) ?>
    <? echo $this->Form->input("email", array("label"=>"E-mail:")) ?>
	<? echo $this->Form->input("senha", array("type"=>"password")) ?>
    <? echo $this->Form->input("observacoes", array( "label"=>"Observações:")) ?>
<? echo $this->Form->end("Salvar") ?>