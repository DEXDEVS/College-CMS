<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomSms */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
      margin: 0; 
    }
</style>
<div class="custom-sms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'send_to')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6, 'id' => 'message']) ?>
    
    <p>
      <span><b>NOTE:</b> 160 characters = 1 SMS</span>
        <span id="remaining" class="pull-right">160 characters remaining </span>
      <span id="messages" style="text-align: center;">/ Count SMS(0)</span>
      <input type="hidden" value="" id="count"><br>
      <input type="text" value="" id="sms" style="border: none; color: green; font-weight: bold;">
    </p>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>

    <?php 
    global $count;
    $countNumbers = 10; 
    ?>
    
</div>
<script>
  $(document).ready(function(){
      var $remaining = $('#remaining'),
          $messages = $remaining.next();
      var numbers = '<?php echo $countNumbers; ?>';
      $('#message').keyup(function(){
          var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
          $messages.text('/ Count SMS (' + messages + ')');
          $messages.css('color', 'red');
          $remaining.text(remaining + ' characters remaining');
          
          $('#count').val(messages);
        var countSMS = $('#count').val();
          var sms = parseInt(countSMS * numbers);
          $('#sms').val("Your Consumed SMS: (" + sms+ ")");
      });
  });
</script>
