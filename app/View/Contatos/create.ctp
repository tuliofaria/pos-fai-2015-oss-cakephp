<h2>Novo Contato</h2>
<? echo $this->Form->create("Contato") ?>
    <? echo $this->Form->input("nome") ?>
    <? echo $this->Form->input("email", array("label"=>"E-mail:")) ?>
    <? echo $this->Form->radio("situacao", array("1"=>" Ativo","0"=>" Inativo"), array("legend"=>"Situação:")) ?>
    <? echo $this->Form->input("telefone") ?>
    <? echo $this->Form->input("celular") ?>
	<? echo $this->Form->input("senha", array("type"=>"password", "label"=>"Digite sua senha:")) ?>
    <? echo $this->Form->input("cliente_id") ?>
<? echo $this->Form->end("Salvar") ?>