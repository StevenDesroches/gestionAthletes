<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['value'=>"visiteur@visiteur.com"]) ?>
<?= $this->Form->control('password', ['value'=>"visiteur"]) ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
<br><hr>