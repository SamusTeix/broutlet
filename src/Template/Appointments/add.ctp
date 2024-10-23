<style>
    select {
        min-width: 120px !important;
    }
</style>


<h1>Adicionar Agendamento</h1>

<?= $this->Form->create($appointments) ?>
<fieldset>
    <legend><?= __('Add Appointment') ?></legend>
    <?php
        echo $this->Form->control('name');
        echo $this->Form->control('appointment_type_id', ['options' => $appointmentTypes]);
        echo $this->Form->control('date', ['empty' => true, 'value' => date('Y-m-d')]);
        echo $this->Form->control('start_time', ['empty' => true, 'value' => date('H:i')]);
        echo $this->Form->control('duration', ['options' => $durationList]);
        echo $this->Form->control('status', ['options' => $statusList]);
    ?>
</fieldset>
<?= $this->Html->link('Voltar', ['action' => 'index_day'], ['class' => 'btn btn-primary']) ?> | 
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>