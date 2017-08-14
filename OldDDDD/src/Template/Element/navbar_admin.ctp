<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 7:20 PM
 */
?>
<!-- Brand and toggle get grouped for better mobile display -->
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="javascript:void(0)"><span style="color: #bb0000">Vehicle Exports</span> South Africa</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    <li class="dropdown">
<!--      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Admin<b-->
<!--          class="caret"></b></a>-->
<!--      <ul class="dropdown-menu">-->
<!--        <li>-->
          <?= $this->Html->link('<i class="fa fa-fw fa-power-off"></i> Log Out', ['action' => 'logout'],['escape'=>false]) ?>
<!--        </li>-->
<!--      </ul>-->
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li class="active">
        <?=
        $this->Html->link(
          '<i class="fa fa-fw fa-newspaper-o"></i> Articles',
          '/articles',

          ['class' => 'button','escape'=>false,]
        );
        ?>
      </li>
      <li>
        <?=
        $this->Html->link(
          '<i class="fa fa-fw fa-car"></i> Brands',
          '/vehicleBrands',

          ['class' => 'button','escape'=>false,]
        );
        ?>
      </li>
      <li>
        <?=
        $this->Html->link(
          '<i class="fa fa-fw fa-car"></i> Vehicle Listings',
          '/vehicles',

          ['class' => 'button','escape'=>false,]
        );
        ?>
      </li>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>