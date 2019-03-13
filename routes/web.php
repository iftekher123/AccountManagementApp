<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

 $router->get('/', function () use ($router) 
 {
 //	   return $router->app->version();
});
 

$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('accounts',  ['uses' => 'AccountController@showAllAccounts']);
  $router->get('accounts/{id}',  ['uses' => 'AccountController@showOneAccount']); 	
  $router->get('accounts/{id}/link/transactiondetail', ['uses' => 'AccountController@showTransactionDetail']);

  
  
});



