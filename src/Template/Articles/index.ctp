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
      Articles
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <i class="fa fa-newspaper-o"></i> Articles
      </li>
    </ol>

    <p><?= $this->Html->link('Add Article', ['action' => 'add']) ?></p>
  </div>
</div>


<div class="row">
  <div class="col-lg-12">
    
    <table class="table table-hover table-striped">
      <tr>
        <th>Highlighted</th>
        <th>Image</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
      <?php foreach ($articles as $article):
        ?>
        <tr>
          <td>
            <?php
            $is_main = "<span class='fa fa-close'></span>";
            if ($article->highlighted == 1)
            {
              $is_main = "<span class='fa fa-check'></span>";
            }
            echo $is_main;
            ?>
          </td>
          <td>
            <?php
            $imgPath = ($article["image_path"]);
            ?>
            <img style="width:64px;height: auto" class="img-responsive" src="img\<?= $imgPath ?>">
          </td>
          <td>
            <?= $article->title ?>
          </td>
          <td style="text-overflow: ellipsis;">
            <?= substr($article->body, 0, 512) ?>
          </td>
          <td>
            <?= $article->created->format(DATE_RFC850) ?>
          </td>
          <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
            &nbsp;/&nbsp;
            <?= $this->Form->postLink(
              'Delete',
              ['action' => 'delete', $article->id],
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


























