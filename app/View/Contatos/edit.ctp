<h2>Alterar contato</h2>
<? echo $this->Form->create("Contato") ?>
    <? echo $this->Form->input("nome") ?>
    <? echo $this->Form->input("email", array("label"=>"E-mail:")) ?>
    <? echo $this->Form->input("senha", array("type"=>"password", "label"=>"Digite sua senha:")) ?>
<? echo $this->Form->end("Salvar") ?>