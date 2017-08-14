<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/09/05
 * Time: 10:09 PM
 */
?>
<div class="container text-center fixed-scroll-div">
  <h2 class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;"> cars</h2>


  <?php
  if (isset($filteredVehicles))
  {
    if (!empty($filteredVehicles))
    {
      foreach ($filteredVehicles as $filteredVehicle)
      {
        ?>

        <div class="row flow-offset-1 product-info">
          <div class="col-lg-4 text-center text-md-left wow fadeInLeft"
               style="visibility: visible; animation-name: fadeInLeft;">
            <div class="fill" style="height: 274px; width: 370px;">
              <?php
              if (isset($filteredVehicle['vehicle_images']))
              {
                if (isset($filteredVehicle['vehicle_images'][0]))
                {
                  ?>
                  <?php $imgPath = str_replace("\\", "/", $filteredVehicle['vehicle_images'][0]["file_path"]); ?>
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
                <a href="#"><?php echo $filteredVehicle["year"]
                    . " " . $filteredVehicle["vehicle_brand"]["name"]
                    . " " . $filteredVehicle["vehicle_model"]["name"] ?></a>
              </h3>
              <p class="heading-4 product-info-price">
                <a href="#"> R43 000</a>
              </p>
              <p>Mileage: <?= number_format(($filteredVehicle['mileage']), 0) ?> Kilometres</p>

              <div class="row row-sm-justify">
                <div class="col-sm-12 col-lg-3 text-sm-left">
                  <h6 class="text-capitalize">Specs</h6>
                  <ul class="product-info-list text-sm-left ">
                    <li><?= number_format(($filteredVehicle['engine_size']), 1) ?> L</li>
                    <li><?= $filteredVehicle['transmission'] ?></li>
                    <li><?= $filteredVehicle['fuel_type'] ?></li>
                    <li><?= $filteredVehicle['drive_type'] ?></li>
                  </ul>
                </div>
                <div class="col-sm-12 col-lg-5 text-sm-left">
                  <h6 class="text-capitalize preffix-1">Description</h6>
                  <ul class="product-info-list text-sm-left preffix-1">
                    <li><?= substr($filteredVehicle->additional_notes, 0, 512) ?>...</li>
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
                            Listed | <?= date_format($filteredVehicle["created"], "Y/m/d"); ?>
                          </div>
                        </div>

                      </li>
                      <li>
                        <div class="box">
                          <div class="box__left box__middle">
                            <span class="icon icon-xs icon-default fa-eye"></span>
                          </div>
                          <div class="box__body box__middle">
                            <?= $filteredVehicle['views'] ?> Views
                          </div>
                        </div>

                      </li>
                      <li>
                        <div class="box">
                          <div class="box__left box__middle">
                            <span class="icon icon-xs icon-default fa-comment-o"></span>
                          </div>
                          <div class="box__body box__middle">

                            <?= $filteredVehicle['inquiries'] ?> Inquiries
                          </div>
                        </div>

                      </li>
                    </ul>
                    <?php
                    if ($sizeOf > 9)
                    {
                      ?>
                      <a class="btn btn-md btn-sunglow wow fadeInRight" href="#"
                         style="visibility: visible; animation-name: fadeInRight;">more details</a>
                      <?php
                    }
                    ?>
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
  <a href="#" class="btn btn-lg btn-yellow-green">more cars</a>
</div>
