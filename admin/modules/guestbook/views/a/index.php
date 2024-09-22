<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use admin\modules\guestbook\models\Guestbook;

$this->title = Yii::t('admin/guestbook', 'Гостевая книга');

$module = $this->context->module->id;
?>

<?= $this->render('_menu') ?>

<?php if ($data->count > 0) : ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th width="50">#</th>
                <th><?= Yii::t('admin', $this->context->module->settings['enableTitle'] ? 'Заголовок' : 'Текст') ?></th>
                <th width="150"><?= Yii::t('admin', 'Дата') ?></th>
                <th width="100"><?= Yii::t('admin/guestbook', 'Ответ') ?></th>
                <th width="100"><?= Yii::t('admin', 'Статус') ?></th>
                <th width="30"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->models as $item) : ?>
                <tr>
                    <td><?= $item->primaryKey ?></td>
                    <td>
                        <?php if ($item->new) : ?>
                            <span class="label label-warning">NEW</span>
                        <?php endif; ?>
                        <a href="<?= Url::to(['/admin/' . $module . '/a/view', 'id' => $item->primaryKey]) ?>">
                            <?= ($item->title != '') ? $item->title : StringHelper::truncate($item->text, 120, '...') ?>
                        </a>
                    </td>
                    <td><?= Yii::$app->formatter->asDatetime($item->time, 'short') ?></td>
                    <td>
                        <?php if ($item->answer != '') : ?>
                            <span class="text-success"><?= Yii::t('admin', 'Да') ?></span>
                        <?php else : ?>
                            <span class="text-danger"><?= Yii::t('admin', 'Нет') ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="status">
                        <?=
                        Html::checkbox('', $item->status == Guestbook::STATUS_ON, [
                            'class' => 'switch',
                            'data-id' => $item->primaryKey,
                            'data-link' => Url::to(['/admin/' . $module . '/a']),
                        ])
                        ?>
                    </td>
                    <td class="control"><a href="<?= Url::to(['/admin/' . $module . '/a/delete', 'id' => $item->primaryKey]) ?>" class="fa fa-times text-red" title="<?= Yii::t('admin', 'Удалить запись') ?>"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?=
    yii\widgets\LinkPager::widget([
        'pagination' => $data->pagination
    ])
    ?>
<?php else : ?>
    <p><?= Yii::t('admin', 'Записи не найдены') ?></p>
<?php endif; ?>