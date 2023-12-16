<?php

namespace tests\unit\controllers;

use app\controllers\BookController;

class BookControllerTest extends \Codeception\Test\Unit
{
    
    public function testActionCreateBook(){
        //$controller->enableCsrfValidation = false; // Disabling CSRF validation for testing
       
        $request = new Request();
        $response = new Response();
    
        Yii::$app->controller = $controller;
        Yii::$app->request = $request;
        Yii::$app->response = $response;
    
        // Simulate a POST request with valid data
        Yii::$app->request->setMethod('POST');
        Yii::$app->request->setBodyParams([
            'Book' => [
                'title' => 'test',
                'author' => 'diana test',
                
            ],
        ]);
        
        $book= BookController::actionCreateBook();
       
        verify($book= BookController::actionCreateBook('title=foobar&test2=helloWorld'))->notEmpty();
        verify($book->validateAuthKey('title'))->notEmpty();
        // You can add assertions here to check the behavior of the action
        // For instance, if you expect a redirection upon successful user creation:
        $this->assertInstanceOf('yii\web\Response', $result);
        $this->assertTrue($response->isRedirect(302)); // Assuming a successful creation redirects

        // Or if you want to check the rendered view when there's an error in form submission:
        // $this->assertEquals('create', $result->requestedAction->id); // Assuming 'create' is the view rendered on form error

    }

    /////


    
    

   
   

    

}