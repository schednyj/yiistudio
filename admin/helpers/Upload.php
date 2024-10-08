<?php

namespace admin\helpers;

use Yii;
use yii\web\UploadedFile;
use \yii\web\HttpException;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\FileHelper;

class Upload {

    public static $UPLOADS_DIR = 'uploads';

    public static function file(UploadedFile $fileInstance, $dir = '', $namePostfix = true, $fileName = null) {
        if (!$fileName) {
            $fileName = Upload::getFileName($fileInstance, $namePostfix);
        }
        $fileName = Upload::getUploadPath($dir) . DIRECTORY_SEPARATOR . $fileName;

        if (!$fileInstance->saveAs($fileName)) {
            throw new HttpException(500, 'Cannot upload file "' . $fileName . '". Please check write permissions.');
        }
        return Upload::getLink($fileName);
    }

    static function getUploadPath($dir) {
        $uploadPath = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . self::$UPLOADS_DIR . ($dir ? DIRECTORY_SEPARATOR . $dir : '');
        if (!FileHelper::createDirectory($uploadPath)) {
            throw new HttpException(500, 'Cannot create "' . $uploadPath . '". Please check write permissions.');
        }
        return $uploadPath;
    }

    static function getLink($fileName) {
        return str_replace('\\', '/', str_replace(Yii::getAlias('@webroot'), '', $fileName));
    }

    static function getFileName($fileInstanse, $namePostfix = true, $withExtension = true) {
        $baseName = str_ireplace('.' . $fileInstanse->extension, '', $fileInstanse->name);
        $fileName = StringHelper::truncate(Inflector::slug($baseName), 32, '');
        if ($namePostfix || !$fileName) {
            $fileName .= ($fileName ? '_' : '') . substr(uniqid(md5(rand()), true), 0, 10);
        }
        if ($withExtension) {
            $fileName .= '.' . $fileInstanse->extension;
        }
        return $fileName;
    }

}
