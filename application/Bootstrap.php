<?php
use Yaf\Dispatcher;
use Yaf\Registry;
use Yaf\Route\Simple;
use Yaf\Route\Supervar;
use Yaf\Route\Rewrite;
class Bootstrap extends Yaf\Bootstrap_Abstract{

    public $config;
    public $loader;

    /**
     * [_initConfig init yaf config]
     * @return [type] [description]
     */
    public function _initConfig() {
        $this->config = Yaf\Application::app()->getConfig();
        Yaf\Registry::set("config", $this->config);

         //申明, 凡是以Foo和Local开头的类, 都是本地类
        $this->loader = Yaf\Loader::getInstance();
        $this->loader->registerLocalNamespace(["fly"]);
    }

    //test init
    // public function _initSaonek(Yaf_Dispatcher $dispatcher){
    // 	var_dump($dispatcher->returnResponse());
    // }

    /**
     * [_initLoader loadSB]
     * @return [type] [void]
     */
    public function _initLoader(){
        //$this->loader->import("db/Medoo.php");
        $this->loader->autoload("fly_db_Medoo");
       // print_r($this->loader);

    }

    /**
     * [_initRoute Config routes]
     * @param  Yaf_Dispatcher $dispatcher [default]
     * @return [type]                     [description]
     */
    public function _initRoute(Dispatcher $dispatcher) {
        $router = Dispatcher::getInstance()->getRouter();
        /**
         * 添加配置中的路由//
         */
       // $router->addConfig(Registry::get("config")->routes);
       // $route = new Simple("m", "c", "a");//http://yaf.myapp/?c=index&a=route
       // $route = new Supervar("r");//http://yaf.myapp/?r=index/confs
       // 在rewrite模式下不就不能用&test=11的方式传参数了
       // rewrite 模式下 m/*ident' 参考手册
       // 星号(*)被用做一个通配符, 意思就是在Url中它后面的所有段都将作为一个通配数据被存储. 例如,如果我们有路径'path/product/:ident/*'(就是路由协议中设置的第一个变量), 并且我们访问的Url为http://domain.com/product/chocolate-bar/test/value1/another/value2,那么所有的在'chocolate-bar'后面的段都将被做成变量名/值对,因此这样会给我们下面的结果：
       
        $route = new Rewrite(
            'm/:ident',
            [
                'controller' => 'index',
                'action' => 'getp'
            ]
        );
        //http://yaf.myapp/product/choclolat-bar
       // exit;
        $router->addRoute("product", $route);
    }
}