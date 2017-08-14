<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/08/27
 * Time: 8:16 PM
 */
?>
<?= $this->Html->script([
  'jquery.js',

  'galleria-1.4.2.js',
  'galleria.classic.js',
]);

?>
<header class="page-header bg">
  <?= $this->element('common/navbar') ?>
</header>
<?= $this->Flash->render() ?>


<main class="page-content">
  <!--BODY TYPE-->
  <section class="well well-2 bg-image bg-image-3 bg-blue-lighter">
    <div class="container text-center">

      <h2>
        <?= $vehicleDetails["year"]
        . " " . $vehicleDetails["vehicle_brand"]["name"]
        . " " . $vehicleDetails["vehicle_model"]["name"] ?>

      </h2>
      <div class="row flow-offset-1">
        <div class="col-sm-12">
          <?php
          if (isset($vehicleDetails))
          {
            if (!empty($vehicleDetails['vehicle_images']))
            {
              ?>

              <div id="galleria" style="height: 640px">
                <?php
                $c = 0;
                foreach ($vehicleDetails['vehicle_images'] as $vehicle_image)
                {
                  $c++;
                  $filePath = str_replace("\\", "/", $vehicle_image->file_path);

                  $fullPath = $basePath . "img/" . $filePath;

                  echo $this->Html->image("$filePath", [
                    "alt" => "...Image Not Found...",
                    'url' => $fullPath,
                    "data-big" => $fullPath,
                    "data-title" => "$c",
                    "data-description" => "$c",
                    'fullBase' => true
                  ]);

                }
                ?>
              </div>
              <?php
            }
            else
            {
              ?>
              <p><strong><span class="fa fa-exclamation-triangle"> Info</span></strong></p>
              <hr>
              <p>There are currently no images saved for this vehicle. Check back soon!</p>
              <?php
            }
          }
          else
          {
            ?>
            <p><strong><span class="fa fa-exclamation-triangle"> Info</span></strong></p>
            <hr>
            <p>There are currently no images saved for this vehicle. Check back soon!</p>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- END BODY TYPE -->

  <section class="well well-2 bg-black-haze">
    <div class="container" id="div_articles">
      <div class="row">
        <div class="col-lg-12 col-sm-12">
          <h2>Vehicle Specs</h2>
          <hr>
        </div>
        <div class="col-lg-12 col-sm-12 text-center">
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2 col-sm-1"></div>
        <div class="col-lg-4 col-sm-10">
          <table class="table table-responsive">
            <tbody>

            <tr>
              <td style="width: 40%;">Price</td>
              <td>R<?= number_format((($vehicleDetails['price']) / 100), 2) ?></td>
            </tr>
            <tr>
              <td style="width: 40%;">Year</td>
              <td><?= $vehicleDetails["year"] ?></td>
            </tr>
            <tr>
              <td style="width: 40%;">Mileage</td>
              <td><?= $vehicleDetails["mileage"] ?> KM</td>
            </tr>
            <tr>
              <td style="width: 40%;">Colour</td>
              <td><?= $vehicleDetails["colour"] ?></td>
            </tr>
            <tr>
              <td style="width: 40%;">Transmission</td>
              <td><?= $vehicleDetails["transmission"] ?></td>
            </tr>
            <tr>
              <td style="width: 40%;">Fuel</td>
              <td><?= $vehicleDetails["fuel_type"] ?></td>
            </tr>

            </tbody>
          </table>
        </div>
        <div class="col-lg-4 col-sm-10">
          <table class="table table-responsive">
            <tbody>
            <tr>
              <td style="width: 40%;">Engine Size</td>
              <td><?= number_format(($vehicleDetails['engine_size']), 1) ?></td>
            </tr>
            <tr>
              <td style="width: 40%;">Drive Type</td>
              <td><?= $vehicleDetails["drive_type"] ?></td>
            </tr>
            <tr>
              <td style="width: 40%;">Body Type</td>
              <td><?= $vehicleDetails["body_type"] ?></td>
            </tr>
            <tr>
              <td style="width: 40%;">Driver Side</td>
              <td><?= $vehicleDetails["driver_side"] ?></td>
            </tr>
            <tr>
              <td style="width: 40%;"><span class="fa fa-eye"></span> Views</td>
              <td><?= $vehicleDetails["views"] ?></td>
            </tr>
            <tr>
              <td style="width: 40%;"><span class="fa fa-comments"></span> Inquiries</td>
              <td><?= $vehicleDetails["inquiries"] ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="col-lg-2 col-sm-1"></div>
        <div class="col-lg-2 col-sm-1"></div>

        <div class="col-lg-8 col-sm-10">
          <table class="table table-responsive">
            <tbody>
            <tr>
              <td style="width: 19%;">Description</td>
              <td><?= $vehicleDetails['additional_notes'] ?></td>
            </tr>
            <tr>
              <td style="width: 19%;">Service Notes</td>
              <td><?= $vehicleDetails["service_notes"] ?></td>
            </tr>
            </tbody>
          </table>

        </div>
        <div class="col-lg-2 col-sm-1"></div>
      </div>

    </div>
  </section>

  <section class="well well-2 bg-image bg-image-2 bg-blue-lighter">
    <div class="container">
      <h2 class="text-center">Is this the vehicle for you?</h2>
      <div class="row">
        <div class="col-lg-2 col-sm-1"></div>

        <div class="col-lg-8 col-sm-10 text-center">

          <br>
          <ul class="text-center">
            <li>Would you like to know more, or get in contact with regarding this vehicle?</li>
            <li>Its as easy as clicking the button below,</li>
            <li>Provide us with some information</li>
            <li>And just clicking "Send".</li>
          </ul>
          <?= $this->Html->link('Inquire Now',
            '/pages/contact/' . $vehicleDetails["id"],
            ['class' => "btn btn-lg btn-sunglow offset-5"]
          ); ?>
        </div>
        <div class="col-lg-2 col-sm-1"></div>
      </div>
    </div>
  </section>

  <!-- Latest Used Cars-->
  <section class="well well-2">
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
                     href="#">R <?= number_format((($featuredVehicle['price']) / 100), 2) ?></a>

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
  <!-- END Latest Used Cars-->


  <!-- KNOW MORE about your CAR -->
  <section class="well well-2 bg-image bg-image-2 bg-blue-lighter">
    <div class="container">
      <h2>KNOW MORE about VESA</h2>

      <div class="row row-xs-center flow-offset-2 text-center text-md-left">
        <div class="col-sm-6 col-md-4 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
          <p>VESA is the ideal online destination to buy and export cars from South Africa. With over 10,000 of
            fascinating
            cars lined up by trusted dealers and individuals from across the country, VESA has become the one stop
            place for all the vehicle exports. </p>
        </div>
        <div class="col-sm-6 col-md-4">
          <p>Please note that VESA does not inspect vehicles uploaded by users and used car dealers. Searching
            your favorite car is now easier than before as we provide plenty of options to search by price, by car
            model, by brand name and even by fuel type. </p>
        </div>
        <div class="col-sm-6 col-md-4 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
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
  $(document).ready(function ()
  {

    // Load the classic theme
//  Galleria.loadTheme('galleria.classic.js');

    // Initialize Galleria
    Galleria.run('#galleria');
  });


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