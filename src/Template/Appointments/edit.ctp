<style>
  select {
    min-width: 120px !important;
  }
</style>

<h1>Editar Agendamento</h1> 

<?= $this->Form->create($appointments) ?> 
<fieldset>
  <legend><?= __('Edit Appointment') ?></legend> 
  <?php
    echo $this->Form->control('name');
    echo $this->Form->control('appointment_type_id', ['options' => $appointmentTypes]);
    echo $this->Form->control('date', ['empty' => true]); 
    echo $this->Form->control('start_time', ['empty' => true]); 
    echo $this->Form->control('duration', ['options' => $durationList]);
    echo $this->Form->control('status', ['options' => $statusList]);
  ?>
</fieldset>
<?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']) ?> | 
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>