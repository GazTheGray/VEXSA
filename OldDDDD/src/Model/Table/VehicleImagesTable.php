<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/07/10
 * Time: 6:14 PM
 */

use Cake\ORM\Table;
use Cake\Validation\Validator;

class VehicleImagesTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
  }

  public function validationDefault(Validator $validator)
  {
//    $validator
//      ->notEmpty('make')
//      ->requirePresence('make')
//      ->notEmpty('model')
//      ->requirePresence('model')
//      ->notEmpty('year')
//      ->requirePresence('year')
//      ->notEmpty('grouping')
//      ->requirePresence('grouping')
//      ->notEmpty('notes')
//      ->requirePresence('notes')
//      ->add('notes', [
//        'maxLength' => [
//          'rule' => ['maxLength', 512],
//          'message' => 'Comments cannot be too long.'
//        ]
//      ]);
//
//    return $validator;
  }
}