<h1>Detalhes do Usuário</h1>

<dl>
    <dt>Nome:</dt>
    <dd><?= h($user->name) ?></dd>
    <dt>Email:</dt>
    <dd><?= h($user->email) ?></dd>
</dl>

<a href="<?= $this->Url->build(['action' => 'edit', $user->id]) ?>">Editar</a> |
<a href="<?= $this->Url->build(['action' => 'index']) ?>">Voltar para a lista</a>