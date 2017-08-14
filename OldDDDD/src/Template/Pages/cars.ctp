<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/08/22
 * Time: 7:56 PM
 */
?>
<header class="page-header bg">
  <?= $this->element('common/navbar') ?>
</header>
<?= $this->Flash->render() ?>

<main class="page-content">
  <!--BODY TYPE-->
  <section class="well well-2 bg-image bg-image-3 bg-blue-lighter">
    <div class="row">

      <div class="col-lg-2"></div>
      <div class="col-lg-8">

        <?php
        echo $this->Form->create('filter', ['url' => '/pages/cars/filtered', 'class' => 'rd-mailform', 'style' => 'margin-top:10px']);
        ?>
        <input type="hidden" value="filter" name="form-type">
        <fieldset>
          <div class="row">
            <div class="col-md-6">
              <h6 class="text-none text-regular">Make</h6>
              <label data-add-placeholder="" class="z-104 mfSelect" style="margin-top: 0">
                <select name="brand"
                        style="position: absolute; left: 50%; width: 0px; height: 0px; overflow: hidden; opacity: 0;"
                        onchange="showHideModels();"
                        id="selected_brand">
                  <option id="all_brands">All Makes</option>
                  <?php
                  if (isset($vehicleBrands))
                  {
                    foreach ($vehicleBrands as $vehicle_brand)
                    {
                      ?>
                      <option id="<?= $vehicle_brand['id'] ?>"><?= $vehicle_brand['name'] ?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
              </label>
            </div>
            <div class="col-md-6">
              <h6 class="text-none text-regular">Model</h6>
              <label data-add-placeholder="" class="z-103 mfSelect" id="selected_label_model" style="margin-top: 0">
                <select name="model"
                        style="position: absolute; left: 50%; width: 0px; height: 0px; overflow: hidden; opacity: 0;"
                        id="selected_model">
                  <option id="all_models">All Models</option>
                  <?php
                  if (isset($vehicleModels))
                  {
                    foreach ($vehicleModels as $vehicle_model)
                    {
                      ?>
                      <option class=""
                              id="<?= $vehicle_model['vehicle_brand_id'] ?>"><?= $vehicle_model['name'] ?></option>
                      <?php
                    }
                  }
                  ?>
                </select>
              </label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h6 class="text-none text-regular">Transmission</h6>
              <label data-add-placeholder="" class="z-102 mfSelect" style="margin-top: 0">
                <select name="transmission"
                        style="position: absolute; left: 50%; width: 0px; height: 0px; overflow: hidden; opacity: 0;">
                  <option>Any Transmission</option>
                  <option>Automatic</option>
                  <option>Manual</option>
                </select></label>
            </div>
            <div class="col-md-6">
              <h6 class="text-none text-regular">Fuel</h6>
              <label data-add-placeholder="" class="mfSelect" style="margin-top: 0">
                <select name="fuel_type"
                        style="position: absolute; left: 50%; width: 0px; height: 0px; overflow: hidden; opacity: 0;">
                  <option>All Fuels</option>
                  <option>Petrol</option>
                  <option>Diesel</option>
                </select></label>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6 inset-1">
                  <h6 class="text-none text-regular">Min Year</h6>
                  <label data-add-placeholder="" class="mfInput" style="margin-top: 0">
                    <input type="text" data-constraints="" name="min_year">
                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>
                </div>
                <div class="col-md-6 inset-2">
                  <h6 class="text-none text-regular">Max Year</h6>
                  <label data-add-placeholder="" class="mfInput" style="margin-top: 0">
                    <input type="text" data-constraints="" name="max_year">
                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6 inset-1">
                  <h6 class="text-none text-regular">Min Price</h6>
                  <label data-add-placeholder="" class="mfInput" style="margin-top: 0">
                    <input type="text" data-constraints="" name="min_price">
                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>
                </div>
                <div class="col-md-6 inset-2">
                  <h6 class="text-none text-regular">Max Price</h6>
                  <label data-add-placeholder="" class="mfInput" style="margin-top: 0">
                    <input type="text" data-constraints="" name="max_price">
                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>
                </div>
              </div>
            </div>
          </div>

          <div class="row row-xs-middle offset text-center">
            <div class="col-lg-12">
              <button class="btn btn-xl btn-sunglow" type="submit">search now</button>
            </div>
          </div>


        </fieldset>
        <?= $this->form->end(); ?>
      </div>
      <div class="col-lg-2"></div>
    </div>

  </section>
  <!-- END BODY TYPE -->

  <!-- Featured Cars-->
  <section class="well well-2">
    <div class="container">
      <h2 class="text-center">Featured Cars</h2>
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
                    '/pages/vehicle/' . $featuredVehicle["id"],
                    ['class' => "product-title heading-4"]
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
  <!-- END Featured Cars-->

  <!-- Latest Cars-->
  <section class="well well-2 hide" id="filter_results">

  </section>
  <!-- END Latest CarsS -->

  <!-- Latest Cars-->
  <?php
  if (isset($filteredVehiclesWithImages))
  {
    ?>
    <section class="well well-2" id="filtered_results">
      <div class="container text-center fixed-scroll-div">
        <h2 class="wow fadeIn" style="visibility: visible; animation-name: fadeIn;">Your Filter Results</h2>
        <?php

        if (!empty($filteredVehiclesWithImages))
        {
          foreach ($filteredVehiclesWithImages as $filteredVehicle)
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
                    <?= $this->Html->link(
                      $filteredVehicle["year"]
                      . " " . $filteredVehicle["vehicle_brand"]["name"]
                      . " " . $filteredVehicle["vehicle_model"]["name"],
                      '/pages/vehicle/' . $filteredVehicle["id"]
                    ); ?>

                  </h3>
                  <p class="heading-4 product-info-price">
                    <a href="javascript:void(0);"> R<?= number_format((($filteredVehicle['price'] / 100)), 2) ?></a>


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

                        <?= $this->Html->link("more details",
                          '/pages/vehicle/' . $filteredVehicle["id"],
                          ['class' => "btn btn-md btn-sunglow wow fadeInRight",
                            "style" => "visibility: visible; animation-name: fadeInRight;"]
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
        ?>
      </div>
    </section>
    <?php
  }
  else
  {
    ?>

    <!-- Latest Cars-->
    <section class="well well-2" id="latest_vehicles">
      <div class="container text-center fixed-scroll-div">
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
                        '/pages/vehicle/' . $newVehicle["id"]
                      ); ?>

                    </h3>
                    <p class="heading-4 product-info-price">
                      <a href="javascript:void(0);"> R<?= number_format((($newVehicle['price'] / 100)), 2) ?></a>


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
                          <li><?= substr($newVehicle->additional_notes, 0, 512) ?>...</li>
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
                            '/pages/vehicle/' . $newVehicle["id"],
                            ['class' => "btn btn-md btn-sunglow wow fadeInRight",
                              "style" => "visibility: visible; animation-name: fadeInRight;"]
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
    <!-- END Latest CarsS -->
    <?php
  }
  ?>
  <!-- END Latest CarsS -->


  <!-- CHOSE THE CAR THAT MEETS YOUR NEEDS -->
  <section class="well well-2 bg-black-haze">
    <div class="container">
      <h2>CHOSE THE CAR THAT MEETS YOUR NEEDS</h2>
      <div class="row row-xs-center flow-offset-1">

        <?php
        foreach ($vehicleBrands as $vehicleBrandGroup)
        {
          ?>
          <div class="col-xs-4 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
            <ul class="marked-list">
              <?php
              foreach ($vehicleBrandGroup as $vehicleBrand)
              {
                ?>
                <li><a href="javascript:filterByBrand('<?= $vehicleBrand['id'] ?>')"><?= $vehicleBrand['name'] ?></a>
                </li>
                <?php
              }
              ?>
            </ul>
          </div>
          <?php
        }
        ?>

      </div>
  </section>
  <!-- END CHOSE THE CAR THAT MEETS YOUR NEEDS -->

  <!-- KNOW MORE about your CAR -->
  <section class="well well-2 bg-image bg-image-2 bg-blue-lighter">
    <div class="container">
      <h2>KNOW MORE about your CAR</h2>

      <div class="row row-xs-center flow-offset-2 text-center text-md-left">
        <div class="col-sm-12 col-md-4 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
          <p>VESA is the ideal online destination to buy and export cars from South Africa. With over 10,000 of
            fascinating
            cars lined up by trusted dealers and individuals from across the country, VESA has become the one stop
            place for all the vehicle exports. </p>
        </div>
        <div class="col-sm-12 col-md-4">
          <p>Please note that VESA does not inspect vehicles uploaded by users and used car dealers. Searching
            your favorite car is now easier than before as we provide plenty of options to search by price, by car
            model, by brand name and even by fuel type. </p>
        </div>
        <div class="col-sm-12 col-md-4 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
          <p>Please note that VESA does not inspect vehicles uploaded by users and used car dealers. Searching
            your favorite car is now easier than before as we provide plenty of options to search by price, by car
            model, by brand name and even by fuel type. </p>
        </div>
      </div>
    </div>
  </section>
  <!-- END KNOW MORE about your CAR -->
</main>
<footer class="page-footer">
  <?= $this->element('common/footer') ?>
</footer>
<script>
  <?php
  if (isset($filteredVehiclesWithImages))
  {
  if (!empty($filteredVehiclesWithImages))
  {
  ?>
  location.href = "#filtered_results";
  <?php
  }
  }
  ?>

  function closeFilterClick()
  {

    $('#close_filter').toggle('click');
  }

  function show_more_types()
  {
    if ($('#row_more_types').hasClass('hide'))
    {
      $('#row_more_types').removeClass('hide').addClass('show');
      $('#btn_more_types').text('Less Types');
    }
    else
    {
      $('#row_more_types').removeClass('show').addClass('hide');
      $('#btn_more_types').text('More Types');
    }
  }

  //filter_results
  function filterByBodyType(name)
  {
    var url = 'filterByBody';
    var dataSent = {body_type: name};

    $.ajax({
      type: "POST",
      url: url,
      data: dataSent,
      success: function (data)
      {
        if (data != null && data != '')
        {
          data = $.parseJSON(data);

          $('#filter_results').html(data.html);
          $('#filter_results').removeClass('hide').addClass('show');
          $('#latest_vehicles').removeClass('show').addClass('hide');

          $('html, body').animate({
            scrollTop: $("#filter_results").offset().top
          }, 2000);
        }
      }
    });
  }

  //filter brand
  function filterByBrand(id)
  {
    var url = 'filterByBrand';
    var dataSent = {brand_id: id};

    $.ajax({
      type: "POST",
      url: url,
      data: dataSent,
      success: function (data)
      {
        console.log(data);
        if (data != null && data != '')
        {
          data = $.parseJSON(data);

          $('#filter_results').html(data.html);
          $('#filter_results').removeClass('hide').addClass('show');
          $('#latest_vehicles').removeClass('show').addClass('hide');

          $('html, body').animate({
            scrollTop: $("#filter_results").offset().top
          }, 2000);
        }
      }
    });
  }

</script>