<?php

use yii\widgets\Pjax;
?>
<div class="rating-wrapper" id="<?php echo $ratingWrapperId; ?>">
    <?php Pjax::begin(['enablePushState' => false, 'timeout' => 20000, 'id' => $pjaxContainerId]); ?>
    <?php
    $ratingsCount = $ratingModel->getRatingsCount();
    if ($ratingsCount > 0) {
        $rating = $rating / $ratingsCount;
    }
    ?>
    <span class="rating"><span data-action="create" data-value="5" class="star <?= $rating > 4.5 ? 'star-hover' : '' ?>" ></span><span data-action="create" data-value="4"  title="4 звезды" class="star <?= $rating > 3.5 ? 'star-hover' : '' ?>"></span><span data-action="create" data-value="3" class="star <?= $rating > 2.5 ? 'star-hover' : '' ?>"></span><span data-action="create" data-value="2" class="star <?= $rating > 1.5 ? 'star-hover' : '' ?>"></span><span data-action="create" data-value="1" class="star <?= $rating > 0.5 ? 'star-hover' : '' ?>"></span></span>
    <?php if ($ratingsCount > 0) { ?>
        <span style="display: inline-block"><?= '<span class="c-first">(' . Yii::$app->formatter->asDecimal($rating, 1) . ')</span> ' . Yii::t('admin/comment', 'На основе {0} отзывов', $ratingsCount); ?></span>
    <?php } ?>
    <?php
        echo $this->render('_form', [
            'ratingModel' => $ratingModel,
            'formId' => $formId,
            'encryptedEntity' => $encryptedEntity,
        ]);
    ?>

    <?php Pjax::end(); ?>
</div>
