<h2>Alterar <?  echo $Produto["Produto"]["nome"] ?></h2>
<? echo $this->Form->create("Cardapio") ?>
    <? echo $this->Form->input("qtd",array("label"=>"Quantidade","class"=>"joao")) ?>
    <? echo $this->Form->input("cardapio_id",array("label"=>"Produto")) ?>    
<? echo $this->Form->end("Salvar") ?>