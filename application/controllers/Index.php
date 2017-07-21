<?php
use Yaf\Controller_Abstract;
use Yaf\Dispatcher;
use Ts\BaseModel;
use Medoo\Medoo;
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
        //print_r($this->getRequest());
        //echo $this->getRequest()->getParam('ident');
        exit();
    }

    public function getpAction(){
        //http://yaf.myapp/?s=index/getp&ss=1
        //获取url参数
        //代表了一个实际的Http请求, 一般的不用自己实例化它, Yaf_Application在run以后会自动根据当前请求实例它
        //在PHP5.3之后, 打开yaf.use_namespace的情况下, 也可以使用 Yaf\Request_Http
        $mm = $this->getRequest()->getQuery('ss',88);
        if($this->getRequest()->isGet()){
            echo 1111111;
        }
        echo $mm;
        $Medoo =  new Medoo;
        print_r($Medoo);
        return FALSE;
    }
}