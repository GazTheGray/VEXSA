<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 7:06 PM
 */

//To change wrapping for all inputs in form use:
$this->Form->templates([
  'inputContainer' => '<div class="form-group">{{content}}</div>'
]);
?>
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Articles
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-newspaper-o"></i>&nbsp;<?= $this->Html->link('Manage Articles', ['action' => 'index']) ?>
      </li>
      <li class="active">
        <i class="fa fa-plus"></i> Add Article
      </li>
    </ol>
  </div>
</div>

<div class="row">
  <?php
  echo $this->Form->create($article,['enctype' => 'multipart/form-data']);
  ?>
  <div class="col col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Article Details</h3>
      </div>
      <div class="panel-body">
        <?php
        echo $this->Form->input(
          'highlighted',
          [
            'type' => 'select',
            'multiple' => false,
            'options' => ["No", "Yes"],
            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );

        echo $this->Form->input('title', [
          'class' => 'form-control',
          'placeholder' => 'Title...'
        ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );

        echo $this->Form->input('body', [
            'rows' => '6',
            'class' => 'form-control',
            'style' => 'resize: none;',
            'maxlength' => '5000',
            'placeholder' => 'Title...',
            'id' => 'input_body',
          ]
        ); ?>
        <p>
          <?php
          echo $this->Form->button('Save Article',
            ['class' => 'btn btn-success']
          );
          ?>
          <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default', 'confirm' => 'Are you sure? Your progress will be lost unless you Save']) ?>
        </p>
      </div>
    </div>
  </div>
  <div class="col col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Article Image ( Optional )</h3>
      </div>
      <div class="panel-body">
        <?php
        echo $this->Form->input('image_path', [
            'label' => 'Image',
            'type' => 'file'
          ]
        );
        ?>
      </div>
    </div>
  </div>
  <?php
  echo $this->Form->end();
  ?>
</div>