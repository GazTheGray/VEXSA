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

class ArticlesTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
  }

  public function validationDefault(Validator $validator)
  {
    $validator
      ->notEmpty('title')
      ->requirePresence('title')
      ->notEmpty('body')
      ->requirePresence('body')
      ->add('body', [
        'maxLength' => [
          'rule' => ['maxLength', 5000],
          'message' => 'Comments cannot be too long.'
        ]
      ]);

    return $validator;
  }
}