<?php
namespace common\service\message\sender;

abstract class sender
{

    public $error = '';
    public $send_data;

    /**
     * 发送信息，返回 true 或者 false
     * @return bool
     */
   abstract function send();

    /**
     * 设置需要发送的数据
     * @param $to
     * @param $message
     * @param $from
     * @return mixed
     */
   abstract function setMessage($to,$message,$from);

    /**
     * 添加错误信息
     * @param $message
     */
   public function addError($message)
   {
        $this->error = $message;
   }
}