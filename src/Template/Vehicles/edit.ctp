<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 7:08 PM
 */

//To change wrapping for all inputs in form use:
$this->Form->templates([
  'inputContainer' => '<div class="form-group">{{content}}</div>'
]);
//pd($vehicleImages);
?>
<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Vehicles
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-newspaper-o"></i>&nbsp;<?= $this->Html->link('Manage Vehicles', ['action' => 'index']) ?>
      </li>
      <li class="active">
        <i class="fa fa-edit"></i> Edit Vehicle
      </li>
    </ol>
  </div>
</div>
<!-- /.row -->
<?php
$imagesCount = sizeof($vehicleImages);
?>


<div class="row">
  <div class="col col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Vehicle Details</h3>
      </div>
      <div class="panel-body">
        <p><span class="fa fa-exclamation"></span> - IMPORTANT - PRICE is in cents ie, R100 = 10000</p>
        <?php
        echo $this->Form->create($vehicle, ['enctype' => 'multipart/form-data']);

        echo $this->Form->input('name', [
          'class' => 'form-control',
          'placeholder' => 'Name...'
        ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );

        echo $this->Form->input(
          'body_type',
          [
            'type' => 'select',
            'multiple' => false,
            'options' => [
              "Hatchback" => "Hatchback",
              "SUV" => "SUV",
              "Pick-up/Bakkie" => "Pick-up/Bakkie",
              "Truck" => "Truck",
              "Sedan" => "Sedan",
              "Van" => "Van",
              "Coupe" => "Coupe",
              "Wagon" => "Wagon",
              "Convertible" => "Convertible",
              "Sports Car" => "Sports Car",
              "Crossover" => "Crossover",
              "Luxury Car" => "Luxury Car",
              "Hybrid/Electric" => "Hybrid/Electric",
              "Other" => "Other"],
            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );

        echo $this->Form->input('price', [
          'class' => 'form-control',
          'value' => $vehicle->price,
          'placeholder' => 'Price... 100000 or 255990 - dont include R'
        ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );

        echo $this->Form->input(
          'featured',
          [
            'type' => 'select',
            'multiple' => false,
            'options' => ["No", "Yes"],
            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );

        echo $this->Form->input(
          'vehicle_brand_id',
          [
            'type' => 'select',
            'multiple' => false,
            'options' => $vehicleBrands,
            'default' => $vehicleCurrBrand,
            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );

        echo $this->Form->input(
          'vehicle_model_id',
          [
            'type' => 'select',
            'multiple' => false,
            'options' => $vehicleModels,
            'default' => $vehicleCurrModel,
            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );
        echo $this->Form->input('mileage', [
          'class' => 'form-control',
          'placeholder' => 'Mileage...'
        ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );


        $opts = [
          1960 => 1960, 1961 => 1961, 1962 => 1962, 1963 => 1963, 1964 => 1964, 1965 => 1965, 1966 => 1966, 1967 => 1967, 1968 => 1968, 1969 => 1969,
          1970 => 1970, 1971 => 1971, 1972 => 1972, 1973 => 1973, 1974 => 1974, 1975 => 1975, 1976 => 1976, 1977 => 1977, 1978 => 1978, 1979 => 1979,
          1980 => 1980, 1981 => 1981, 1982 => 1982, 1983 => 1983, 1984 => 1984, 1985 => 1985, 1986 => 1986, 1987 => 1987, 1988 => 1988, 1989 => 1989,
          2000 => 2000, 2001 => 2001, 2002 => 2002, 2003 => 2003, 2004 => 2004, 2005 => 2005, 2006 => 2006, 2007 => 2007, 2008 => 2008, 2009 => 2009,
          2010 => 2010, 2011 => 2011, 2012 => 2012, 2013 => 2013, 2014 => 2014, 2015 => 2015, 2016 => 2016
        ];
        $opts = array_reverse($opts,true);

        echo $this->Form->input(
          'year',
          [
            'type' => 'select',
            'multiple' => false,
            'options' => $opts,

            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );

        //        echo $this->Form->input('created', [
        //          'type' => 'hidden',
        //          'value' => date("Y-m-d H:i:s")
        //        ]
        //        );
        echo $this->Form->input('colour', [
          'class' => 'form-control',
          'placeholder' => 'Colour...'
        ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );
        echo $this->Form->input(
          'fuel_type',
          [
            'type' => 'select',
            'multiple' => false,
            'default' => $vehicle['fuel_type'],
            'options' => ["Petrol" => "Petrol", "Diesel" => "Diesel", "Other" => "Other"],
            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );
        echo $this->Form->input(
          'transmission',
          [
            'type' => 'select',
            'multiple' => false,
            'default' => $vehicle['transmission'],
            'options' => ["Automatic" => "Automatic", "Manual" => "Manual", "Other" => "Other"],
            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );
        echo $this->Form->input(
          'drive_type',
          [
            'type' => 'select',
            'multiple' => false,
            'options' => ["4 x 2" => "4 x 2", "4 x 4" => "4 x 4", "All Wheel" => "All Wheel", "Front Wheel" => "Front Wheel", "Rear Wheel" => "Rear Wheel"],
            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );
        echo $this->Form->input('engine_size', [
          'class' => 'form-control',
          'type'=>'text',
          'placeholder' => 'Engine Size - 1.0 or 2.2 or 1.6...'
        ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );
        echo $this->Form->input(
          'driver_side',
          [
            'type' => 'select',
            'multiple' => false,
            'options' => ["Left" => "Left", "Right" => "Right"],
            'class' => 'form-control',
          ],
          [
            'div' => [
              'class' => 'form-group'
            ]
          ]
        );
        echo $this->Form->input('service_notes', [
            'rows' => '6',
            'class' => 'form-control',
            'style' => 'resize: none;',
            'maxlength' => '5000',
            'placeholder' => 'Notes...',
            'id' => 'input_body',
          ]
        );
        echo $this->Form->input('additional_notes', [
            'rows' => '6',
            'class' => 'form-control',
            'style' => 'resize: none;',
            'maxlength' => '5000',
            'placeholder' => 'Notes...',
            'id' => 'input_body',
          ]
        );
        ?>
        <p>
          <?php
          echo $this->Form->button('Save Vehicle',
            ['class' => 'btn btn-success']
          );
          ?>
          <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default', 'confirm' => 'Are you sure? Your progress will be lost unless you Save']) ?>
        </p>

        <?php
        echo $this->Form->end();
        ?>
      </div>
    </div>
  </div>
  <div class="col col-lg-6">
    <div class="panel panel-default ">
      <div class="panel-heading">
        <h3 class="panel-title">Vehicle Images</h3>
      </div>
      <div class="panel-body">
        <div class="row" style="padding-right: 15px;padding-left: 15px">

          <form id="drop1" class="dropzone needsclick dz-clickable" action="/upload">
            <!---->
            <div class="dz-message needsclick">
              Drop files here or click to upload.<br>
              <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
            </div>

          </form>

        </div>
        <hr>
        <div class="row">
          <?php
          foreach ($vehicleImages as $vehicleImage)
          {
            ?>
            <div class="col col-lg-3">
              <div class="well" style="min-height: 150px; max-height: 150px">
                <?php
                $imgPath = ($vehicleImage["file_path"]);

                $imgPath = str_replace('\\', '/', $imgPath);
                echo $this->Html->image("$imgPath",
                  [
                    'class' => 'img-responsive',
                    'style' => 'height:100%'
                  ]);
                ?>

                <?= $this->Form->postLink(
                  'Delete',
                  ['action' => 'delete_image', $vehicleImage["id"], $vehicle["id"]],
                  ['confirm' => 'Are you sure?'])
                ?>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function ()
  {
    var test = <?= $vehicle['id'] ?> +"/";

    var url = test + 'uploading';
    var imageCountStart = <?= $imagesCount ?>;
    var maxFiles = 20 - imageCountStart;

    var myDropzone = new Dropzone('#drop1', {
      url: url,
      paramName: "file", // The name that will be used to transfer the file
      maxFilesize: 2, // MB
      maxFiles: maxFiles,
      acceptedFiles: 'image/jpe,image/jpeg,image/jpg,image/png',
      addRemoveLinks: true
    });
//
//    $('#imgsubbutt').click(function(){
//      myDropzone.processQueue();
//    });

//    var myDropzone = new Dropzone("#dropzone");
//
//    Dropzone.options.drop1 = {
//      url: "/upload",
//      paramName: "file", // The name that will be used to transfer the file
//      maxFilesize: 2, // MB
//      maxFiles: 20,
//      acceptedFiles: 'image/jpe,image/jpeg,image/jpg,image/png',
//      addRemoveLinks: true,
//      autoProcessQueue: false
//    };

//    var myDropZone = $("form#drop1");
//      url: "/upload",
//      paramName: "file", // The name that will be used to transfer the file
//      maxFilesize: 2, // MB
//      maxFiles: 20,
//      acceptedFiles: 'image/jpe,image/jpeg,image/jpg,image/png',
//      addRemoveLinks: true,
//      autoProcessQueue: false,
//      previewsContainer: '#dropzone'
//    });

    $('#clicky').click(function ()
    {
      myDropzone.processQueue();
    });

  });


  // Now fake the file upload, since GitHub does not handle file uploads
  // and returns a 404


  function removeImage(currentImageCounter)
  {
    $('#img_image-' + currentImageCounter)
  }

  function showAddImage(currentImageCounter)
  {
    var nextImageRow = parseInt(currentImageCounter) + 1;

    $('#btn_image_add-' + currentImageCounter).removeClass('show').addClass('hide');
    $('#btn_image_remove-' + currentImageCounter).removeClass('hide').addClass('show');
    $('#row_image-' + nextImageRow).removeClass('hide').addClass('show');
  }

</script>
