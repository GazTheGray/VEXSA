<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/28
 * Time: 6:25 PM
 */
namespace App\Controller;

class VehicleImagesController extends AppController
{
  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Flash'); // Include the FlashComponent
    $this->viewBuilder()->layout('users');
  }

  public function add_images()
  {

  }

  public function add()
  {
//    pd($this->request);
    $this->loadModel('Images');

    $vehicle = $this->Vehicles->newEntity();
    $image = $this->Images->newEntity();


    if ($this->request->is('post')) {

      if (!empty($this->request->data)) {
        if (isset($this->request->data['image_path'])) {
          if (!empty($this->request->data['image_path']['name'])) {
            $file = $this->request->data['image_path']; //put the data into a var for easy use
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
            $setNewFileName = time() . "_" . rand(000000, 999999);

            //only process if the extension is valid
            if (in_array($ext, $arr_ext)) {
              //do the actual uploading of the file. First arg is the tmp name, second arg is
              //where we are putting it
              move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img\images\\' . $setNewFileName . '.' . $ext);

              //prepare the filename for database entry
              $imageFileName = $setNewFileName . '.' . $ext;
              $imagePath = 'img\images\\' . $setNewFileName . '.' . $ext;
            }

            $getFormvalue = $this->Images->patchEntity($image, $this->request->data);

            if (!empty($this->request->data['image_path']['name'])) {
              $getFormvalue->imgdata = $imagePath;
              $getFormvalue->image_path = $imageFileName;
            }
            if ($this->Vehicles->save($getFormvalue)) {
              $this->Flash->success('Your profile has been sucessfully updated.');
              return $this->redirect(['controller' => 'Vehicles', 'action' => 'index']);
            } else {
              $this->Flash->error('Records not be saved. Please, try again.');
            }
          } else {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data);
            if ($this->Vehicles->save($vehicle)) {
              $this->Flash->success(__('Your vehicle has been saved.'));
              return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Unable to add your vehicle.'));
          }
        }
      }
    }
    $this->set('vehicle', $vehicle);
  }

  public function add_old()
  {
    $this->loadModel('Images');

    $vehicle = $this->Vehicles->newEntity();

    if ($this->request->is('post')) {
      if (!empty($this->request->data)) {
        if (isset($this->request->data['image_path'])) {
          if (!empty($this->request->data['image_path']['name'])) {
            $file = $this->request->data['image_path']; //put the data into a var for easy use
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
            $setNewFileName = time() . "_" . rand(000000, 999999);

            //only process if the extension is valid
            if (in_array($ext, $arr_ext)) {
              //do the actual uploading of the file. First arg is the tmp name, second arg is
              //where we are putting it
              move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img\vehicles\\' . $setNewFileName . '.' . $ext);

              //prepare the filename for database entry
              $imageFileName = $setNewFileName . '.' . $ext;
              $imagePath = 'vehicles\\' . $setNewFileName . '.' . $ext;
            }

            $getFormvalue = $this->Vehicles->patchEntity($vehicle, $this->request->data);

            if (!empty($this->request->data['image_path']['name'])) {
              $getFormvalue->imgdata = $imagePath;
              $getFormvalue->image_path = $imageFileName;
            }
            if ($this->Vehicles->save($getFormvalue)) {
              $this->Flash->success('Your profile has been sucessfully updated.');
              return $this->redirect(['controller' => 'Vehicles', 'action' => 'index']);
            } else {
              $this->Flash->error('Records not be saved. Please, try again.');
            }
          } else {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data);
            if ($this->Vehicles->save($vehicle)) {
              $this->Flash->success(__('Your vehicle has been saved.'));
              return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Unable to add your vehicle.'));
          }
        }
      }
    }
    $this->set('vehicle', $vehicle);
  }

  public function index()
  {
    $vehicles = $this->Vehicles->find('all');
    $this->set('vehicles', $vehicles);
  }

  public function edit($id = null)
  {
    $vehicle = $this->Vehicles->get($id);

    if ($this->request->is(['post', 'put'])) {
      if (!empty($this->request->data)) {
        if (isset($this->request->data['image_path'])) {
          if (!empty($this->request->data['image_path']['name'])) {
            $file = $this->request->data['image_path']; //put the data into a var for easy use
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
            $setNewFileName = time() . "_" . rand(000000, 999999);

            //only process if the extension is valid
            if (in_array($ext, $arr_ext)) {
              //do the actual uploading of the file. First arg is the tmp name, second arg is
              //where we are putting it
              move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img\vehicles\\' . $setNewFileName . '.' . $ext);

              //prepare the filename for database entry
              $imageFileName = $setNewFileName . '.' . $ext;
              $imagePath = 'vehicles\\' . $setNewFileName . '.' . $ext;
            }

            $getFormvalue = $this->Vehicles->patchEntity($vehicle, $this->request->data);


            if (!empty($this->request->data['image_path']['name'])) {
              $getFormvalue->imgdata = $imagePath;
              $getFormvalue->image_path = $imageFileName;
            }
            if ($this->Vehicles->save($getFormvalue)) {
              $this->Flash->success('Your profile has been sucessfully updated.');
              return $this->redirect(['controller' => 'Vehicles', 'action' => 'index']);
            } else {
              $this->Flash->error('Records not be saved. Please, try again.');
            }
          } else {
            $this->Vehicles->patchEntity($vehicle, $this->request->data);
            if ($this->Vehicles->save($vehicle)) {
              $this->Flash->success(__('Your vehicle has been updated.'));
              return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your vehicle.'));
          }
        }
      }
    }

    $this->set('vehicle', $vehicle);
  }

  public function delete($id)
  {
    $this->request->allowMethod(['post', 'delete']);

    $vehicle = $this->Vehicles->get($id);
    if ($this->Vehicles->delete($vehicle)) {
      $this->Flash->success(__('The vehicle with id: {0} has been deleted.', h($id)));
      return $this->redirect(['action' => 'index']);
    }
  }
}