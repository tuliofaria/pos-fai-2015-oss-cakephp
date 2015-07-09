<h2>Cardapio <? echo $Produto["Produto"]["nome"] ?></h2>
<a href="<? echo $this->Html->url("/funcionario/cardapios/create/" . $Produto["Produto"]["id"]) ?>">Novo</a>

<table>
    <tr>        
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Ações</th>
    </tr>
    <? foreach ($cardapios as $c) { ?>
        <tr>        
            <th><? echo $produtos[$c["Cardapio"]["cardapio_id"]] ?></th>
            <th><? echo $c["Cardapio"]["qtd"] ?></th>
            <th>
                <a href="<? echo $this->Html->url("/funcionario/cardapios/edit/" . $c["Cardapio"]["id"]) ?>">Editar</a>
                <a href="<? echo $this->Html->url("/funcionario/cardapios/delete/" . $c["Cardapio"]["id"]) ?>">Excluir</a>
            </th>
        </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>