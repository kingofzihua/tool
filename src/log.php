<?php

namespace Kingofzihua\Tool;

use League\Flysystem\Exception;

/**
 * 修改env文件
 */
class Log
{
    public $_logPath;
    public $_logName = 'laravel.log';

    public function __construct()
    {
        $this->_logPath = storage_path() . '/logs/';
    }

    public function index()
    {

        $data = $this->get();
        return view("views::log.index", ['data' => $data]);
    }

    public function get()
    {
        if (\File::isFile($this->_logPath . $this->_logName)) {
            return \File::get($this->_logPath . $this->_logName);
        } else {
            return null;
        }
    }

    /**
     * 删除日志
     */
    public function deleted()
    {
        $res = \File::delete($this->_logPath . $this->_logName);
        if ($res) {
            return redirect(config("tool.prefix") . '/log')->withCookie("message", "删除成功");
        };
    }

    /**
     * 重置log
     */
    public function reset()
    {
        /**
         * 将之前的log文件备份下
         */
        $newName = date("Y-m-d-H-i-s") . '.log.bak';
        \File::copy($this->_logPath . $this->_logName, $this->_logPath . 'bak/' . $newName);
        $this->deleted();
    }

}