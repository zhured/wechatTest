<?php
define("TOKEN", "zhured"); //TOKEN值
$wechatObj = new wechat();

if(isset($_GET["echostr"])){
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}


class wechat {
    public function valid() {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }
    private function checkSignature() {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        if( $tmpStr == $signature ) {
            return true;
        } else {
            return false;
        }
    }

    public function responseMsg() {
        //---------- 接 收 数 据 ---------- //
        $postStr = file_get_contents("php:://input");//$GLOBALS["HTTP_RAW_POST_DATA"]; //获取POST数据
        //用SimpleXML解析POST过来的XML数据
        if ($postStr!=null){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";

                $msgType = "text";
                $contentStr = date("Y-m-d H:i:s",time()).$keyword;
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;

        }else{
            echo "";
            exit;
        }
    }
}
?>