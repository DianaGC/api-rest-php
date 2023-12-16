<?php

namespace app\models;

use yii\mongodb\ActiveRecord;

class Book extends ActiveRecord 
{
    public static function collectionName(){
        return 'books';
    }

    public function attributes()
    {
        return[
            '_id',
            'title',
            'author',
            'yearPublication',
            'genre',
            'language',
            'description'
        ];
    } 

    public function rules()
    {
        return [
            // Define validation rules 
            [['title','author'], 'string', 'max' =>255]
        ];
    }
  
}