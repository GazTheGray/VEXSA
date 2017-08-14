<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/07/10
 * Time: 6:13 PM
 */
namespace App\Controller;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class VehicleBrandsController extends AppController
{
  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Flash'); // Include the FlashComponent
    $this->viewBuilder()->layout('users');
  }

  public function index()
  {
    $vehicleBrands = $this->VehicleBrands->find('all');
    $this->set('vehicleBrands', $vehicleBrands);
  }

  public function add()
  {
    $vehicleBrand = $this->VehicleBrands->newEntity();
    if ($this->request->is('post'))
    {
      if (!empty($this->request->data))
      {
        if (isset($this->request->data['image_path']))
        {
          if (!empty($this->request->data['image_path']['name']))
          {
            $file = $this->request->data['image_path']; //put the data into a var for easy use
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
            $setNewFileName = time() . "_" . rand(000000, 999999);

            //only process if the extension is valid
            if (in_array($ext, $arr_ext))
            {
              //do the actual uploading of the file. First arg is the tmp name, second arg is
              //where we are putting it
              move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/images/' . $setNewFileName . '.' . $ext);

              //prepare the filename for database entry
              $imageFileName = $setNewFileName . '.' . $ext;
              $imagePath = 'images/' . $setNewFileName . '.' . $ext;
            }


            $getFormvalue = $this->VehicleBrands->patchEntity($vehicleBrand, ["name" => $this->request->data['name'], "image_path" => $imagePath]);


            if (!empty($this->request->data['image_path']['name']))
            {
              $getFormvalue->imgdata = $imageFileName;
              $getFormvalue->image_path = $imagePath;
            }
            if ($this->VehicleBrands->save($getFormvalue))
            {
              $this->Flash->success('Your profile has been sucessfully updated.');
              return $this->redirect(['controller' => 'VehicleBrands', 'action' => 'index']);
            }
            else
            {
              $this->Flash->error('Records not be saved. Please, try again.');
            }
          }
          else
          {
            $this->Flash->error('Please upload an image for the new Brand and try again.');
          }
        }
      }
    }
    $this->set('vehicleBrand', $vehicleBrand);
  }

  public function edit($id = null)
  {
    $vehicleBrand = $this->VehicleBrands->get($id);

    if ($this->request->is(['post', 'put']))
    {
      if (!empty($this->request->data))
      {
        if (isset($this->request->data['image_path']))
        {
          if (!empty($this->request->data['image_path']['name']))
          {
            $file = $this->request->data['image_path']; //put the data into a var for easy use
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
            $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
            $setNewFileName = time() . "_" . rand(000000, 999999);

            //only process if the extension is valid
            if (in_array($ext, $arr_ext))
            {
              //do the actual uploading of the file. First arg is the tmp name, second arg is
              //where we are putting it
              move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/images/' . $setNewFileName . '.' . $ext);

              //prepare the filename for database entry
              $imageFileName = $setNewFileName . '.' . $ext;
              $imagePath = 'images/' . $setNewFileName . '.' . $ext;
            }


            $getFormvalue = $this->VehicleBrands->patchEntity($vehicleBrand, ["name" => $this->request->data['name'], "image_path" => $imagePath]);


            if (!empty($this->request->data['image_path']['name']))
            {
              $getFormvalue->imgdata = $imageFileName;
              $getFormvalue->image_path = $imagePath;
            }
            if ($this->VehicleBrands->save($getFormvalue))
            {
              $this->Flash->success('The Vehicle Brand has been successfully updated.');
              return $this->redirect(['controller' => 'VehicleBrands', 'action' => 'index']);
            }
            else
            {
              $this->Flash->error('Brand not be saved. Please, try again.');
            }
          }
          else
          {
            $this->VehicleBrands->patchEntity($vehicleBrand, ["name" => $this->request->data['name'], "image_path" => $vehicleBrand['image_path']]);
            if ($this->VehicleBrands->save($vehicleBrand)) {
              $this->Flash->success(__('Your Vehicle Brand has been updated.'));
              return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your Vehicle Brand.'));
          }
        }
      }
    }

    $this->set('vehicleBrand', $vehicleBrand);
  }

  public function delete($id)
  {
    $this->request->allowMethod(['post', 'delete']);

    $vehicleBrand = $this->VehicleBrands->get($id);
    if ($this->VehicleBrands->delete($vehicleBrand))
    {
      $dir = new Folder(WWW_ROOT . 'img/images/');
      $file_name = explode("/",$vehicleBrand["image_path"]);
      $files = $dir->find($file_name[1]);
      $file = new File($dir->pwd() . DS . $files[0]);
      $file->delete();
      $file->close(); // Be sure to close the file when you're done

      $this->Flash->success(__('The Vehicle Brand with name: {0} has been deleted.', h($vehicleBrand['name'])));
      return $this->redirect(['action' => 'index']);
    }
  }
}