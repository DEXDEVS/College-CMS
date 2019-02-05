<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
/**
 * ChatController implements the CRUD actions for Chat model.
 */
class ChatController extends Controller
{
    public function actionSendChat() {
        if (!empty($_POST)) {
            echo \sintret\chat\ChatRoom::sendChat($_POST);
        }
    }
}