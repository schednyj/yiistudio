<?php

use yii\helpers\Html;

$this->title = $subject;
?>
<?php if ($order) { ?>
    <p>Платежная операция по заказу <b>№<?= $order->id ?></b>.</p>
<?php } else { ?>
    <p>Платежная операция:</p>
<?php } ?>
<p><?= $description ?></p>
<?php if ($order) { ?>
    <p>Просмотреть заказ в панели управления вы можете <?= Html::a('здесь', $link) ?>.</p>
<?php } ?>
