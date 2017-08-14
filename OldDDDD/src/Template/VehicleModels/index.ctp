<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 7:05 PM
 */
?>
<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Models for <strong><?= $brandDetails[0]["name"] ?></strong>
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-newspaper-o"></i>
        &nbsp;<?= $this->Html->link('Manage Brands',
          ['controller'=>'VehicleBrands',
            'action' => 'index'
          ]) ?>
      </li>
      <li class="active"> Models
      </li>
    </ol>

    <p><?= $this->Html->link('Add Model', ['action' => 'add',$brandDetails[0]["id"]]) ?></p>
  </div>
</div>


<div class="row">
  <div class="col-lg-12">
    <table class="table table-hover table-striped">
      <tr>
        <th>Name</th>
        <th>Actions</th>
      </tr>
      <?php foreach ($vehicleModels as $model):  ?>
        <tr>
          <td style="text-transform: uppercase">
            <?= $model["name"] ?>
          </td>
          <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $model->id,$brandDetails[0]["id"]]) ?>
            &nbsp;/&nbsp;
            <?= $this->Form->postLink(
              'Delete',
              ['action' => 'delete', $model->id,$brandDetails[0]["id"]],
              ['confirm' => 'Are you sure?'])
            ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>


























