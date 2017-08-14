<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/28
 * Time: 6:28 PM
 */
?>
<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Vehicles
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <i class="fa fa-newspaper-o"></i> Vehicles
      </li>
    </ol>

    <p><?= $this->Html->link('Add Vehicle', ['action' => 'add']) ?></p>
  </div>
</div>


<div class="row">
  <div class="col-lg-12">
    <table class="table table-hover table-striped">
      <tr>
        <th style="width: 10%">Show Front Page</th>
        <th>First Image</th>
        <th>Name</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Drive Type</th>
        <th>Driver Side</th>
        <th>Year</th>
        <th style="width: 10%">Created</th>
        <th>Actions</th>
      </tr>
      <?php foreach ($vehicles as $vehicle):
        ?>
        <tr>
          <td>
            <?php
            $is_main = "<span class='fa fa-close'></span>";

            if ($vehicle["featured"] == 1)
            {
              $is_main = "<span class='fa fa-check'></span>";
            }
            ?>
            <?= $is_main ?>
          </td>
          <td>
            <?php
            if (!isset($vehicle["vehicle_images"][0]['file_path']))
            {
              echo "No images";
            }
            else
            {

              $imgPath = ($vehicle["vehicle_images"][0]['file_path']);
              ?>

              <img style="width:64px;height: auto" class="img-responsive" src="img\<?= $imgPath ?>">
              <?php
            }
            ?>
          </td>
          <td>
            <?= $vehicle["name"] ?>
          </td>
          <td>
            <?= $vehicle["vehicle_brand"]["name"] ?>
          </td>
          <td>
            <?= $vehicle["vehicle_model"]["name"] ?>
          </td>
          <td>
            <?= $vehicle["drive_type"] ?>
          </td>
          <td>
            <?= $vehicle["driver_side"] ?>
          </td>
          <td>
            <?= $vehicle["year"] ?>
          </td>
          <td>
            <?php
            if ($vehicle["created"] != null)
            {
              echo $vehicle["created"]->format(DATE_RFC850);
            }
            else
            {
              echo $vehicle["created"];
            }
            ?>
          </td>
          <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $vehicle->id]) ?>
            &nbsp;/&nbsp;
            <?= $this->Form->postLink(
              'Delete',
              ['action' => 'delete', $vehicle->id],
              ['confirm' => 'Are you sure?'])
            ?>
          </td>
        </tr>
      <?php endforeach;
      //      pd();
      ?>
    </table>
  </div>
</div>



























