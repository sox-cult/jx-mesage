<?php
namespace common\service\message;
use common\service\message\sender\sender;
use yii;

class MessageService
{
    public $sender;
    public $from_user;
    public $to_user;
    public $message;

    /**
     * 通过容器绑定发送信息执行者
     * MessageService constructor.
     * @param Sender $sender
     */
    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
    }

    /**
     * 发送消息并添加日志
     * @return bool
     */
    public function send()
    {
        $result = $this->sender->setMessage($this->to_user,$this->message,$this->from_user)->send();
        $this->addSendLog(
            ['data'=> json_encode($this->sender->send_data,256)],
            ['result'=>$result,'error_message'=>$this->sender->error]
        );
        return $result;
    }

    /**
     * 添加发送记录
     * @param $send_data
     * @param $result
     */
    private function addSendLog($send_data,$result)
    {
        Yii::info("发送信息：".json_encode(['data'=>$send_data,'result'=>$result],256));
    }


}