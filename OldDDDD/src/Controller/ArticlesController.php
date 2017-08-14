<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 7:04 PM
 */
namespace App\Controller;

class ArticlesController extends AppController
{
  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Flash'); // Include the FlashComponent
    $this->viewBuilder()->layout('users');

  }

  public function index()
  {
    $articles = $this->Articles->find('all')->order(["created" => "desc"]);
    $this->set('articles', $articles);
  }

  public function view($id)
  {
    $article = $this->Articles->get($id);
    $this->set(compact('article'));
  }

  public function add()
  {
    $article = $this->Articles->newEntity();
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
              move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/articles/' . $setNewFileName . '.' . $ext);

              //prepare the filename for database entry
              $imageFileName = $setNewFileName . '.' . $ext;
              $imagePath = 'articles/' . $setNewFileName . '.' . $ext;
            }

            $getFormvalue = $this->Articles->patchEntity($article, $this->request->data);

            $getFormvalue->body = nl2br($getFormvalue->body);


            //echo nl2br("This\r\nis\n\ra\nstring\r");

            if (!empty($this->request->data['image_path']['name'])) {
              $getFormvalue->imgdata = $imageFileName;
              $getFormvalue->image_path = $imagePath;
            }
            if ($this->Articles->save($getFormvalue)) {
              $this->Flash->success('Your profile has been sucessfully updated.');
              return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
            } else {
              $this->Flash->error('Records not be saved. Please, try again.');
            }
          } else {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
              $this->Flash->success(__('Your article has been saved.'));
              return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Unable to add your article.'));
          }
        }
      }
    }
    $this->set('article', $article);
  }

  public function edit($id = null)
  {
    $article = $this->Articles->get($id);

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
              move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/articles/' . $setNewFileName . '.' . $ext);

              //prepare the filename for database entry
              $imageFileName = $setNewFileName . '.' . $ext;
              $imagePath = 'articles/' . $setNewFileName . '.' . $ext;
            }

            $getFormvalue = $this->Articles->patchEntity($article, $this->request->data);

            $getFormvalue->body = nl2br($getFormvalue->body);

            if (!empty($this->request->data['image_path']['name'])) {
              $getFormvalue->imgdata = $imageFileName;
              $getFormvalue->image_path = $imagePath;
            }
            if ($this->Articles->save($getFormvalue)) {
              $this->Flash->success('Your profile has been sucessfully updated.');
              return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
            } else {
              $this->Flash->error('Records not be saved. Please, try again.');
            }
          } else {
            $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
              $this->Flash->success(__('Your article has been updated.'));
              return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
          }
        }
      }
    }

//
//    if ($this->request->is(['post', 'put'])) {
//      $this->Articles->patchEntity($article, $this->request->data);
//      if ($this->Articles->save($article)) {
//        $this->Flash->success(__('Your article has been updated.'));
//        return $this->redirect(['action' => 'index']);
//      }
//      $this->Flash->error(__('Unable to update your article.'));
//    }

    $this->set('article', $article);
  }

  public function delete($id)
  {
    $this->request->allowMethod(['post', 'delete']);

    $article = $this->Articles->get($id);
    if ($this->Articles->delete($article)) {
      $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
      return $this->redirect(['action' => 'index']);
    }
  }

}