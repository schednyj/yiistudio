<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $registrationForm \frontend\models\RegistrationForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use admin\models\Setting;
use admin\widgets\ReCaptcha;

$this->title = Yii::t('admin', 'Регистрация');
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?php if (!Yii::$app->request->isAjax) { ?>
        <h1><?= Html::encode($this->title) ?></h1>
    <?php } ?>
    <p><?= Yii::t('admin', 'Пожалуйста, заполните для регистрации') ?>:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-registration']); ?>

            <?php
            $first = true;
            foreach ($registrationForm->attributes as $key => $value) {
                ?>
                <?php if ($key == 'email') { ?>
                    <?= $form->field($registrationForm, 'email')->textInput(['autofocus' => $first]) ?>
                    <?php
                } elseif ($key == 'password') {
                    if (!Setting::get('generatePasswordRegistration')) {
                        ?>
                        <?= $form->field($registrationForm, 'password')->passwordInput(['autofocus' => $first]) ?>
                        <?php
                    }
                } elseif ($key == 'reCaptcha') {
                    if (Setting::get('enableCaptchaRegistration')) {
                        ?>       
                        <?= $form->field($registrationForm, 'reCaptcha')->widget(ReCaptcha::className()); ?>
                        <?php
                    }
                } else {
                    ?>    
                    <?= $form->field($registrationForm, $key)->textInput(['autofocus' => $first]) ?>
                    <?php
                }
                $first = false;
            }
            ?>
            <div class="form-group">
            <?= Html::submitButton(Yii::t('admin', 'Зарегистрироваться'), ['class' => 'btn btn-primary', 'name' => 'registration-button']) ?>
            </div>
                <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
