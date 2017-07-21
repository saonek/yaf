<?php
use Yaf\Controller_Abstract;
use Yaf\Dispatcher;
use Ts\BaseModel;
// use App\Models\BaseModel;
class IndexController extends Controller_Abstract{
     
    public function indexAction(){
        $arr = [
                    [
                    'appid'=>'1098',
                    'appname'=>'test',
                    'Icon_url'=>'http://img.sss.com/img.jpg',
                    'cash'=>'3.0',
                    'Lastnum'=>'999',
                    'mes'=>'分享拿提成躺着也能赚钱',
                    ],
                    [
                    'appid'=>'1098',
                    'appname'=>'test',
                    'Icon_url'=>'http://img.sss.com/img.jpg',
                    'cash'=>'3.0',
                    'Lastnum'=>'999',
                    'mes'=>'分享拿提成躺着也能赚钱',
                    ],
            ];

        echo json_encode($arr);
        // $this->_view->word = "hello world";
        // or
        $this->getView()->word = "hello world";
    }

    //Get all config
    public function confsAction(){
        //$config1 = new Yaf_Config_Ini(APPLICATION_PATH.'/conf/sm.ini', 'test');
        $config = Yaf\Application::app()->getConfig();
        print_r($config);
        exit;
    }


    //test  view config
    public function confAction(){
        //$confSm   = new Yaf_Config_Ini(APPLICATION_PATH.'/conf/sm.ini','test');
        $confSm   = new Yaf_Config_Ini(APPLICATION_PATH.'/conf/sm.ini');
        //print_r($confSm->toArray());
        //var_dump($confSm->get("test.con.mysql.user"));


        $params = [
                'tst1'=>'This is a test page',
                'tst2'=>'6666666'
        ];
        $this->getView()->assign($params);
    }
    
    
    /**
     * test models
     */
    public function modelAction(){
//        $m = Yaf\Registry::get("config");
//        print_r($m);
        $base = new BaseModel();
        $base->add();
        exit;
    }

    public function routeAction(){
        $router = Dispatcher::getInstance()->getRouter();
        print_r($router);
        print_r($router->getCurrentRoute());
        print_r($router->getRoutes());
        
        exit();
    }
}