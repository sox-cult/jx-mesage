<?php
namespace message\sender;
use yii;
class AlSender extends sender
{


    public $app_key;
    public $app_scr;

    /**
     * 初始化app_key 和 秘钥
     * AlSender constructor.
     */
    public function __construct()
    {
        $this->app_key = Yii::$app->params['message']['cl']['app_key']??'';
        $this->app_scr = Yii::$app->params['message']['cl']['app_scr']??'';
    }

    /**
     * 发送信息
     * @return bool
     */
    public function send()
    {
        // TODO: Implement send() method.
        try {
            return true;
        }catch (\Exception $e){
            $this->addError($e->getMessage());
            return false;
        }
    }

    /**
     * 设置发送信息
     * @param $to
     * @param $message
     * @param $from
     * @return $this
     */
    public function setMessage($to,$message,$from)
    {
        // TODO: Implement setMessage() method.
        $this->send_data = [
            'phone' => $to,
            'message' => $message,
        ];
        return $this;
    }


}