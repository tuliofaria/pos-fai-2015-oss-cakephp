<h2>Funcionários</h2>
<a href="<? echo $this->Html->url("/funcionarios/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>
        <th>Ações</th>
    </tr>
    <? foreach($funcionarios as $f){ ?>
    <tr>
        <th><? echo $f["Funcionario"]["nome"] ?></th>
        <th>
            <a href="<? echo $this->Html->url("/funcionarios/edit/".$f["Funcionario"]["id"]) ?>">Editar</a>            
            <a href="<? echo $this->Html->url("/funcionarios/delete/".$f["Funcionario"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>