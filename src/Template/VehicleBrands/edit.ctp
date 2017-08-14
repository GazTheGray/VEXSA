<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 7:08 PM
 */

//To change wrapping for all inputs in form use:
$this->Form->templates([
  'inputContainer' => '<div class="form-group">{{content}}</div>'
]);
?>
<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Brands
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-newspaper-o"></i>&nbsp;<?= $this->Html->link('Manage Brands', ['action' => 'index']) ?>
      </li>
      <li class="active">
        <i class="fa fa-edit"></i> Edit Brand
      </li>
    </ol>
  </div>
</div>
<!-- /.row -->

<div class="row">
  <?php
  echo $this->Form->create($vehicleBrand,['enctype' => 'multipart/form-data']);
  ?>
  <div class="col col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Brand Details</h3>
      </div>
      <div class="panel-body">

        <?php
        echo $this->Form->input('name', [
          'class' => 'form-control',
          'placeholder' => 'Name...',
          'required'
        ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        ); ?>
        <p>
          <?php
          echo $this->Form->button('Save Brand',
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
        <h3 class="panel-title">Brand Image ( Optional )</h3>
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

