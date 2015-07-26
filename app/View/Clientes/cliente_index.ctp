<h2>Clientes</h2>
<a href="<? echo $this->Html->url("/cliente/clientes/create") ?>">Novo</a>

<table>
    <tr>
        <th>Nome</th>
		<th>CPF/CNPJ</th>
		<th>Email</th>
		<th>Observações</th>
        <th>Ações</th>
    </tr>
    <? foreach($clientes as $f){ ?>
    <tr>
        <th><? echo $f["Cliente"]["nome"] ?></th>
		<th><? echo $f["Cliente"]["cpf_cnpj"] ?></th>
		<th><? echo $f["Cliente"]["email"] ?></th>
		<th><? echo $f["Cliente"]["observacoes"] ?></th>
        <th>
            <a href="<? echo $this->Html->url("/clientes/edit/".$f["Cliente"]["id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/clientes/delete/".$f["Cliente"]["id"]) ?>">Excluir</a>
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>