<?php
namespace admin\widgets;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use admin\models\Photo;

class Photos extends Widget
{
    public $model;
    public $save_model = false;

    public function init()
    {
        parent::init();

        if (empty($this->model)) {
            throw new InvalidConfigException('Required `model` param isn\'t set.');
        }
    }

    public function run()
    {
        $photos = Photo::find()->where(['class' => get_class($this->model), 'item_id' => $this->model->primaryKey])->sort()->all();
        echo $this->render('photos', [
            'photos' => $photos
        ]);
    }

}