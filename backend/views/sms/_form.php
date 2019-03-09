<!-- bootstrap wysihtml5 - text editor -->
<!-- <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      
       $getStdInfo = Yii::$app->db->createCommand("SELECT std.std_name FROM std_personal_info as std WHERE std.std_id = '$id'")->queryAll();
       $StdName = $getStdInfo[0]['std_name'];
    ?>        
<<<<<<< HEAD
            <?= $form->field($model, 'sms_name')->textInput(['maxlength' => true, 'value'=>"$StdName", 'readonly' => true]) ?>
            
=======
    <?= $form->field($model, 'sms_name')->textInput(['maxlength' => true, 'value'=>"$StdName", 'readonly' => true]) ?>
>>>>>>> 621dfb795081e43b7aa3e487b295113f5da6ba83
    <?php } else{ ?>
            <?= $form->field($model, 'sms_name')->textInput(['maxlength' => true]) ?>
    <?php } ?> 

    <?= $form->field($model, 'sms_template')->textarea(['rows' => 6, 'id' => 'compose-textarea']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

  <?php ActiveForm::end(); ?>

</div>
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>