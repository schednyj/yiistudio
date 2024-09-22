<?php

use yii\helpers\Html;
use yii\helpers\Url;
use admin\modules\editable\Editable;

/* @var $this \yii\web\View */
/* @var $model \admin\modules\comment\models\Comment */
/* @var $maxLevel null|integer comment max level */
?>
<li class="comment" id="comment-<?php echo $model->id; ?>">
    <div class="comment-content" data-comment-content-id="<?php echo $model->id ?>">
        <div class="comment-details">
            <div class="comment-action-buttons">
                <?php if (Yii::$app->getUser()->can('admin')) : ?>
                    <?php echo Html::a('<span class="fa fa-trash"></span> ' . Yii::t('admin/comment', 'Удалить'), '#', ['data' => ['action' => 'delete', 'url' => Url::to(['/comment/delete', 'id' => $model->id]), 'comment-id' => $model->id]]); ?>
                <?php endif; ?>
                <?php if (!Yii::$app->user->isGuest && ($model->level < $maxLevel || is_null($maxLevel))) : ?>
                    <?php echo Html::a("<span class='fa fa-share'></span> " . Yii::t('admin/comment', 'Ответить'), '#', ['class' => 'comment-reply', 'data' => ['action' => 'reply', 'comment-id' => $model->id]]); ?>
                <?php endif; ?>
            </div>
            <div class="comment-author-name">
                <span><?php echo $model->getAuthorName(); ?></span>
                <?php echo Html::a($model->getPostedDate(), $model->getAnchorUrl(), ['class' => 'comment-date']); ?>
            </div>
            <div class="comment-body">
                <?php if (Yii::$app->getModule('admin')->activeModules['comment']->settings['enableInlineEdit'] && Yii::$app->getUser()->can('admin')): ?>
                    <?php echo Editable::widget([
                        'model' => $model,
                        'attribute' => 'content',
                        'url' => '/comment/default/quick-edit',
                        'options' => [
                            'id' => 'editable-comment-' . $model->id,
                        ],
                    ]); ?>
                <?php else: ?>
                    <?php echo $model->getContent(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</li>
<?php if ($model->hasChildren()) : ?>
    <ul class="children">
        <?php foreach ($model->getChildren() as $children) : ?>
            <li class="comment" id="comment-<?php echo $children->id; ?>">
                <?php echo $this->render('_list', ['model' => $children, 'maxLevel' => $maxLevel]) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
