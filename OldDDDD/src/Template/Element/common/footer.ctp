<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/08/18
 * Time: 6:27 PM
 */
?>
<div class="container text-center text-sm-left">
  <div class="row flow-offset-1">
    <div class="col-sm-12 col-md-preffix-1 col-md-2  col-md-push-2">
      <ul class="list">
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
        <li>
          <?= $this->Html->link(
            'Cars',
            '/pages/cars'
          ); ?>
        </li>
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
    </div>
    <div class="col-sm-12 col-md-3  col-md-push-3 ">
      <address class="contact-info">
        <a class="address" href="#">Fourways, Sandton. Gauteng South Africa</a>
        <div>
          <a href="callto:#">+27 83 975 4067</a>
        </div>
      </address>
      <ul class="inline-list">
        <li>
          <a href="javascript:faceCS()" class="icon icon-sm icon-silver fa-facebook" style="padding-left: 10%"></a>
        </li>

      </ul>
    </div>
    <div class="col-sm-12 col-md-2  col-md-push-1">
      <!-- RD Navbar Brand -->
      <div class="vesa-navbar-brand">
        <?= $this->Html->link(
          '',
          '/',
          ['class'=>"brand-name"]
        ); ?>
      </div>

      <p class="copyright">
        &copy; <span id="copyright-year">2016</span>
        <a href="javascript:privacyPolicy()">Privacy Policy</a>
      </p>
    </div>
  </div>

</div>
