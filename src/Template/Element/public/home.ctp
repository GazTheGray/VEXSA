<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/08/22
 * Time: 8:07 PM
 */
?>
<?php
$years = [
  1960 => 1960, 1961 => 1961, 1962 => 1962, 1963 => 1963, 1964 => 1964, 1965 => 1965, 1966 => 1966, 1967 => 1967, 1968 => 1968, 1969 => 1969,
  1970 => 1970, 1971 => 1971, 1972 => 1972, 1973 => 1973, 1974 => 1974, 1975 => 1975, 1976 => 1976, 1977 => 1977, 1978 => 1978, 1979 => 1979,
  1980 => 1980, 1981 => 1981, 1982 => 1982, 1983 => 1983, 1984 => 1984, 1985 => 1985, 1986 => 1986, 1987 => 1987, 1988 => 1988, 1989 => 1989,
  2000 => 2000, 2001 => 2001, 2002 => 2002, 2003 => 2003, 2004 => 2004, 2005 => 2005, 2006 => 2006, 2007 => 2007, 2008 => 2008, 2009 => 2009,
  2010 => 2010, 2011 => 2011, 2012 => 2012, 2013 => 2013, 2014 => 2014, 2015 => 2015, 2016 => 2016
]; ?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1 class="text-center">Finding just <br class="hidden visible-lg-block">
        the car you need</h1>
      <div class="text-center offset-1">
        <div class="box-1 box-1-offset-1 text-center">
          <div class="box-1-top">
            <span class="icon icon-xl icon-yellow-green fa-globe"></span>
          </div>
          <div class="box-1-bottom">
            <h6 class="line-height-auto text-capitalize text-regular">Exports to Africa <br>
              and Abroad</h6>
          </div>
        </div>
        <div class="box-1 box-1-inset-1 text-center">
          <div class="box-1-top ">
            <span class="icon icon-lg icon-yellow-green fa-money "></span>
          </div>
          <div class="box-1-bottom">
            <h6 class="line-height-auto text-capitalize text-regular">Excluding Vat</h6>
          </div>
        </div>
        <div class="box-1 box-1-offset-1 text-center">
          <div class="box-1-top ">
            <span class="icon icon-xl icon-yellow-green fa-car"></span>
          </div>
          <div class="box-1-bottom">
            <h6 class="line-height-auto text-capitalize text-regular">Car From Dealer <br
                class="hidden visible-md-block">
            </h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <!--Responsive-tabs-->
      <div class="responsive-tabs search-form" style="display: block; width: 100%;">
        <ul class="resp-tabs-list search-form-list">
          <li class="heading-5 resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab"> buy a car</li>
        </ul>
        <div class="resp-tabs-container">
          <div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
            <div class="search-form-body">
              <!-- RD Mailform -->
              <?php
              echo $this->Form->create('filter', ['url' => '/pages/cars/filtered', 'class' => 'rd-mailform']);
              ?>
              <!-- RD Mailform Type -->
              <input type="hidden" value="filter" name="form-type">
              <!-- END RD Mailform Type -->
              <fieldset>
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="text-none text-regular">Make</h6>
                    <label data-add-placeholder="" class="z-104 mfSelect">
                      <select name="brand"
                              style="position: absolute; left: 50%; width: 0px; height: 0px; overflow: hidden; opacity: 0;"
                              onchange="showHideModels();"
                      id="selected_brand">
                        <option id="all_brands">All Makes</option>
                        <?php
                        if (isset($vehicle_brands))
                        {
                          foreach ($vehicle_brands as $vehicle_brand)
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
                    <label data-add-placeholder="" class="z-103 mfSelect" id="selected_label_model">
                      <select name="model"
                              style="position: absolute; left: 50%; width: 0px; height: 0px; overflow: hidden; opacity: 0;"
                              id="selected_model">
                        <option id="all_models">All Models</option>
                        <option id="all_models">Select a Make</option>
                        <?php
                        if (isset($vehicle_models))
                        {
                          foreach ($vehicle_models as $vehicle_model)
                          {
                            ?>
                            <option class="hide" id="<?= $vehicle_model['vehicle_brand_id'] ?>"><?= $vehicle_model['name'] ?></option>
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
                    <label data-add-placeholder="" class="z-102 mfSelect">
                      <select name="transmission"
                              style="position: absolute; left: 50%; width: 0px; height: 0px; overflow: hidden; opacity: 0;">
                        <option>Any Transmission</option>
                        <option>Automatic</option>
                        <option>Manual</option>
                      </select></label>
                  </div>
                  <div class="col-md-6">
                    <h6 class="text-none text-regular">Fuel</h6>
                    <label data-add-placeholder="" class="mfSelect">
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
                        <label data-add-placeholder="" class="mfInput">
                          <input type="text" data-constraints="" name="min_year">
                          <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>
                      </div>
                      <div class="col-md-6 inset-2">
                        <h6 class="text-none text-regular">Max Year</h6>
                        <label data-add-placeholder="" class="mfInput">
                          <input type="text" data-constraints="" name="max_year">
                          <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6 inset-1">
                        <h6 class="text-none text-regular">Min Price</h6>
                        <label data-add-placeholder="" class="mfInput">
                          <input type="text" data-constraints="" name="min_price">
                          <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>
                      </div>
                      <div class="col-md-6 inset-2">
                        <h6 class="text-none text-regular">Max Price</h6>
                        <label data-add-placeholder="" class="mfInput">
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
              <!-- END RD Mailform -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>