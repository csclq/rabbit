<?php

namespace App\Modules\Frontend\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->disable();
        $access_token=$this->weixin->access_token;
        echo "<pre>";
        var_dump($access_token);
         var_dump($access_token->getToken());

    }

    public function excelAction()
    {
        $this->view->disable();
        $file = getcwd() . '/a.xlsx';
        $arr = [
            ['a1', 'b1', 'c1', 'd1', 'e1', 'f1', 'g1'],
            ['a2', 'b2', 'c2', 'd2', 'e2', 'f2', 'g2'],
            ['a3', 'b3', 'c3', 'd3', 'e3', 'f3', 'g3'],
            ['a4', 'b4', 'c4', 'd4', 'e4', 'f4', 'g4'],
            ['a5', 'b5', 'c5', 'd5', 'e5', 'f5', 'g5'],
            ['a6', 'b6', 'c6', 'd6', 'e6', 'f6', 'g6'],
        ];
//        $write=WriterFactory::create(Type::XLSX);
        $this->xlsx->openToFile($file);
        foreach ($arr as $v) {
            $this->xlsx->addRow($v);
        }

        var_dump($this->xlsx->close());

    }

    public function wechatAction()
    {
        $this->view->disable();
        $server = $this->weixin->server;
        $userService=$this->weixin->user;
        $server->setMessageHandler(function ($message) use($userService) {
            switch ($message->MsgType) {
                case 'event':
//                   if()


                    break;
                case 'text':
                    $user=$userService->get($message->FromUserName);
                    return $user->nickname;
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });
        $respond = $server->serve();
        $respond->send();
    }

    public function phpinfoAction(){
        $this->view->disable();
        phpinfo();
    }

    public function testAction(){
        $this->view->disable();
        var_dump($this->redis);
    }
}

