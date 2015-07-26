<h2>Nova ordem</h2>
<? echo $this->Form->create("FuncionarioOrdem") ?>
<? echo $this->Form->input("num_ordem") ?>
<p>*digite manualmente o numero de ordem (id da ordem): </p>
<? echo $this->Form->input("descricao") ?>
<? echo $this->Form->input("situacao") ?>
<h6>Criterios de Situação: </h6>
<p>Use 1: CHEGADA</p>
<p>Use 2: ESPERA</p>
<p>Use 3: PRONTO</p>
<? echo $this->Form->input("valor") ?>
<? echo $this->Form->input("equipamento_id") ?>
<? echo $this->Form->end("Salvar") ?>