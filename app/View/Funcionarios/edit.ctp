<h2>Alterar funcionário</h2>
<? echo $this->Form->create("Funcionario") ?>
    <? echo $this->Form->input("nome") ?>
    <? echo $this->Form->input("email", array("label"=>"E-mail:")) ?>
    <? echo $this->Form->input("senha", array("type"=>"password", "label"=>"Digite sua senha:")) ?>
<? echo $this->Form->end("Salvar") ?>