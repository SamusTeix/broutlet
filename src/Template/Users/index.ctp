<h1>Usuários</h1>

<?= $this->Html->link('Adicionar novo usuário', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->email) ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink('Excluir', ['action' => 'delete', $user->id], ['confirm' => 'Tem certeza que deseja excluir este usuário?']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Paginator->numbers() ?>