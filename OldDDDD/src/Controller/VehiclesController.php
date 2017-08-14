<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/28
 * Time: 6:25 PM
 */
namespace App\Controller;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class VehiclesController extends AppController
{
  public $paginate = [
    'limit' => 25,
    'order' => [
      'Vehicles.created' => 'asc'
    ]
  ];

  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Flash'); // Include the FlashComponent
    $this->loadComponent('Paginator');
    $this->viewBuilder()->layout('users');
  }

  public function add_images()
  {

  }

  public function add()
  {
    $this->loadModel('VehicleImages');
    $this->loadModel('VehicleBrands');
    $this->loadModel('VehicleModels');

    $vehicleBrands = $this->VehicleBrands->find('list');
    $this->set('vehicleBrands', $vehicleBrands);
    $vehicleModels = $this->VehicleModels->find('list');
    $this->set('vehicleModels', $vehicleModels);

    $vehicle = $this->Vehicles->newEntity();
    $vehicleImages = $this->VehicleImages->newEntity();


    if (isset($this->request->params['pass'][0]))
    {
      if ($this->request->params['pass'][0] == 'images_required')
      {
        $this->set('images_required', true);
        $this->set('vehicle_id', $this->request->params['pass'][1]);
      }
    }

    if ($this->request->is('ajax'))
    {
      if ($this->request->params['pass'][2] == 'uploading')
      {

        if (!empty($this->request->data['file']['name']))
        {
          $file = $this->request->data['file']; //put the data into a var for easy use
          $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
          $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
          $setNewFileName = time() . "_" . rand(000000, 999999);

          //only process if the extension is valid
          if (in_array($ext, $arr_ext))
          {
            //do the actual uploading of the file. First arg is the tmp name, second arg is
            //where we are putting it
            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/images/vehicle_images/' . $setNewFileName . '.' . $ext);

            //prepare the filename for database entry
            $imageFileName = $setNewFileName . '.' . $ext;
            $imagePath = 'images/vehicle_images/' . $setNewFileName . '.' . $ext;
          }

          $getFormvalue = $this->VehicleImages->patchEntity(
            $vehicle,
            ["file_name" => $file['name'],
              "vehicle_id" => $this->request->params['pass'][1],
              "file_path" => $imagePath]
          );


          if (!empty($this->request->data['file']['name']))
          {
            $getFormvalue->imgdata = $imagePath;
            $getFormvalue->image_path = $this->request->data['name'];
          }
          if ($this->VehicleImages->save($getFormvalue))
          {

          }
          else
          {
            $this->Flash->error('Records not be saved. Please, try again.');
          }
        }
      }
    }

    if ($this->request->is('post') && !$this->request->is('ajax'))
    {
      if (!empty($this->request->data))
      {
        $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data);

        $vehicle->price = $vehicle->price * 100;
        $vehicle->service_notes = nl2br($vehicle->service_notes);
        $vehicle->additional_notes = nl2br($vehicle->additional_notes);

        if ($this->Vehicles->save($vehicle))
        {
          $this->Flash->success(__('Your vehicle has been saved. You now need to attach images'));
          return $this->redirect(['action' => 'add', "images_required", $vehicle['id']]);
        }

        $this->Flash->error(__('Unable to add your vehicle.'));
      }
    }

    $this->set('vehicle', $vehicle);
  }

  public function index()
  {
    $this->loadModel('VehicleImages');
    $this->loadModel('VehicleBrands');
    $this->loadModel('VehicleModels');
    $page = $this->request->params['pass'];

    $itVar = $this->Vehicles->find('all')->toArray();

    $vehicles = $this->Paginator->paginate($this->Vehicles, [
      'limit' => 25,
      'order' => [
        'Vehicles.created' => 'desc'
      ]]);


    $vehicleImages = $this->VehicleImages;
    $vehicleBrands = $this->VehicleBrands;
    $vehicleModels = $this->VehicleModels;
    $vehiclesWithImages = [];

    foreach ($vehicles as $key => $vehicle)
    {
      array_push($vehiclesWithImages, $vehicle);

//    THIS IS FOR ALL IMAGES _ NOT JUST MAIN IMAGE ONLY ! IMPORTANT !
//      $queryVehicleImages = $vehicleImages->find()
//        ->where(['vehicle_id =' => $vehicle['id']])
//        ->toArray();

//    THIS IS FOR MAIN IMAGE ONLY
      $queryVehicleImages = $vehicleImages->find()
        ->where(['vehicle_id =' => $vehicle['id']])
        ->limit(1)
        ->toArray();

      $queryVehicleBrand = $vehicleBrands->find()
        ->where(['id =' => $vehicle['vehicle_brand_id']])
        ->toArray();

      $queryVehicleModel = $vehicleModels->find()
        ->where(['id =' => $vehicle['vehicle_model_id']])
        ->toArray();

      $vehiclesWithImages["$key"]["vehicle_brand"] = $queryVehicleBrand[0];
      $vehiclesWithImages["$key"]["vehicle_model"] = $queryVehicleModel[0];
      $vehiclesWithImages["$key"]["vehicle_images"] = [];

      foreach ($queryVehicleImages as $queryVehicleImage)
      {
        array_push($vehiclesWithImages["$key"]["vehicle_images"], $queryVehicleImage);
      }
    }
    $this->set('vehicles', $vehiclesWithImages);
  }

  public function edit($id = null)
  {
    $vehicle = $this->Vehicles->get($id);


    $this->loadModel('VehicleImages');
    $this->loadModel('VehicleBrands');
    $this->loadModel('VehicleModels');

    $vehicleBrands = $this->VehicleBrands->find('list');
    $this->set('vehicleBrands', $vehicleBrands);
    $selectedBrand = $this->VehicleBrands
      ->find()
      ->where(['id =' => $vehicle['vehicle_brand_id']])
      ->toArray();
    $this->set('vehicleCurrBrand', $selectedBrand);
    $vehicleModels = $this->VehicleModels->find('list');
    $this->set('vehicleModels', $vehicleModels);

    $selectedModel = $this->VehicleModels
      ->find()
      ->where(['id =' => $vehicle['vehicle_model_id']])
      ->toArray();
    $this->set('vehicleCurrModel', $selectedModel);

    $queryVehicleImages = $this->VehicleImages
      ->find()
      ->where(['vehicle_id =' => $vehicle['id']])
      ->toArray();
    $this->set('vehicleImages', $queryVehicleImages);

    if ($this->request->is('ajax'))
    {
      if ($this->request->params['pass'][1] == 'uploading')
      {

        if (!empty($this->request->data['file']['name']))
        {
          $vehicleImages = $this->VehicleImages->newEntity();
          $file = $this->request->data['file']; //put the data into a var for easy use
          $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
          $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
          $setNewFileName = time() . "_" . rand(000000, 999999);

          //only process if the extension is valid
          if (in_array($ext, $arr_ext))
          {
            //do the actual uploading of the file. First arg is the tmp name, second arg is
            //where we are putting it
            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/images/vehicle_images/' . $setNewFileName . '.' . $ext);

            //prepare the filename for database entry
            $imageFileName = $setNewFileName . '.' . $ext;
            $imagePath = 'images/vehicle_images/' . $setNewFileName . '.' . $ext;
          }

          $getFormvalue = $this->VehicleImages->patchEntity(
            $vehicleImages, ["file_name" => $file['name'], "vehicle_id" => $this->request->params['pass'][0], "file_path" => $imagePath]
          );

          if (!empty($this->request->data['file']['name']))
          {
            $getFormvalue->imgdata = $imagePath;
            $getFormvalue->image_path = $this->request->data['name'];
          }
          if ($this->VehicleImages->save($getFormvalue))
          {
            return true;
          }
          else
          {
            $this->Flash->error('Records not be saved. Please, try again.');
          }
        }
      }
    }

    if ($this->request->is(['post', 'put']))
    {
      if (!empty($this->request->data))
      {

        $this->Vehicles->patchEntity($vehicle, $this->request->data);

        $vehicle->service_notes = nl2br($vehicle->service_notes);
        $vehicle->additional_notes = nl2br($vehicle->additional_notes);
//        $vehicle->price = $vehicle->price * 100;

        if ($this->Vehicles->save($vehicle))
        {
          $this->Flash->success(__('Your vehicle has been updated.'));
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your vehicle.'));
      }
    }


    $this->set('vehicle', $vehicle);
  }

  public function delete($id)
  {
    $this->request->allowMethod(['post', 'delete']);

    $vehicle = $this->Vehicles->get($id);

    $this->loadModel('VehicleImages');
    $queryVehicleImages = $this->VehicleImages
      ->find()
      ->where(['vehicle_id =' => $vehicle['id']])
      ->toArray();

    foreach ($queryVehicleImages as $queryVehicleImage)
    {
      $dir = new Folder(WWW_ROOT . 'img/images/vehicle_images/');
      $file_name = explode("/", $queryVehicleImage["file_path"]);
      $files = $dir->find($file_name[2]);
      $file = new File($dir->pwd() . DS . $files[0]);
      $file->delete();
      $file->close();
    }


    if ($this->Vehicles->delete($vehicle))
    {

      $this->Flash->success(__('The vehicle with id: {0} has been deleted.', h($id)));
      return $this->redirect(['action' => 'index']);
    }
  }

  public function deleteImage($id, $vehicle_id)
  {
    $this->loadModel('VehicleImages');
    $this->request->allowMethod(['post', 'delete']);
    $vehicle_image = $this->VehicleImages->get($id);

    if ($this->VehicleImages->delete($vehicle_image))
    {
      $dir = new Folder(WWW_ROOT . 'img/images/vehicle_images/');
      $file_name = explode("/", $vehicle_image["file_path"]);
      $files = $dir->find($file_name[2]);
      $file = new File($dir->pwd() . DS . $files[0]);
      $file->delete();
      $file->close(); // Be sure to close the file when you're done

      $this->Flash->success(__('The image has been deleted.', h($id)));
      return $this->redirect(['action' => 'edit', $vehicle_id]);
    }
  }
}