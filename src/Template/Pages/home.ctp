<header class="page-header bg">
  <?= $this->element('common/navbar') ?>
  <?= $this->element('public/home') ?>
</header>
<?= $this->Flash->render() ?>

<main class="page-content">

  <!-- THE best car deals -->
  <section class="well well-1 bg-image bg-image-1 bg-blue-lighter">
    <div class="container">
      <h2 class="text-center">THE best car deals</h2>
      <div class="row text-center flow-offset-1">
        <?php
        if (isset($featuredVehicles))
        {
          if (!empty($featuredVehicles))
          {
            foreach ($featuredVehicles as $featuredVehicle)
            {
              ?>
              <div class="col-sm-6 col-lg-4 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <div class="product">
                  <div class="fill" style="height: 231px; width: 370px;">
                    <?php
                    if (isset($featuredVehicle['vehicle_images']))
                    {
                      if (isset($featuredVehicle['vehicle_images'][0]))
                      {
                        ?>
                        <?php $imgPath = str_replace("\\", "/", $featuredVehicle['vehicle_images'][0]["file_path"]); ?>
                        <?= $this->Html->image($imgPath, ["class" => ""]); ?>
                        <?php
                      }
                      else
                      {
                        ?>
                        <img height="231" width="370" alt="...Image not found..." src="#">
                        <?php
                      }
                    }
                    else
                    {
                      ?>
                      <img height="231" width="370" alt="...Image not found..." src="#">
                      <?php
                    }
                    ?>
                  </div>
                  <a class="product-price heading-5"
                     href="javascript:void(0);">R <?= number_format((($featuredVehicle['price']) / 100), 2) ?></a>

                  <?= $this->Html->link(
                    $featuredVehicle["year"]
                    . " " . $featuredVehicle["vehicle_brand"]["name"]
                    . " " . $featuredVehicle["vehicle_model"]["name"],
                    '/pages/vehicle/'.$featuredVehicle["id"],
                    ['class'=>"product-title heading-4"]
                  ); ?>


                  <p class="product-caption">Mileage: <?= number_format(($featuredVehicle['mileage']), 0) ?>
                    KM, <?= number_format(($featuredVehicle['engine_size']), 1) ?>
                    L, <?= $featuredVehicle['transmission'] ?> <br
                      class="hidden visible-md-block">
                    <?= $featuredVehicle['drive_type'] ?>, <?= $featuredVehicle['fuel_type'] ?></p>
                </div>
              </div>
              <?php
            }
          }
        }
        ?>
      </div>
    </div>
  </section>
  <!-- END THE best car deals -->

  <!-- new cars -->
  <section class="well well-2">
    <div class="container text-center">
      <h2 class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">new cars</h2>


      <?php
      if (isset($newVehicles))
      {
        if (!empty($newVehicles))
        {
          foreach ($newVehicles as $newVehicle)
          {
            ?>

            <div class="row flow-offset-1 product-info">
              <div class="col-lg-4 text-center text-md-left wow fadeInLeft"
                   style="visibility: visible; animation-name: fadeInLeft;">
                <div class="fill" style="height: 274px; width: 370px;">
                  <?php
                  if (isset($newVehicle['vehicle_images']))
                  {
                    if (isset($newVehicle['vehicle_images'][0]))
                    {
                      ?>
                      <?php $imgPath = str_replace("\\", "/", $newVehicle['vehicle_images'][0]["file_path"]); ?>
                      <?= $this->Html->image($imgPath, ["class" => ""]); ?>
                      <?php
                    }
                    else
                    {
                      ?>
                      <img height="274" width="370" alt="...Image not found..." src="#">
                      <?php
                    }
                  }
                  else
                  {
                    ?>
                    <img height="274" width="370" alt="...Image not found..." src="#">
                    <?php
                  }
                  ?>
                </div>


              </div>
              <div class="col-lg-8">
                <div class="product-info-body text-center text-md-left">
                  <h3>
                    <?= $this->Html->link(
                      $newVehicle["year"]
                      . " " . $newVehicle["vehicle_brand"]["name"]
                      . " " . $newVehicle["vehicle_model"]["name"],
                      '/pages/vehicle/'.$newVehicle["id"]
                    ); ?>
                  </h3>
                  <p class="heading-4 product-info-price">
                    <a href="javascript:void(0);">R <?= number_format((($newVehicle['price']) / 100), 2) ?></a>
                  </p>
                  <p>Mileage: <?= number_format(($newVehicle['mileage']), 0) ?> Kilometres</p>

                  <div class="row row-sm-justify">
                    <div class="col-sm-12 col-lg-3 text-sm-left">
                      <h6 class="text-capitalize">Specs</h6>
                      <ul class="product-info-list text-sm-left ">
                        <li><?= number_format(($newVehicle['engine_size']), 1) ?> L</li>
                        <li><?= $newVehicle['transmission'] ?></li>
                        <li><?= $newVehicle['fuel_type'] ?></li>
                        <li><?= $newVehicle['drive_type'] ?></li>
                      </ul>
                    </div>
                    <div class="col-sm-12 col-lg-5 text-sm-left">
                      <h6 class="text-capitalize preffix-1">Description</h6>
                      <ul class="product-info-list text-sm-left preffix-1">
                        <li><?= substr($newVehicle->additional_notes, 0, 256) ?>...</li>
                      </ul>
                    </div>
                    <div class="col-sm-12 col-md-3">
                      <div class="inline-block">

                        <ul class="product-info-list-1">
                          <li>
                            <div class="box">
                              <div class="box__left box__middle">
                                <span class="icon icon-xs icon-default fa-calendar"></span>
                              </div>
                              <div class="box__body box__middle">
                                Listed | <?= date_format($newVehicle["created"], "Y/m/d"); ?>
                              </div>
                            </div>

                          </li>
                          <li>
                            <div class="box">
                              <div class="box__left box__middle">
                                <span class="icon icon-xs icon-default fa-eye"></span>
                              </div>
                              <div class="box__body box__middle">
                                <?= $newVehicle['views'] ?> Views
                              </div>
                            </div>

                          </li>
                          <li>
                            <div class="box">
                              <div class="box__left box__middle">
                                <span class="icon icon-xs icon-default fa-comment-o"></span>
                              </div>
                              <div class="box__body box__middle">

                                <?= $newVehicle['inquiries'] ?> Inquiries
                              </div>
                            </div>

                          </li>
                        </ul>

                        <?= $this->Html->link("more details",
                          '/pages/vehicle/'.$newVehicle["id"],
                          ['class'=>"btn btn-md btn-sunglow wow fadeInRight",
                            "style"=>"visibility: visible; animation-name: fadeInRight;"]
                        ); ?>


                      </div>

                    </div>
                  </div>


                </div>
              </div>
            </div>
            <hr>

            <?php
          }
        }
      }
      ?>
    </div>
  </section>
  <!-- END new cars -->

  <!-- the latest car news -->
  <section class="well well-2 bg-black-haze">
    <div class="container">
      <h2 class="wow fadeIn" style="visibility: hidden; animation-name: none;">the latest car news</h2>
      <div class="row row-xs-center flow-offset-2 wow fadeIn" style="visibility: hidden; animation-name: none;">


        <?php
        if (isset($highlightedNews))
        {
          if (!empty($highlightedNews))
          {
            foreach ($highlightedNews as $article)
            {
              ?>
              <div class="col-sm-12 col-lg-4">
                <article class="news-post">
                  <div class="fill" style="height: 230px; width: 370px;">
                    <?php $imgPath = str_replace("\\", "/", $article["image_path"]); ?>
                    <?= $this->Html->image($imgPath, ["class" => ""]); ?>
                  </div>


                  <div class="box">
                    <div class="box__left box__left-1  box__middle">
                      <span class="icon icon-xs-1 icon-silver fa-calendar"></span>
                    </div>
                    <div class="box__body box__middle small">
                      <?= date_format($article["created"], "Y/m/d"); ?>
                    </div>
                  </div>
                  <div class="box">
                    <div class="box__left box__left-2  box__middle">
                      <span class="icon icon-xs-2 icon-silver fa-clock-o"></span>
                    </div>
                    <div class="box__body box__middle small">
                      <?= date_format($article["created"], "H:i"); ?>
                    </div>
                  </div>
                  <h5><a href="javascript:void(0);"><?= $article['title'] ?> <br class="hidden visible-lg-block">
                      to be available from 2016</a></h5>
                  <p><?= substr($article->body, 0, 256) ?>...
                    <a
                      href="javascript:readMore('<?= $article['title'] ?>','<?= $article['body'] ?>','<?= date_format($article["created"], "Y/m/d"); ?>')"
                      class="link link-md link-primary">&nbsp;Read
                      more...</a>
                  </p>
                </article>
              </div>
              <?php
            }
          }
        }
        ?>
      </div>
    </div>
  </section>
  <!-- END the latest car news -->

  <!-- newsletter -->
  <section class="well well-2 bg-image bg-image-2 bg-blue-lighter">
    <div class="container">
      <h2>Get In Touch</h2>

      <div class="row row-xs-center text-center  text-sm-left">
        <div class="col-md-8 col-lg-6 text-center">
          <h6 class="text-none text-regular">Can't find your perfect vehicle? Not a problem!</h6>
          <p>Click the button below, fill out a simple form with details about the vehicle, hit <strong>Send</strong>. I'ts that easy!</p>
          <!-- RD Mailform -->
          <?=
          $this->Html->link(
            "Contact Us",
            '/pages/contact/',

            ['class' => 'btn btn-sunglow btn-sm', 'escape' => false,]
          );
          ?>
          <!-- END RD Mailform -->
        </div>
      </div>
    </div>
  </section>
  <!-- END newsletter -->
</main>
<footer class="page-footer">
  <?= $this->element('common/footer') ?>
</footer>


