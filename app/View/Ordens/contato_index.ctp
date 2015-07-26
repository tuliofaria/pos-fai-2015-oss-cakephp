<h2>Ordens</h2>
<a href="<? echo $this->Html->url("/contato/ordens/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>
        <th>Ordens</th>
    </tr>
    <? foreach($ordens as $c){ ?>
    <tr>
        <th><? echo $c["Ordem"]["id"] ?></th>
        <th>
            <a href="<? echo $this->Html->url("/contato/ordens/edit/".$c["Ordem"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/contatos/delete/".$c["Ordem"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>