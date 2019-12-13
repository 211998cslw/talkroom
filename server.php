<?php
$server = new Swoole\WebSocket\Server("0.0.0.0", 9501);

$server->on('open', function (Swoole\WebSocket\Server $server, $request) {
    //     $content="游客".crc32($request->fd)."进入了聊天室";
    //     echo "visitor".crc32($request->fd)."entry this talkroom";
    // $server->push($request->fd,$content);

});

$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
    $info=json_decode($frame->data,true);
    if($info['type']=='login'){
        $content="<p>系统消息：尊贵的用户".$info['content']."上线了</p>";
    }
        $user=$frame->fd;
        // $content="<span style='clear:both'></span><p style='float:right'>".$frame->$data."</p>";
        // $content=json_decode($data)['content'];
        // var_dump($data);
    // echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($user, $content);
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();

 ?>







































 <?php
$server = new Swoole\WebSocket\Server("0.0.0.0",9501);
$server->on('open', function (Swoole\WebSocket\Server $server, $request) {
});
$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
//    $data = $frame->data;
    $info =json_decode($frame->data,true);
    //var_dump($frame->data);
    $key ="online_list";
    $redis =new Redis();
    $redis->connect('localhost',6379);
    $liststr = $redis->get($key);
    $list =json_decode($liststr,true);
    //var_dump($list);

    if   ($info['type']=='login'){
        if(empty($list)){
            $list =[];
        }
        $list[] =[
            'client_id'=>$frame->fd,
            'name'=>$info['content']
        ];
        $str =json_encode($list);
        $redis->set($key,$str);
        $content="<p align='center'>系统消息：尊贵的用户".$info['content']."进入聊天室</p>";
    }else{
        $content="<p align='right'><span style='border:1px solid #3f9ae5;margin-right:100px;background-color: #3c763d; width: auto;border-radius:20px;'>".$info['content']."</span></p>";
    }
//    $content = "<span style='clear: both'></span><p style='float:right'>".$frame->data."</p>";
    //echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    foreach($list as $k=>$v){
        $server->push($v['client_id'],$content);
    }
});
$server->on('close', function ($user, $fd) {
    $key ="online_list";
    $redis =new Redis();
    $redis->connet('localhost',6379);
    $liststr = $redis->get($key);
    $list =json_decode($liststr,true);
    foreach ($list as $key=>$value){
        if($value['client_id'] ==$fd){
            unset($list[$key]);
        }
    }
    $str =json_encode($list);
    $redis->set($key,$str);
    foreach ($list as $k=>$v){
        $content="<p align='center'>系统消息：尊贵的用户".$v['name']."离开聊天室</p>";
        $server->push($v['client_id'],$content);
    }
});
$server->start();
