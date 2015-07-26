<h2>Clientes</h2>
<a href="<? echo $this->Html->url("/cliente/clientes/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <? foreach($clientes as $c){ ?>
    <tr>
        <th><? echo $c["Cliente"]["nome"] ?></th>
        <th>
            <a href="<? echo $this->Html->url("/clientes/edit/".$c["Cliente"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/clientes/delete/".$c["Cliente"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>