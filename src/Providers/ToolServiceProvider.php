<?php

namespace Kingofzihua\Tool\Providers;

use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * 在注册后进行服务的启动。
     *
     * @return void
     */
    public function boot()
    {
        //加载|扩展文件
        $this->loads();
        //发布
        $this->publishs();

    }

    /**
     *  加载文件
     */
    public function loads()
    {
        //config
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/tool.php', 'tool'
        );

        //扩展路由
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/../Routing/routes.php';
        }
        //视图
        $this->loadViewsFrom(__DIR__ . '/../../view', 'views');
    }


    /**
     * 发布资源 [移动文件]
     * 将项目文件移动到外面
     */
    public function publishs()
    {
        //config--配置文件
        $this->publishes([
            __DIR__ . '/../../config/tool.php' => config_path('tool.php'),
        ]);
        //routes--路由文件

        //view--视图文件

        //assets--资源文件

    }

}
