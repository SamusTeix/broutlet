<div id="week-view" style="display: none">
    <table class="week-table" data-start="<?= $startWeek ?>" data-end="<?= $endWeek ?>">
        <thead>
            <tr>
                <th>Dia</th>
                <th>Agendamentos</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < 7; $i++): ?>
                <tr>
                    <td>
                        <?php
                        $day = date('w') == 0 ? strtotime("Today + $i days") : strtotime("Last Sunday + $i days");
                        echo strftime('%A, %d/%m', $day);
                        ?>
                    </td>
                    <td>
                        <div class="appointments">
                            <?php foreach ($appointments as $appointment): ?>
                                <?php if (date('w', strtotime($appointment->date)) == $i): ?>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= h($appointment->name) ?></h5>
                                            <p class="card-text">
                                                <strong>Tipo:</strong> <?= h($appointment->appointment_type->name) ?><br>
                                                <strong>Hora:</strong> <?= h($appointment->start_time) ?><br>
                                                <strong>Duração:</strong> <?= h($appointment->duration) ?> minutos
                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>