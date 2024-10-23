<?php

use Cake\Core\Configure;
use Cake\Routing\Router;

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <?php echo $this->Flash->render() ?>
    <?php echo $this->Form->create() ?>
    <fieldset>
        <legend><?php echo __('Please enter your email and password'); ?></legend>
        <?php
        echo $this->Form->control('email');
        echo $this->Form->control('password');
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Login')); ?>
    <?php echo $this->Form->end() ?>
</body>

</html>