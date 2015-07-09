<h2>Alterar <? echo $cardapios[$this->request->data["Cardapio"]["produto_id"]] ?></h2>
<? echo $this->Form->create("Cardapio") ?>
    <? echo $this->Form->input("qtd",array("label"=>"Quantidade")) ?>
    <? echo $this->Form->input("cardapio_id",array("label"=>"Produto")) ?>
    <? echo $this->Form->hidden("produto_id") ?>
    <? echo $this->Form->hidden("id") ?>
<? echo $this->Form->end("Salvar") ?>