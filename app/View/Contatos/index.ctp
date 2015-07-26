<h2>Contatos</h2>
<a href="<? echo $this->Html->url("/contatos/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <? foreach($contatos as $c){ ?>
    <tr>
        <th><? echo $c["Contato"]["nome"] ?></th>
        <th>
            <a href="<? echo $this->Html->url("/contatos/edit/".$c["Contato"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/contatos/delete/".$c["Contato"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>