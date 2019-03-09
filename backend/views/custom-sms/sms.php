<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomSms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-sms-form">

    <?php $form = ActiveForm::begin(); ?>


    <textarea name="" id="compose-textarea" cols="100" rows="10"></textarea>

  

    <?php ActiveForm::end(); ?>
    
</div>
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
