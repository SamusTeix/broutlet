<h2><?= $day ?></h2>

<h3>Agendamentos</h3>
<div class="buttons mb-3">
    <?= $this->Html->link('Adicionar Agendamento', ['controller' => 'Appointments', 'action' => 'add', $day], ['class' => 'btn btn-success']) ?>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Hora</th>
            <th>Duração</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= h($appointment->name) ?></td>
                <td><?= h($appointment->appointment_type->name) ?></td>
                <td><?= h($appointment->start_time) ?></td>
                <td><?= h($appointment->duration) ?> minutos</td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'Appointments', 'action' => 'view', $appointment->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Html->link('Editar', ['controller' => 'Appointments', 'action' => 'edit', $appointment->id], ['class' => 'btn btn-sm btn-secondary']) ?>
                    <?= $this->Form->postLink('Excluir', ['controller' => 'Appointments', 'action' => 'delete', $appointment->id], ['confirm' => 'Tem certeza que deseja excluir este agendamento?', 'class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Tarefas</h3>
<div class="buttons mb-3">
    <?= $this->Html->link('Adicionar Tarefa', ['controller' => 'ToDoLists', 'action' => 'add'], ['class' => 'btn btn-warning']) ?>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Momento</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($toDoLists as $todoList): ?>
            <tr>
                <td><?= h($todoList->event_name) ?></td>
                <td><?= h($todoList->moment) ?></td>
                <td><?= h($todoList->status) ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['controller' => 'ToDoLists', 'action' => 'view', $todoList->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Html->link('Editar', ['controller' => 'ToDoLists', 'action' => 'edit', $todoList->id], ['class' => 'btn btn-sm btn-secondary']) ?>
                    <?= $this->Form->postLink('Excluir', ['controller' => 'ToDoLists', 'action' => 'delete', $todoList->id], ['confirm' => 'Tem certeza que deseja excluir esta tarefa?', 'class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>