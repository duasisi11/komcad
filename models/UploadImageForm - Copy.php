<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;

class UploadImageForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $folder;
	public $imgFile;

    public function rules()
    {
        return [
            [['folder'], 'string'],
			[['imgFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg'],
        ];
    }
	
	/**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imgFile' => 'File Image',
        ];
    }
    

    public function upload_img($no_registrasi)
    {
		$newFileName = $no_registrasi.'_'.$this->folder;
        //print_r($newFileName);exit;
        
        if ($this->validate()) {
            //$this->imgFile->saveAs('uploads/dokumen/'.$this->folder.'/' . $this->imgFile->baseName . '.' . $this->imgFile->extension);
			$this->imgFile->saveAs('uploads/dokumen/'.$this->folder.'/' . $newFileName . '.' . $this->imgFile->extension);
            return true;
        } else {
            return false;
        }
    }
	
	 public function upload_posts_img($id_posts , $user)
    {
		$newFileName = $this->folder.'_'.$user.$id_posts;
        //print_r($newFileName);exit;
		
		$imgPath = 'uploads/'.$this->folder.'/'; // as an example
		$imgName = $newFileName;
		$fileExt = '.'.$this->imgFile->extension;  

		$originFile = $imgPath . $imgName  . $fileExt;
		$thumbnFile = $imgPath . $imgName  . '-thumb' . $fileExt;
        if ($this->validate()) {
			$this->imgFile->saveAs($originFile);
			// Generate a thumbnail image
			Image::thumbnail($originFile, 200, 200)->save($thumbnFile, ['quality' => 50]);
			
            return ['imgName' => $imgName, 'fileExt' => $fileExt];
        } else {
            return false;
        }
    }
}