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
      Models
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-newspaper-o"></i>&nbsp;<?= $this->Html->link('Manage Models', ['action' => 'index',$brandDetails[0]["id"]]) ?>
      </li>
      <li class="active">
        <i class="fa fa-plus"></i> Add Model
      </li>
    </ol>
  </div>
</div>

<div class="row">
  <?php
  echo $this->Form->create($vehicleModel,['enctype' => 'multipart/form-data']);
  ?>
  <div class="col col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Model Details</h3>
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

        <?php
        echo $this->Form->input('vehicle_brand_id', [
          'class' => 'form-control',
          'placeholder' => 'Name...',
          'required',
          'type'=>'hidden',
          'value'=>$brandDetails[0]["id"]
        ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        ); ?>
        <p>
          <?php
          echo $this->Form->button('Save Model',
            ['class' => 'btn btn-success']
          );
          ?>
          <?= $this->Html->link('Cancel', ['action' => 'index',$brandDetails[0]["id"]], ['class' => 'btn btn-default', 'confirm' => 'Are you sure? Your progress will be lost unless you Save']) ?>
        </p>
      </div>
    </div>
  </div>
  <div class="col col-lg-6">
  </div>
  <?php
  echo $this->Form->end();
  ?>
</div>