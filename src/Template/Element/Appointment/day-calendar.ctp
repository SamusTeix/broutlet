<div id="day-view" style="display: none">
    <table class="day-table" data-start="<?= $today ?>" data-end="<?= $today ?>">
        <tbody>
            <?php for ($hour = 0; $hour < 24; $hour++): ?>
                <tr class="day-row" data-id="<?= $hour ?>">
                    <td class="hour-cell"><?= str_pad($hour, 2, '0', STR_PAD_LEFT) ?>:00</td>
                    <td class="appointments-cell">

                        <!-- $appointmentHour = (int) date('H', strtotime($appointment->start_time));
                            $appointmentDuration = $appointment->duration; 
                            $appointmentHeight = ($appointmentDuration / 5) * 24 + 6; // Altura em pixels (24px por linha + 6px de padding)

                            <div class="card appointment-card" style="height: <?= $appointmentHeight ?>px;">
                                <div class="card-body">
                                    <p class="card-text"><?= h($appointment->name) ?></p> 
                                </div>
                            </div> -->

                    </td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>