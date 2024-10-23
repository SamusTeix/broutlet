<?php

use App\Enum\Duration;
use App\Enum\Status;

?>
<h1>Visualizar Agendamento</h1>

<div class="appointments view">
    <table>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($appointments->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Appointment Type') ?></th>
            <td><?=  $appointments->appointment_type->name ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($appointments->date->format('d/m/Y')) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($appointments->start_time->format('H:i')) ?></td>
        </tr>
        <tr>
            <th><?= __('Duration') ?></th>
            <td><?= h(Duration::DURATION_NAME[$appointments->duration]) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h(Status::STATUS_NAME[$appointments->status]) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= h($appointments->user->name) ?></td>
        </tr>
    </table>
</div>

<a href="<?= $this->Url->build(['action' => 'edit', $appointments->id]) ?>">Editar</a> |
<a href="<?= $this->Url->build(['action' => 'index']) ?>">Voltar para a lista</a>