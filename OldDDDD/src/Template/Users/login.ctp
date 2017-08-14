<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 6:59 PM
 */
?>
<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
  <?= $this->Flash->render('auth') ?>
  <?= $this->Form->create() ?>
  <div class="row">
    <div class="col-lg-3 col-sm-12">
      <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->input('username',['class'=>'form-control']) ?>
        <?= $this->Form->input('password',['class'=>'form-control']) ?>
      </fieldset>
    </div>
  </div>

  <br>
  <?= $this->Form->button(__('Login'),['class'=>'btn btn-primary']); ?>
  <?= $this->Form->end() ?>
</div>
