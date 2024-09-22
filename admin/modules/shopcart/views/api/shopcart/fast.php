<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php if (count($goods)) : ?>
    <div class="row mb-20">

        <?php
        foreach ($goods as $good) :
            ?>
            <div class="col-md-2">
                <?= Html::img($good->item->thumb(90, 90)) ?>
            </div>
            <div class="col-md-8">
                <h3><?= $good->item->title ?></h3>
            </div>
            <div class="col-md-2">
                <h3>                                           
                    <?php if ($good->discount) : ?>
                        <del class="text-muted"><small><?= $good->oldPrice ?></small></del>
                    <?php endif; ?>
                            <?= $good->price ?> <i class="fas fa-ruble-sign"></i>                    
                </h3>
            </div>
        <?php endforeach; ?>
    </div>           
    </div>
    <?= $this->render('_create_order', ['orderForm' => $orderForm,'fast' => true]) ?>
<?php else : ?>
    <p><?= Yii::t('admin/shopcart', 'В корзине пока еще нет товаров') ?></p>
<?php endif; ?>