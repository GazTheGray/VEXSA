<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 6:55 PM
 */
?>
<div class="users form">
  <?= $this->Form->create($user) ?>
  <div class="row">
    <div class="col-lg-3 col-sm-12">
      <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->input('username', ['class' => 'form-control']) ?>
        <?= $this->Form->input('password', ['class' => 'form-control']) ?>
        <?= $this->Form->input('role', [
          'options' => ['admin' => 'Admin', 'author' => 'Author'], 'class' => 'form-control'
        ]) ?>
      </fieldset>
    </div>
  </div>
  <br>
  <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']); ?>
  <?= $this->Form->end() ?>
</div>


