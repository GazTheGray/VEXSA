<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/08/18
 * Time: 6:24 PM
 */
?>
<div class="vesa-navbar-wrap">
  <nav data-vesa-navbar-lg="vesa-navbar-static" class="vesa-navbar vesa-navbar-static">
    <div class="vesa-navbar-inner">
      <!-- RD Navbar Panel -->
      <div class="vesa-navbar-panel">

        <!-- RD Navbar Toggle -->
        <button data-vesa-navbar-toggle=".vesa-navbar" class="vesa-navbar-toggle"><span></span></button>
        <!-- END RD Navbar Toggle -->


        <!-- RD Navbar Brand -->
        <div class="vesa-navbar-brand">
          <a class="brand-name" href="index.html">
          </a>
        </div>
        <!-- END RD Navbar Brand -->

        <button data-vesa-navbar-toggle=".vesa-navbar-inline-list" class="vesa-navbar-toggle list"><span></span></button>
      </div>
      <!-- END RD Navbar Panel -->

      <div class="vesa-navbar-nav-wrap">

        <!-- RD Navbar Nav -->
        <ul class="vesa-navbar-nav">
          <li class="active">
            <?= $this->Html->link(
              'Home',
              '/'
            ); ?>
          </li>
          <li>
            <?= $this->Html->link(
              'About Us',
              '/pages/about'
            ); ?>
          </li>
          <li class="vesa-navbar--has-dropdown vesa-navbar-submenu">
            <?= $this->Html->link(
              'Cars',
              '/pages/cars'
            ); ?>
          <li>
            <?= $this->Html->link(
              'News',
              '/pages/news'
            ); ?>
          </li>
          <li>
            <?= $this->Html->link(
              'Contact Us',
              '/pages/contact'
            ); ?>
          </li>
        </ul>
        <!-- END RD Navbar Nav -->
      </div>

      <ul class="vesa-navbar-inline-list">
        <a href="javascript:faceCS()" class="icon icon-sm icon-silver fa-facebook" style="padding-left: 10%"></a>
      </ul>
      <div class="vesa-navbar-contact">
        <a href="callto:#">+27 83 975 4067</a>
      </div>
    </div>
  </nav>
</div>
