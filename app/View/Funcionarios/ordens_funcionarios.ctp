<h2>Ordens do Funcionário</h2>
<a href="<? echo $this->Html->url("/funcionarios/create_ordem") ?>">Novo</a>

<table>
    <tr>
        <th>ID da Ordem Aberta pelo Funcionario</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Ordens</th>
    </tr>
    <? foreach($funcionarios as $f){ ?>
    <tr>
        <th><? echo $f["FuncionarioOrdem"]["ordem_id"] ?></th>
        <th><? echo $f["FuncionarioOrdem"]["descricao"] ?></th>
        <th><? echo $f["FuncionarioOrdem"]["valor"] ?></th>
        <th>
            <p>Editar e Deletar...</p>
            <p>Esta tabela faltou um identificador unico para que fizesse a função de deletar e editar, pois da maneira que se encontra ou edita ou deleta todos com o id da ordem.</p>
            <!--a href="<? echo $this->Html->url("/funcionarios/edit_ordem/".$f["FuncionarioOrdem"]["ordem_id"]) ?>">Editar</a>
            <a href="<? echo $this->Html->url("/funcionarios/delete_ordem/".$f["FuncionarioOrdem"]["ordem_id"]) ?>">Excluir</a-->
        </th>
    </tr>
    <? } ?>
</table>

<? echo $this->Paginator->prev() ?>
<? echo $this->Paginator->numbers() ?>
<? echo $this->Paginator->next() ?>
