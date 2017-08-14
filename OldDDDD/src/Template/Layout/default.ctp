<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html class="wide smoothscroll wow-animation desktop   landscape vesa-navbar-static-linked">
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    VESA | <?= $this->fetch('title') ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <?= $this->Html->css([
    'bootstrap.css',
    'style.css',
    'galleria.classic.css',
  ]) ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>


</head>
<body>




<div class="page">
  <?= $this->fetch('content') ?>
</div>

<?= $this->element('common/modal') ?>

<a id="ui-to-top" class="ui-to-top fa fa- fa-chevron-up" href="#"></a>

<?= $this->Html->script([
  'core.min.js',
  'bootstrap.min.js',
  'script',

]) ?>
<?= $this->fetch('script') ?>
</body>
</html>
