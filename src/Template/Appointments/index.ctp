<style>
    /* Estilos para os ícones */
    .day-cell .icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 10%;
        margin: 0 5px;
    }

    .day-cell .icon i {
        margin-right: 5px;
    }

    .day-cell .icon.appointments {
        background-color: lightgreen;
    }

    .day-cell .icon.tasks {
        background-color: lightblue;
    }

    /* Estilos para os botões */
    .day-cell .buttons {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-top: 5px;
    }

    .day-cell .buttons .btn {
        width: 100%;
        margin-bottom: 3px;
    }
</style>

<h1>Calendário</h1>

<table class="calendar">
    <thead>
        <tr>
            <th>Domingo</th>
            <th>Segunda</th>
            <th>Terça</th>
            <th>Quarta</th>
            <th>Quinta</th>
            <th>Sexta</th>
            <th>Sábado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $currentDay = 1;
        $startDay = (int)date('w', strtotime(date('Y-m-01')));

        for ($i = 0; $i < 6; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 7; $j++) {
                if ($i === 0 && $j < $startDay) {
                    echo "<td></td>";
                } elseif ($currentDay > date('t')) {
                    echo "<td></td>";
                } else {
                    $completeDay = str_pad($currentDay, 2, '0', STR_PAD_LEFT) . date('/m/Y');
                    $isoDompleteDay = date('Y-m-' . str_pad($currentDay, 2, '0', STR_PAD_LEFT));

                    $numAppointments = count($appointments->filter(function ($appointment) use ($isoDompleteDay) {
                        return $appointment->date->format('Y-m-d') === $isoDompleteDay;
                    })->toArray());
                    $numTasks = count($toDoLists->filter(function ($toDoList) use ($isoDompleteDay) {
                        return $toDoList->moment->format('Y-m-d') === $isoDompleteDay;
                    })->toArray());

                    echo "<td>";
                    echo "<div class='day-cell'>";
                    echo "<span class='day-number'>$completeDay</span>";
                    echo "<div class='icons'>";
                    if ($numAppointments) {
                        echo "<span class='icon appointments'><i class='fas fa-calendar-alt'></i> $numAppointments</span>";
                    }
                    if ($numTasks) {
                        echo "<span class='icon tasks'><i class='fas fa-tasks'></i> $numTasks</span>";
                    }
                    echo "</div>";
                    echo "<div class='buttons'>";
                    echo $this->Html->link('Ver dia', ['controller' => 'Appointments', 'action' => 'indexDay', $isoDompleteDay], ['class' => 'btn btn-sm btn-primary']);
                    echo $this->Html->link('Novo Agendamento', ['controller' => 'Appointments', 'action' => 'add'], ['class' => 'btn btn-sm btn-success']);
                    echo $this->Html->link('Nova Tarefa', ['controller' => 'ToDoLists', 'action' => 'add'], ['class' => 'btn btn-sm btn-warning']);
                    echo "</div>";
                    echo "</div>";
                    echo "</td>";
                    $currentDay++;
                }
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>