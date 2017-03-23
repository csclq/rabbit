<?php

namespace Phal\Modules\Frontend\Controllers;

use \Box\Spout\Common\Type;
use \Box\Spout\Writer\WriterFactory;
use EasyWeChat\Foundation\Application;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function excelAction()
    {
        $this->view->disable();
        $file= getcwd().'/a.xlsx';
        $arr=[
          ['a1','b1','c1','d1','e1','f1','g1'],
          ['a2','b2','c2','d2','e2','f2','g2'],
          ['a3','b3','c3','d3','e3','f3','g3'],
          ['a4','b4','c4','d4','e4','f4','g4'],
          ['a5','b5','c5','d5','e5','f5','g5'],
          ['a6','b6','c6','d6','e6','f6','g6'],
        ];
//        $write=WriterFactory::create(Type::XLSX);
        $this->xlsx->openToFile($file);
        foreach ($arr as $v){
            $this->xlsx->addRow($v);
        }

        var_dump($this->xlsx->close());

    }

    public function wechatAction()
    {
       $this->view->disable();
        var_dump($this->weixin);
    }

}

