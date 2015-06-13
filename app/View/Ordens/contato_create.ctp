<h2>Nova ordem</h2>
<? echo $this->Form->create("Ordem") ?>
    <? echo $this->Form->input("data_abertura",
        array(
            "dateFormat"=>"DMY",
            "timeFormat"=>24
        )
        ) ?>
    <? echo $this->Form->input("valor") ?>
<? echo $this->Form->end("Salvar") ?>