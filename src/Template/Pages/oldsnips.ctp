<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/09/20
 * Time: 9:07 PM
 */
?>


    <div class="container text-center">
      <h2>BODY TYPE</h2>
      <div class="row flow-offset-1">
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/car-black-case-over-wheels.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('Hatchback')">Hatchback</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/personal-car-side-view-silhouette.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('Sedan')">Sedan</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/car-black-silhouette-side-view.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('MPV')">MPV</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/car-black-side-silhouette.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('SUV')">SUV</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/over-wheels-transport.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('Luxury')">Luxury</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/car-black-shape-over-wheels.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('Hybrid')">Hybrids</a></h6>
        </div>
      </div>
      <div class="row flow-offset-1 hide" id="row_more_types">
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/van-wagon-or-waggon-side-view-silhouette.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('Offroad')">Offroad</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/van-black-shape-in-right-direction.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('Van')">Van</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/convertible.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('Convertible')">Convertible</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/car-black-side-silhouette.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('SUV')">SUV</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/sports-car-top-down-silhouette.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:filterByBodyType('Sports')">Sports</a></h6>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <?=
          $this->Html->image("wheels/pick-up-truck-side-view-silhouette.png", [
            "alt" => "",
            [
              'width' => "86",
              "height" => "170",
            ]
          ]);
          ?>
          <h6 class="text-none offset-4"><a href="javascript:void(0);">Pick up Truck</a></h6>
        </div>
      </div>
      <a id="btn_more_types" class="btn btn-lg btn-sunglow offset-5" href="javascript:show_more_types();">more
        types</a>
    </div>
