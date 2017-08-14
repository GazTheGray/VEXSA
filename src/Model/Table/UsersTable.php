<?php
/**
 * Created by PhpStorm.
 * User: Nihilum
 * Date: 2016/06/27
 * Time: 6:54 PM
 */
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

  public function validationDefault(Validator $validator)
  {
    return $validator
      ->notEmpty('username', 'A username is required')
      ->notEmpty('password', 'A password is required')
      ->notEmpty('role', 'A role is required')
      ->add('role', 'inList', [
        'rule' => ['inList', ['admin', 'author']],
        'message' => 'Please enter a valid role'
      ]);
  }

}