<?php
namespace app\controllers;
use yii\rest\ActiveController;

use Yii;
use yii\web\Controller;
use app\models\Book;


class BookController extends ActiveController{
  public $modelClass = 'app\models\Book';

  public function actionGetById()
  {
    $post=Yii::$app->request->post('id');
    $model = $this->findModel($id);
    return $model;
  }

  public function  actionCreateBook()
  {
    $model = new Book();
    $postData = Yii::$app->request->post();
    // Assigning values to attributes
    $model->title = $postData['title'];
    $model->author = $postData['author'];
    $model->yearPublication = $postData['yearPublication'];
    $model->genre = $postData['genre'];
    $model->language = $postData['language'];
    $model->description = $postData['description'];

    // Save the record
    if($model->insert($postData)) {
        // Record was inserted successfully
        return array('status' => true, 'data' => 'Book created successfully');
    } else {
        // Failed to insert record
        return array('status' => false, 'data' => $book -> getErrors());
    }
  }

  public function  actionGetBookByLanguage($language)
  {
      $model = Book::findAll(['language' => $language]); 
      return $model;
  }

  public function  actionGetBookById($id)
  {
      $model = Book::findOne(['_id' => $id]); 
      return $model;
  }

  public function  actionUpdateBook($language)
  {
      $model = Book::findAll(['language' => $language]); 
      return $model;

        if (!$model) {
            throw new \yii\web\NotFoundHttpException('The requested does not exist.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Record updated successfully.');
            return $this->redirect(['view', 'id' => (string)$model->_id]); // Redirect to view action or any other action
        }

        return $this->render('update', [
            'model' => $model,
        ]);
  }

  public function  actionDeleteBook($id)
  {
    $model = Book::findOne(['_id' => $id]);
    if (!$model) {
      throw new NotFoundHttpException('Record not found.');
    }
    if ($model->delete()) {
      \Yii::$app->response->setStatusCode(204); 
      return array('status' => true, 'data' => 'Book delete successfully');
    } else {
      throw new \yii\web\ServerErrorHttpException('Failed to delete the record.');
    }
    return $model;
  }
  
}
