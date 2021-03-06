<?php
/**
 * Created by PhpStorm.
 * User: denghy
 * Date: 2018/3/29
 * Time: 14:47
 */
namespace app\index\controller;

require_once(__DIR__.'/../../../vendor/ilovepdf/init.php');
use Ilovepdf\Ilovepdf;

class MergePdf{

    public function getMergedPdf($pdf1,$pdf2){
        $ilovepdf = new Ilovepdf('project_public_d4b755a0b2492da1ea386f4a53823b6d_xcppJ626dfd2087e1fb8469e1a14758ae40d1','secret_key_118c489869f7c3fb16ec077cf19c6514_SK71oc85a6addd1398c7ef2ac045ba1e07d61');

        //选择合并模式
        $myTask = $ilovepdf->newTask('merge');

        //添加文件笺头地址
        $myTask->addFile($pdf1);
        //获取发文的pdf附件地址
        $myTask->addFile(__DIR__.'/../../../public/'.$pdf2);

        //设置文件名
        $myTask->setOutputFilename(time().'.pdf');

        $myTask->execute();

        //远程下载 也支持在线预览(第二个参数为I)
        return $myTask->download('uploads','F');
    }
}