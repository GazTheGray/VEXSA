<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/09/19
 * Time: 7:40 PM
 */
?>
<div class="container text-center">
  <?php
  if (isset($moreVehicles))
  {
    if (!empty($moreVehicles))
    {
      foreach ($moreVehicles as $moreVehicle)
      {
        ?>

        <div class="row flow-offset-1 product-info">
          <div class="col-lg-4 text-center text-md-left wow fadeInLeft"
               style="visibility: visible; animation-name: fadeInLeft;">
            <div class="fill" style="height: 274px; width: 370px;">
              <?php
              if (isset($moreVehicle['vehicle_images']))
              {
                if (isset($moreVehicle['vehicle_images'][0]))
                {
                  ?>
                  <?php $imgPath = str_replace("\\", "/", $moreVehicle['vehicle_images'][0]["file_path"]); ?>
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
                  $moreVehicle["year"]
                  . " " . $moreVehicle["vehicle_brand"]["name"]
                  . " " . $moreVehicle["vehicle_model"]["name"],
                  '/pages/vehicle/'.$moreVehicle["id"]
                ); ?>
              </h3>
              <p class="heading-4 product-info-price">
                <a href="javascript:void(0);"> R43 000</a>
              </p>
              <p>Mileage: <?= number_format(($moreVehicle['mileage']), 0) ?> Kilometres</p>

              <div class="row row-sm-justify">
                <div class="col-sm-4 col-lg-3 text-sm-left">
                  <h6 class="text-capitalize">Specs</h6>
                  <ul class="product-info-list text-sm-left ">
                    <li><?= number_format(($moreVehicle['engine_size']), 1) ?> L</li>
                    <li><?= $moreVehicle['transmission'] ?></li>
                    <li><?= $moreVehicle['fuel_type'] ?></li>
                    <li><?= $moreVehicle['drive_type'] ?></li>
                  </ul>
                </div>
                <div class="col-sm-4 col-lg-5 text-sm-left">
                  <h6 class="text-capitalize preffix-1">Description</h6>
                  <ul class="product-info-list text-sm-left preffix-1">
                    <li><?= substr($moreVehicle->additional_notes, 0, 512) ?>...</li>
                  </ul>
                </div>
                <div class="col-sm-4 col-md-3">
                  <div class="inline-block">

                    <ul class="product-info-list-1">
                      <li>
                        <div class="box">
                          <div class="box__left box__middle">
                            <span class="icon icon-xs icon-default fa-calendar"></span>
                          </div>
                          <div class="box__body box__middle">
                            Listed | <?= date_format($moreVehicle["created"], "Y/m/d"); ?>
                          </div>
                        </div>

                      </li>
                      <li>
                        <div class="box">
                          <div class="box__left box__middle">
                            <span class="icon icon-xs icon-default fa-eye"></span>
                          </div>
                          <div class="box__body box__middle">
                            <?= $moreVehicle['views'] ?> Views
                          </div>
                        </div>

                      </li>
                      <li>
                        <div class="box">
                          <div class="box__left box__middle">
                            <span class="icon icon-xs icon-default fa-comment-o"></span>
                          </div>
                          <div class="box__body box__middle">

                            <?= $moreVehicle['inquiries'] ?> Inquiries
                          </div>
                        </div>

                      </li>
                    </ul>

                    <?= $this->Html->link("more details",
                      '/pages/vehicle/'.$moreVehicle["id"],
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
  <a class="btn btn-lg btn-yellow-green" href="javascript:loadMoreCars();">more cars</a>
</div>
