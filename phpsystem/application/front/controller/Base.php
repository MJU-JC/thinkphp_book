<?php
namespace app\front\controller;
use think\Controller;

class Base extends Controller
{
    protected $currentPage = 1;
    protected $request = null;

    //向客户端输出ajax响应结果
    public function writeJsonResponse($success, $message) {
        $response = array(
            "success" => $success,
            "message" => $message,
        );
        echo json_encode($response);
    }


    /**
     * @param $obj:  保存图片路径的对象
     * @param $indexName 索引名称
     * @param $photoFiledName 提交的图片表单名称
     */
    public function uploadPhoto(&$obj,$indexName,$photoFiledName) {
        if($_FILES[$photoFiledName]['tmp_name']){
            $file = $this->request->file($photoFiledName);
            //控制上传的文件类型，大小
            if(!(($_FILES[$photoFiledName]["type"]=="image/jpeg"
                    || $_FILES[$photoFiledName]["type"]=="image/jpg"
                    || $_FILES[$photoFiledName]["type"]=="image/png") && $_FILES[$photoFiledName]["size"] < 1024000)) {
                $message = "图书图片请选择jpg或png格式的图片!";
                $this->writeJsonResponse(false,$message);
                exit;
            }
            $file->setRule("short"); //文件路径采用简短方式
            $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
            $obj[$indexName]='upload/'.$info->getSaveName();
        }

    }

    /**
     * @param $obj:  保存文件路径的对象
     * @param $indexName 索引名称
     * @param $resourceFiledName 提交的文件表单名称
     */
    public function uploadFile(&$obj,$indexName,$resourceFiledName) {
        if($_FILES[$resourceFiledName]['tmp_name']){
            $file = $this->request->file($resourceFiledName);
            $file->setRule("short"); //文件路径采用简短方式
            $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
            $obj[$indexName]='upload/'.$info->getSaveName();
        }
    }



    //接收图书类型信息表单数据
    public function getBookTypeForm() {
        $bookType = [
            'bookTypeId' => input("bookType_bookTypeId"),
            'bookTypeName'=> input("bookType_bookTypeName"),
            'days'=> input('bookType_days'),
        ];
        return $bookType;
    }



    //接收图书信息表单数据
    public function getBookForm($insertFlag) {
        $book = [
            'barcode'=> input("book_barcode"),
            'bookName'=> input("book_bookName"),
            'bookTypeObj'=> input("book_bookTypeObj_bookTypeId"),
            'price'=> input("book_price"),
            'count'=> input("book_count"),
            'publishDate'=> input("book_publishDate"),
            'publish'=> input("book_publish"),
            'bookDesc'=> input("book_bookDesc"),
            'bookPhoto' => $insertFlag==true?"upload/NoImage.jpg":input("book_bookPhoto"),
            'bookFile' => $insertFlag==true?"":input("book_bookFile"),
        ];

        return $book;
    }
}