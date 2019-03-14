<?php
namespace frontend\models;

use yii\base\Model;
use yii\helpers\Url;
use common\models\User;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $user_login_id;
    public $username;
    public $email;
    public $password;
    public $user_photo;
    public $user_type;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username','user_login_id','user_type'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['user_photo'], 'string', 'max' => 200],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['user_login_id','user_type'] ,'string']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->user_login_id = $this->user_login_id;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->user_photo = $this->user_photo;
        $user->user_type = $this->user_type;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }

    public function getPhotoInfo(){


        $path = Url::to('@common/userphotos/');
        $url = Url::to('@common/userphotos/');
        
        $filename = $this->username.'_photo'.'.jpg';
        $alt = $this->username."'s image not exist!";

        $imageInfo = ['alt'=>$alt];

        if(file_exists($path.$filename)){
            $imageInfo['url'] = $url.'default.jpg';
        }  else {
            $imageInfo['url'] = $url.$filename; 
        }
        return $imageInfo;
    }

}
