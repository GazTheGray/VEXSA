<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 7:03 PM
 */


namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BrandsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->hasMany('Images');
  }

  public function validationDefault(Validator $validator)
  {
    $validator
      ->notEmpty('name')
      ->requirePresence('name');

    return $validator;
  }
}