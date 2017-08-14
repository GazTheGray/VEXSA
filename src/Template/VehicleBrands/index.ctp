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
      Brands
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <i class="fa fa-newspaper-o"></i> Brands
      </li>
    </ol>

    <p><?= $this->Html->link('Add Brand', ['action' => 'add']) ?></p>
  </div>
</div>


<div class="row">
  <div class="col-lg-12">
    <table class="table table-hover table-striped">
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Actions</th>
      </tr>
      <?php foreach ($vehicleBrands as $brand):  ?>
        <tr>
          <td>
            <?php $imgPath = $brand["image_path"]; ?>
            <img style="width:64px;height: auto" class="img-responsive"  src="img\<?= $imgPath ?>">
          </td>
          <td style="text-transform: uppercase">
            <?= $brand{"name"} ?>
          </td>
          <td>
            <?= $this->Html->link('Models', ['controller'=>'VehicleModels','action' => 'index', $brand->id]) ?>
            &nbsp;/&nbsp;
            <?= $this->Html->link('Edit', ['action' => 'edit', $brand->id]) ?>
            &nbsp;/&nbsp;
            <?= $this->Form->postLink(
              'Delete',
              ['action' => 'delete', $brand->id],
              ['confirm' => 'Are you sure?'])
            ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>


























