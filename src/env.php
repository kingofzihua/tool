<?php

namespace Kingofzihua\Tool;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 修改env文件
 */
class Env
{
    /**
     * 显示env文件
     */
    public function index(Request $request)
    {
        if ($request->getMethod() == "GET") {
            $envDatas = $this->get();
            $disabled = ['APP_KEY'];
            return view("views::env.index", ['data' => $envDatas, 'disabled' => $disabled]);
        } else {
            $res = $this->modifyEnv($request->all());
            return redirect(config("tool.prefix") . '/env');
        }
    }

    /**
     * 获取env文件
     * @return mixed
     */
    public function get()
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';//env路径
        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));//转化为对象
        $array = $contentArray->toArray();//转化为数组
        return $this->strConverse($array);
    }

    /**
     * 读取文件并修改
     * @param array $data
     * @return FlieSize
     */
    function modifyEnv(array $data)
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));
        $contentArray->transform(function ($item) use ($data) {
            foreach ($data as $key => $value) {
                if (str_contains($item, $key)) {
                    return $key . '=' . $value;
                }
            }
            return $item;
        });
        $content = implode($contentArray->toArray(), "\n");
        return \File::put($envPath, $content);
    }

    /**
     *  将读取的env文件转化为数组
     * @param $array
     * @return mixed
     */

    private function strConverse($array)
    {
        if (!empty($array)) {
            foreach ($array as $value) {
                if (!empty($value)) {
                    $item = explode('=', $value);
                    $data[$item[0]] = !empty($item[1]) ? $item[1] : '';
                }
            }
            return $data;
        }
    }

}