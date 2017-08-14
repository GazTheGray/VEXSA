<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/07/10
 * Time: 6:13 PM
 */
namespace App\Controller;

class ImagesController extends AppController
{
  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Flash'); // Include the FlashComponent
    $this->viewBuilder()->layout('users');
  }

  public function index()
  {

  }

  public function add()
  {
    $vehicle = $this->Vehicles->newEntity();

  }
}