<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
 {
    public $imageFile;

    public function rules()
     {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/umum/' . $this->imageFile->baseName . '.' . $this ->imageFile->extension);
            return true ;
        } else {
            return false ;
        }
    }
}