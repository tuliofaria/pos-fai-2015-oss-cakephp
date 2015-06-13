<h2>Nova ordem</h2>
<? echo $this->Form->create("Ordem", array("enctype"=>"multipart/form-data")) ?>
    <? echo $this->Form->input("data_abertura",
        array(
            "dateFormat"=>"DMY",
            "timeFormat"=>24
        )
        ) ?>
    <? echo $this->Form->input("valor") ?>
    <? echo $this->Form->input("arquivo", array("type"=>"file"))
?><? echo $this->Form->end("Salvar") ?>