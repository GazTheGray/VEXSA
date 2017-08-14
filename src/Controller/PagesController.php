<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Hash;
use Cake\View\Helper\UrlHelper;
use Cake\View\Exception\MissingTemplateException;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

  /**
   * Displays a view
   *
   * @return void|\Cake\Network\Response
   * @throws \Cake\Network\Exception\NotFoundException When the view file could not
   *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
   */
  public function display()
  {
    $path = func_get_args();

    $count = count($path);
    if (!$count)
    {
      return $this->redirect('/');
    }
    $page = $subpage = null;

    if (!empty($path[0]))
    {
      $page = $path[0];
    }
    if (!empty($path[1]))
    {
      $subpage = $path[1];
    }
    $this->set(compact('page', 'subpage'));

    try
    {
      $this->render(implode('/', $path));
    }
    catch (MissingTemplateException $e)
    {
      if (Configure::read('debug'))
      {
        throw $e;
      }
      throw new NotFoundException();
    }
  }

  public function home()
  {
    $this->loadModel('Vehicles');
    $this->loadModel('VehicleImages');
    $this->loadModel('VehicleBrands');
    $this->loadModel('VehicleModels');

    $vehicleBrands = $this->VehicleBrands;
    $queryVehicleBrand = $vehicleBrands->find('all')
      ->order(["name" => "asc"])
      ->toArray();

    $vehicleModels = $this->VehicleModels;
    $queryVehicleModel = $vehicleModels->find('all')
      ->order(["name" => "asc"])
      ->toArray();

    $vehicleImages = $this->VehicleImages;

    //// Featured Vehicles - 6 ////
    $featuredVehiclesWithImages = $this->getFeaturedVehicles($queryVehicleBrand, $queryVehicleModel, $vehicleImages, 6);
    //// END | Featured Vehicles - 6 ////

    ////New Vehicles - 9 ////
    $newVehiclesWithImages = $this->getNewVehicles($queryVehicleBrand, $queryVehicleModel, $vehicleImages, 9);
    $newVehiCount = sizeof($newVehiclesWithImages);
    //// END | New Vehicles - 9 ////

    ////News - 9 ////
    $highlightedNews = $this->getHighlightedNews(3);
    //// END | News - 9 ////


    $this->set('featuredVehicles', $featuredVehiclesWithImages);
    $this->set('newVehicles', $newVehiclesWithImages);
    $this->set('newVehiCount', $newVehiCount);
    $this->set('highlightedNews', $highlightedNews);
    $this->set('vehicle_brands', $queryVehicleBrand);
    $this->set('vehicle_models', $queryVehicleModel);
  }

  public function about()
  {

  }

  public function contact()
  {
    $this->loadModel('Vehicles');
    $requestParams = $this->request->params;
    $requestData = $this->request->data;
    
    

    if (isset($requestParams['pass'][0]))
    {
      $this->loadModel('VehicleBrands');
      $this->loadModel('VehicleModels');

      $vehicleID = $requestParams['pass'][0];
      $vehicles = $this->Vehicles;

      $queryVehicles = $vehicles->find('all')
        ->where(["id" => "$vehicleID"])
        ->toArray();

      $vehicleBrands = $this->VehicleBrands;
      $queryVehicleBrand = $vehicleBrands->find('all')
        ->where(["id" => $queryVehicles[0]["vehicle_brand_id"]])
        ->toArray();

      $vehicleModels = $this->VehicleModels;
      $queryVehicleModel = $vehicleModels->find('all')
        ->where(["id" => $queryVehicles[0]["vehicle_model_id"]])
        ->toArray();

      $vehiDetails = $queryVehicles[0]["year"]
        . " " . $queryVehicleBrand[0]["name"]
        . " " . $queryVehicleModel[0]["name"];

      $sendStr = "Hi, \n I'd like to know more about this listing : $vehiDetails";

      $this->set('vehicleID', $vehicleID);
      $this->set('sendStr', $sendStr);
    }

    if (isset($requestData['email']))
    {
     // $this->viewBuilder()->layout(false);
    //  $this->autoRender = false;

      if (!isset($requestData['vehicle_id']))
      {
        $emailAddress = $requestData['email'];
        $name = $requestData['name'];
        $phone = $requestData['phone'];
        $message = $requestData['message'];
        $email = new Email('default');
        $email->template('contact_form', 'contact_form')
          ->emailFormat('html')
          ->viewVars(['name' => $name,
            'email' => $emailAddress,
            'phone' => $phone,
            'message' => $message,
          ])
          ->from(['enquiry@vehicleexportssa.co.za' => 'VEXSA.co.za'])
          ->to('info@vexsa.co.za')
          ->subject('VESA Contact Request')
          ->send();
      }
      else
      {
        $emailAddress = $requestData['email'];
        $name = $requestData['name'];
        $phone = $requestData['phone'];
        $message = $requestData['message'];
        $vehicleID = $requestData['vehicle_id'];

        $vehicles = $this->Vehicles;
        $queryVehicles = $vehicles->find('all')
          ->where(["id" => "$vehicleID"])
          ->toArray();
        $email = new Email('default');
        $email->template('contact_form', 'contact_form')
          ->emailFormat('html')
          ->viewVars(['name' => $name,
            'email' => $emailAddress,
            'phone' => $phone,
            'message' => $message,
            'vehicleDetails' => $queryVehicles[0],
          ])
          ->from(['enquiry@vehicleexportssa.co.za' => 'VEXSA.co.za'])
          ->to('info@vexsa.co.za')
          ->subject('VESA Vehicle Contact Request')
          ->send();
      }

      $response = json_encode('success');
      
      $this->Flash->success(__('Your contact form has been sent. We will get in touch with you as soon as we are able to. Thank you for your time.     Click anywhere on this message box to make it disappear.'));
      
	$this->set('response',$response);
		
    }
  }

  public function cars()
  {
    $this->loadModel('Vehicles');
    $this->loadModel('VehicleImages');
    $this->loadModel('VehicleBrands');
    $this->loadModel('VehicleModels');

    $vehicleBrands = $this->VehicleBrands;
    $queryVehicleBrand = $vehicleBrands->find('all')
      ->order(["name" => "asc"])
      ->toArray();

    $vehicleModels = $this->VehicleModels;
    $queryVehicleModel = $vehicleModels->find('all')
      ->order(["name" => "asc"])
      ->toArray();


    $vehicleImages = $this->VehicleImages;

    //// Featured Vehicles - 6 ////
    $featuredVehiclesWithImages = $this->getFeaturedVehicles($queryVehicleBrand, $queryVehicleModel, $vehicleImages, 6);
    //// END | Featured Vehicles - 6 ////

    ////New Vehicles - 9 ////
    $newVehiclesWithImages = $this->getNewVehicles($queryVehicleBrand, $queryVehicleModel, $vehicleImages, 9);
    //// END | New Vehicles - 9 ////

    ////News - 9 ////
    $highlightedNews = $this->getHighlightedNews(3);
    //// END | News - 9 ////




    $requestData = $this->request->data;

    if (isset($requestData['form-type']))
    {
      if ($requestData['form-type'] == 'filter')
      {
        $brandName = $requestData['brand'];
        $modelName = $requestData['model'];
        $transmission = $requestData['transmission'];
        $fuelType = $requestData['fuel_type'];
        $min_year = $requestData['min_year'];
        $max_year = $requestData['max_year'];
        $min_price = $requestData['min_price'];
        $max_price = $requestData['max_price'];
        $brandID = '';
        $modelID = '';

        $whereStatement = [];

        if ($brandName != 'All Makes')
        {
          $extract = Hash::extract($queryVehicleBrand, '{n}[name=' . $brandName . ']');
          $brandID = $extract[0]['id'];
          $whereStatement["vehicle_brand_id"] = $brandID;
        }
        if ($modelName != 'All Models' && $modelName != 'Select a Make')
        {
          $extract = Hash::extract($queryVehicleModel, '{n}[name=' . $modelName . ']');
          $modelID = $extract[0]['id'];
          $whereStatement["vehicle_model_id"] = $modelID;
        }

        $notInKey = ['form-type', 'brand', 'model'];
        $notInItem = ['All Fuels', 'Any Transmission', ''];
        $minKeys = ['min_year', 'max_year', 'min_price', 'max_price'];

        $yearMinMax = false;
        $priceMinMax = false;

        foreach ($requestData as $key => $item)
        {
          if (!in_array($key, $notInKey) && !in_array($item, $notInItem) && !empty($item) && !in_array($key, $minKeys))
          {
            $whereStatement["$key"] = $item;
          }
        }

        if (!empty($min_year) && !empty($max_year))
        {
          $yearMinMax = true;
        }

        if (!empty($min_price) && !empty($max_price))
        {
          $priceMinMax = true;
        }

        if (!empty($min_year) && empty($max_year))
        {
          $whereStatement["year >"] = $min_year;
        }
        if (!empty($max_year) && empty($min_year))
        {
          $whereStatement["year <"] = $max_year;
        }

        if (!empty($min_price) && empty($max_price))
        {
          $whereStatement["year >"] = $min_price;
        }
        if (!empty($max_price) && empty($min_price))
        {
          $whereStatement["year <"] = $max_price;
        }


        if ($yearMinMax == true && $priceMinMax == false)
        {
          $vehicles = $this->Vehicles;
          $queryVehicles = $vehicles
            ->find()
            ->where([function ($exp, $q) use ($min_year, $max_year)
            {
              return $exp->between('year', $min_year, $max_year);
            }, $whereStatement]);
        }
        elseif ($priceMinMax == true && $yearMinMax == false)
        {
          $vehicles = $this->Vehicles;
          $queryVehicles = $vehicles
            ->find()
            ->where([function ($exp, $q) use ($min_price, $max_price)
            {
              return $exp->between('price', $min_price, $max_price);
            }, $whereStatement]);
        }
        elseif ($priceMinMax == true && $yearMinMax == true)
        {
          $vehicles = $this->Vehicles;
          $queryVehicles = $vehicles
            ->find()
            ->where([
              function ($exp, $q) use ($min_price, $max_price)
              {
                return $exp->between('price', $min_price, $max_price);
              },
              $whereStatement,
              function ($exp, $q) use ($min_year, $max_year)
              {
                return $exp->between('year', $min_year, $max_year);
              }]);
        }
        else
        {
          $vehicles = $this->Vehicles;
          $queryVehicles = $vehicles
            ->find()
            ->where([$whereStatement]);
        }
        

        $result = $queryVehicles->toArray();

        if (!empty($result))
        {
          foreach ($result as $key => $vehicle)
          {
            $extraction = Hash::extract($queryVehicleBrand, '{n}[id=' . $vehicle['vehicle_brand_id'] . ']');
            $vehicle['vehicle_brand'] = $extraction[0];

            $extraction = Hash::extract($queryVehicleModel, '{n}[id=' . $vehicle['vehicle_model_id'] . ']');
            $vehicle['vehicle_model'] = $extraction[0];

            array_push($featuredVehiclesWithImages, $vehicle);
            $queryVehicleImages = $vehicleImages->find()
              ->where(['vehicle_id =' => $vehicle['id']])
              ->limit(3)
              ->toArray();
            $result["$key"]["vehicle_images"] = [];

            foreach ($queryVehicleImages as $queryVehicleImage)
            {
              array_push($result["$key"]["vehicle_images"], $queryVehicleImage);
            }
          }
          
          if (!empty($result)){
              $this->set('filteredVehiclesWithImages',$result);
          }
        }
        else
        {
        $this->Flash->error(__('No results found for your current search selection. Please try again with different search selections. Alternatively get in contact with us, we may be able to assist you finding vehicles not listed on the site.     Click anywhere on this message box to make it disappear.'));
        
        }
      }
    }

    $queryVehicleBrand = array_chunk($queryVehicleBrand, 9);

//    pd('Are you really done yet?');


    $this->set('featuredVehicles', $featuredVehiclesWithImages);
    $this->set('newVehicles', $newVehiclesWithImages);
    $this->set('vehicleBrands', $queryVehicleBrand[0]);
    $this->set('vehicleModels', $queryVehicleModel);
  }

  public function news()
  {
    $monthsList = ['01' => "January",
      '02' => "February",
      '03' => "March",
      '04' => "April",
      '05' => "May",
      '06' => "June",
      '07' => "July",
      '08' => "August",
      '09' => "September",
      '10' => "October",
      '11' => "November",
      '12' => "December",
    ];
    $this->loadModel('Articles');
    $articles = $this->Articles->find('all')
      ->order(["created" => "desc"]);

    $pass = $this->request->params['pass'];
    $newsHeader = 'Featured News';

    if (!empty($pass))
    {
      $pass = explode("-", $pass[0]);
      $monthLowerStr = $pass[0];
      $monthUpperStr = trim(ucwords($monthLowerStr));
      $year = $pass[1];
      $monthNum = '';
      $articlesHighlighted = [];
      $articlesGeneral = [];
      $monthsAvailable = [];

      $newsHeader = $newsHeader . " For " . $monthUpperStr . " " . $year;

      foreach ($monthsList as $key => $item)
      {
        if ($item == $monthUpperStr)
        {
          $monthNum = $key;
        }
      }

      foreach ($articles as $article)
      {
        if ($article['archived'] == 0)
        {
          $createdMonth = date_format($article["created"], "m");
          $createdYear = date_format($article["created"], "Y");
          $extract = Hash::extract($monthsList, "$createdMonth");
          $extract = $extract[0];

          if (isset($article['highlighted']))
          {
            if ($article['highlighted'] == 1)
            {
              array_push($articlesHighlighted, $article);
            }
            else
            {
              if ($monthUpperStr == $extract)
              {
                array_push($articlesGeneral, $article);
              }
            }
          }
          else
          {
            if ($monthUpperStr == $extract)
            {
              array_push($articlesGeneral, $article);
            }
          }
          $createdMonth = date_format($article["created"], "m");
          $createdYear = date_format($article["created"], "Y");
          $extract = Hash::extract($monthsList, "$createdMonth");

          if (!in_array($extract[0] . " " . $createdYear, $monthsAvailable))
          {
            array_push($monthsAvailable, $extract[0] . " " . $createdYear);
          }
        }
      }
    }
    else
    {
      $articlesHighlighted = [];
      $articlesGeneral = [];
      $monthsAvailable = [];
      $this->set('isNews', true);

      foreach ($articles as $article)
      {
        if ($article['archived'] == 0)
        {

          if (isset($article['highlighted']))
          {
            if ($article['highlighted'] == 1)
            {
              array_push($articlesHighlighted, $article);
            }
            else
            {
              array_push($articlesGeneral, $article);
            }
          }
          else
          {
            array_push($articlesGeneral, $article);
          }

          $createdMonth = date_format($article["created"], "m");
          $createdYear = date_format($article["created"], "Y");
          $extract = Hash::extract($monthsList, "$createdMonth");
          if (!in_array($extract[0] . " " . $createdYear, $monthsAvailable))
          {
            array_push($monthsAvailable, $extract[0] . " " . $createdYear);
          }
        }
      }
    }

    $this->set('newsHeader', $newsHeader);

    if (!empty($articlesHighlighted))
    {
      $this->set('articlesHighlighted', $articlesHighlighted);
    }

    if (!empty($articlesGeneral))
    {
      $this->set('articles', $articlesGeneral);
    }

    if (!empty($monthsAvailable))
    {
      $monthsAvailable = array_chunk($monthsAvailable, 6);
      $this->set('monthsAvailable', $monthsAvailable);
    }
  }

  public function news_filtered()
  {

  }

  private function getNewVehicles($brandDetails, $modelDetails, $vehiImages, $limit)
  {
    $newVehiclesWithImages = [];
    $newVehicles = $this->Vehicles->find('all')
      ->order(["created" => 'desc'])
      ->limit($limit)
      ->toArray();

    foreach ($newVehicles as $key => $vehicle)
    {
      $extraction = Hash::extract($brandDetails, '{n}[id=' . $vehicle['vehicle_brand_id'] . ']');
      $vehicle['vehicle_brand'] = $extraction[0];

      $extraction = Hash::extract($modelDetails, '{n}[id=' . $vehicle['vehicle_model_id'] . ']');
      $vehicle['vehicle_model'] = $extraction[0];

      array_push($newVehiclesWithImages, $vehicle);
      $queryVehicleImages = $vehiImages->find()
        ->where(['vehicle_id =' => $vehicle['id']])
        ->limit(3)
        ->toArray();
      $newVehiclesWithImages["$key"]["vehicle_images"] = [];

      foreach ($queryVehicleImages as $queryVehicleImage)
      {
        array_push($newVehiclesWithImages["$key"]["vehicle_images"], $queryVehicleImage);
      }
    }

    return $newVehiclesWithImages;
  }

  private function getVehiclesBodyType($brandDetails, $modelDetails, $vehiImages, $bodyType, $limit)
  {
    $newVehiclesWithImages = [];
    $newVehicles = $this->Vehicles->find('all')
      ->where([
        'body_type =' => $bodyType,
      ])
      ->order(["created" => 'desc'])
      ->limit($limit)
      ->toArray();

    foreach ($newVehicles as $key => $vehicle)
    {
      $extraction = Hash::extract($brandDetails, '{n}[id=' . $vehicle['vehicle_brand_id'] . ']');
      $vehicle['vehicle_brand'] = $extraction[0];

      $extraction = Hash::extract($modelDetails, '{n}[id=' . $vehicle['vehicle_model_id'] . ']');
      $vehicle['vehicle_model'] = $extraction[0];

      array_push($newVehiclesWithImages, $vehicle);
      $queryVehicleImages = $vehiImages->find()
        ->where(['vehicle_id =' => $vehicle['id']])
        ->limit(3)
        ->toArray();
      $newVehiclesWithImages["$key"]["vehicle_images"] = [];

      foreach ($queryVehicleImages as $queryVehicleImage)
      {
        array_push($newVehiclesWithImages["$key"]["vehicle_images"], $queryVehicleImage);
      }
    }

    return $newVehiclesWithImages;
  }

  private function getVehiclesByBrands($brandDetails, $modelDetails, $vehiImages, $brand_id, $limit)
  {
    $newVehiclesWithImages = [];
    $newVehicles = $this->Vehicles->find('all')
      ->where([
        'vehicle_brand_id =' => $brand_id,
      ])
      ->order(["created" => 'desc'])
      ->limit($limit)
      ->toArray();

    $brand_name = '';
    
    pd();

    foreach ($newVehicles as $key => $vehicle)
    {
      $extraction = Hash::extract($brandDetails, '{n}[id=' . $vehicle['vehicle_brand_id'] . ']');
      $vehicle['vehicle_brand'] = $extraction[0];

      $extraction = Hash::extract($modelDetails, '{n}[id=' . $vehicle['vehicle_model_id'] . ']');
      $vehicle['vehicle_model'] = $extraction[0];

      $brand_name = $vehicle['vehicle_brand'];

      array_push($newVehiclesWithImages, $vehicle);
      $queryVehicleImages = $vehiImages->find()
        ->where(['vehicle_id =' => $vehicle['id']])
        ->limit(3)
        ->toArray();
      $newVehiclesWithImages["$key"]["vehicle_images"] = [];

      foreach ($queryVehicleImages as $queryVehicleImage)
      {
        array_push($newVehiclesWithImages["$key"]["vehicle_images"], $queryVehicleImage);
      }
    }

    $returnArray = ['response' => $newVehiclesWithImages, 'brand_name' => $brand_name];

    return $returnArray;
  }

  private function getFeaturedVehicles($brandDetails, $modelDetails, $vehiImages, $limit)
  {
    $featuredVehiclesWithImages = [];
    $featuredVehicles = $this->Vehicles->find('all', array(
      'conditions' => array('Vehicles.featured' => '1'),
      'order' => 'rand()',
      'limit' => $limit,
    ))->toArray();


    foreach ($featuredVehicles as $key => $vehicle)
    {
      $extraction = Hash::extract($brandDetails, '{n}[id=' . $vehicle['vehicle_brand_id'] . ']');
      $vehicle['vehicle_brand'] = $extraction[0];

      $extraction = Hash::extract($modelDetails, '{n}[id=' . $vehicle['vehicle_model_id'] . ']');
      $vehicle['vehicle_model'] = $extraction[0];

      array_push($featuredVehiclesWithImages, $vehicle);
      $queryVehicleImages = $vehiImages->find()
        ->where(['vehicle_id =' => $vehicle['id']])
        ->limit(3)
        ->toArray();
      $featuredVehiclesWithImages["$key"]["vehicle_images"] = [];

      foreach ($queryVehicleImages as $queryVehicleImage)
      {
        array_push($featuredVehiclesWithImages["$key"]["vehicle_images"], $queryVehicleImage);
      }
    }

    return $featuredVehiclesWithImages;
  }

  private function getHighlightedNews($limit)
  {
    $monthsList = ['01' => "January",
      '02' => "February",
      '03' => "March",
      '04' => "April",
      '05' => "May",
      '06' => "June",
      '07' => "July",
      '08' => "August",
      '09' => "September",
      '10' => "October",
      '11' => "November",
      '12' => "December",
    ];
    $this->loadModel('Articles');
    $articles = $this->Articles->find('all')
      ->where(["highlighted" => "1"])
      ->order(["created" => "desc"])
      ->limit($limit);


    $articlesHighlighted = [];
    $articlesGeneral = [];
    $monthsAvailable = [];
    $this->set('isNews', true);

    foreach ($articles as $article)
    {
      if ($article['archived'] == 0)
      {
        array_push($articlesHighlighted, $article);

        $createdMonth = date_format($article["created"], "m");
        $createdYear = date_format($article["created"], "Y");
        $extract = Hash::extract($monthsList, "$createdMonth");
        if (!in_array($extract[0] . " " . $createdYear, $monthsAvailable))
        {
          array_push($monthsAvailable, $extract[0] . " " . $createdYear);
        }
      }
    }


    return $articlesHighlighted;
  }

  public function filterByBody()
  {
    $this->loadModel('Vehicles');
    $this->loadModel('VehicleImages');
    $this->loadModel('VehicleBrands');
    $this->loadModel('VehicleModels');


    $this->viewBuilder()->layout(false);
    $this->autoRender = false;

    $requestData = $this->request->data;

    if (isset($requestData['body_type']))
    {
      $vehicleBrands = $this->VehicleBrands;
      $queryVehicleBrand = $vehicleBrands->find('all')
        ->toArray();

      $vehicleModels = $this->VehicleModels;
      $queryVehicleModel = $vehicleModels->find('all')
        ->toArray();

      $vehicleImages = $this->VehicleImages;

      $filterByName = $requestData['body_type'];

      $results = $this->getVehiclesBodyType($queryVehicleBrand, $queryVehicleModel, $vehicleImages, $filterByName, 9);

      $sizeOf = sizeof($results);

      $this->viewBuilder()->template('filter');
      $this->set('filteredVehicles', $results);
      $this->set('body_type', $filterByName);
      $this->set('sizeOf', $sizeOf);
      // Call the render() method returns the current CakeResponse object
      $response = $this->render();
      // Add any other data that needs to be returned in the response
      // along with the generated html
      $jsonResponse = array(
        'html' => $response->body(),
      );
      // Replace the response body with the json encoded data
      $response->body(json_encode($jsonResponse));
    }
  }

  public function filterByBrand()
  {
    $this->loadModel('Vehicles');
    $this->loadModel('VehicleImages');
    $this->loadModel('VehicleBrands');
    $this->loadModel('VehicleModels');


    $this->viewBuilder()->layout(false);
    $this->autoRender = false;

    $requestData = $this->request->data;

    if (isset($requestData['brand_id']))
    {
      $vehicleBrands = $this->VehicleBrands;
      $queryVehicleBrand = $vehicleBrands->find('all')
        ->toArray();

      $vehicleModels = $this->VehicleModels;
      $queryVehicleModel = $vehicleModels->find('all')
        ->toArray();

      $vehicleImages = $this->VehicleImages;

      $filterBybrandID = $requestData['brand_id'];

      $results = $this->getVehiclesByBrands($queryVehicleBrand, $queryVehicleModel, $vehicleImages, $filterBybrandID, 9);
      if (!empty($results['response']))
      {

        $sizeOf = sizeof($results['response']);

        $this->viewBuilder()->template('filter');
        $this->set('filteredVehicles', $results['response']);
        $this->set('body_type', $results['brand_name']['name']);
        $this->set('sizeOf', $sizeOf);
        // Call the render() method returns the current CakeResponse object
        $response = $this->render();
        // Add any other data that needs to be returned in the response
        // along with the generated html
        $jsonResponse = array(
          'html' => $response->body(),
        );
        // Replace the response body with the json encoded data
        $response->body(json_encode($jsonResponse));
      }
    }
  }

  public function vehicle()
  {
    $this->loadModel('Vehicles');
    $this->loadModel('VehicleImages');
    $this->loadModel('VehicleBrands');
    $this->loadModel('VehicleModels');

    $vehicleImages = $this->VehicleImages;

    $requestParams = $this->request->params;

    $vehicleBrands = $this->VehicleBrands;
    $queryVehicleBrand = $vehicleBrands->find('all')
      ->toArray();

    $vehicleModels = $this->VehicleModels;
    $queryVehicleModel = $vehicleModels->find('all')
      ->toArray();


    //// Featured Vehicles - 6 ////
    $featuredVehiclesWithImages = $this->getFeaturedVehicles($queryVehicleBrand, $queryVehicleModel, $vehicleImages, 9);
    //// END | Featured Vehicles - 6 ////

    if (isset($requestParams['pass'][0]))
    {
      $vehicleID = $requestParams['pass'][0];
      $vehicles = $this->Vehicles;
      $queryVehicles = $vehicles->find('all')
        ->where(["id" => "$vehicleID"])
        ->toArray();

      $views = $queryVehicles[0]['views'];
      $views++;

      $query = $vehicles->query();
      $query->update()
        ->set(['views' => $views])
        ->where(['id' => $vehicleID])
        ->execute();


      $vehicleBrands = $this->VehicleBrands;
      $queryVehicleBrand = $vehicleBrands->find('all')
        ->where(["id" => $queryVehicles[0]["vehicle_brand_id"]])
        ->toArray();

      $vehicleModels = $this->VehicleModels;
      $queryVehicleModel = $vehicleModels->find('all')
        ->where(["id" => $queryVehicles[0]["vehicle_model_id"]])
        ->toArray();


      $queryVehicleImages = $vehicleImages->find()
        ->where(['vehicle_id =' => $queryVehicles[0]['id']])
        ->toArray();

      $queryVehicles[0]["vehicle_images"] = [];

      $extraction = Hash::extract($queryVehicleBrand, '{n}[id=' . $queryVehicles[0]['vehicle_brand_id'] . ']');
      $queryVehicles[0]['vehicle_brand'] = $extraction[0];

      $extraction = Hash::extract($queryVehicleModel, '{n}[id=' . $queryVehicles[0]['vehicle_model_id'] . ']');
      $queryVehicles[0]['vehicle_model'] = $extraction[0];


      foreach ($queryVehicleImages as $queryVehicleImage)
      {
        array_push($queryVehicles[0]["vehicle_images"], $queryVehicleImage);
      }

      $this->set('vehicleDetails', $queryVehicles[0]);
    }


    $basePath = Router::url('/', true);


    $queryVehicleBrand = array_chunk($queryVehicleBrand, 9);

    $this->set('basePath', $basePath);
    $this->set('featuredVehicles', $featuredVehiclesWithImages);
    $this->set('vehicleBrands', $queryVehicleBrand);
  }

  
}
