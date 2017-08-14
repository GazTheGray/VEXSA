<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/07/10
 * Time: 6:13 PM
 */
namespace App\Controller;

use Cake\ORM\TableRegistry;

class VehicleModelsController extends AppController
{
  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Flash'); // Include the FlashComponent
    $this->viewBuilder()->layout('users');
  }

  public function index()
  {
    if (isset($this->request->params['pass'][0]))
    {
      $brand_id = $this->request->params['pass'][0];
      $brandDetails = TableRegistry::get('VehicleBrands');
      $brandModels = TableRegistry::get('VehicleModels');

      $queryBrand = $brandDetails->find()
        ->where(['id =' => $brand_id])
        ->toArray();

      $query = $brandModels->find()
        ->where(['vehicle_brand_id =' => $brand_id]);
      $this->set('vehicleModels', $query);
      $this->set('brandDetails', $queryBrand);
    }
  }

  public function add()
  {
    $vehicleModel = $this->VehicleModels->newEntity();

    $brand_id = '';

    if (isset($this->request->params['pass'][0]))
    {
      $brand_id = $this->request->params['pass'][0];
      $brandDetails = TableRegistry::get('VehicleBrands');
      $queryBrand = $brandDetails->find()
        ->where(['id =' => $brand_id])
        ->toArray();
      $this->set('brandDetails', $queryBrand);
    }

    if ($this->request->is('post'))
    {
      if (!empty($this->request->data))
      {
        $this->VehicleModels->patchEntity($vehicleModel, $this->request->data);
        if ($this->VehicleModels->save($vehicleModel))
        {
          $this->Flash->success(__('Your Vehicle Model has been updated.'));
          return $this->redirect(['action' => 'index', $brand_id]);
        }
        $this->Flash->error(__('Unable to update your Vehicle Model.'));
      }
    }
    $this->set('vehicleModel', $vehicleModel);
  }

  public function edit($id = null)
  {
    $brand_id = '';
    $edit_this_id = '';

    if (isset($this->request->params['pass'][0]))
    {
      $edit_this_id = $this->request->params['pass'][0];
    }
    if (isset($this->request->params['pass'][1]))
    {
      $brand_id = $this->request->params['pass'][1];
      $brandDetails = TableRegistry::get('VehicleBrands');
      $queryBrand = $brandDetails->find()
        ->where(['id =' => $brand_id])
        ->toArray();
      $this->set('brandDetails', $queryBrand);
    }


    $vehicleModel = $this->VehicleModels->get($edit_this_id);

    if ($this->request->is(['post', 'put']))
    {
      if (!empty($this->request->data))
      {
        $this->VehicleModels->patchEntity($vehicleModel, $this->request->data);
        if ($this->VehicleModels->save($vehicleModel))
        {
          $this->Flash->success(__('Your Vehicle Model has been updated.'));
          return $this->redirect(['action' => 'index', $brand_id]);
        }
        $this->Flash->error(__('Unable to update your Vehicle Model.'));
      }
    }

    $this->set('vehicleModel', $vehicleModel);
  }

  public function delete($id)
  {
    $brand_id = '';
    $delete_this_id = '';

    if (isset($this->request->params['pass'][0]))
    {
      $delete_this_id = $this->request->params['pass'][0];
    }
    if (isset($this->request->params['pass'][1]))
    {
      $brand_id = $this->request->params['pass'][1];
      $brandDetails = TableRegistry::get('VehicleBrands');
      $queryBrand = $brandDetails->find()
        ->where(['id =' => $brand_id])
        ->toArray();
      $this->set('brandDetails', $queryBrand);
    }

    $this->request->allowMethod(['post', 'delete']);

    $vehicleModel = $this->VehicleModels->get($delete_this_id);
    if ($this->VehicleModels->delete($vehicleModel))
    {
      $this->Flash->success(__('The Vehicle Brand with name: {0} has been deleted.', h($vehicleModel['name'])));
      return $this->redirect(['action' => 'index', $brand_id]);
    }
  }
}