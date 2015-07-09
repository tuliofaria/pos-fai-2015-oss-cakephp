<h2>Produtos</h2>
<a href="<? echo $this->Html->url("/funcionario/produtos/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>
        <th>Produtos</th>
    </tr>
    <? foreach($produtos as $p){ ?>
    <tr>
        <th><? echo $p["Produto"]["nome"] ?></th>
        <th>
            <a href="<? echo $this->Html->url("/funcionario/produtos/edit/".$p["Produto"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/funcionario/cardapios?produtoId=".$p["Produto"]["id"]) ?>">Cardapios</a>
            <a href="<? echo $this->Html->url("/funcionario/produtos/delete/".$p["Produto"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>