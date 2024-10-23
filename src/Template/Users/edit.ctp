<h1>Editar Usuário</h1>

<?php echo $this->Form->create($user) ?>
<fieldset>
    <legend><?php echo __('Edit User') ?></legend>
    <?php
        echo $this->Form->control('name');
        echo $this->Form->control('email');
        echo $this->Form->control('password');
    ?>
</fieldset>
<?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary']) ?> | 
<?php echo $this->Form->button(__('Submit')) ?>
<?php echo $this->Form->end() ?>