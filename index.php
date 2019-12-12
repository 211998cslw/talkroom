<?php 
$server = new Swoole\WebSocket\Server("0.0.0.0", 9501);

$server->on('open', function (Swoole\WebSocket\Server $server, $request) {
	$content="游客".crc32($request->fd)."进入了聊天室";
	echo "visitor".crc32($request->fd)."entry this talkroom";
    $server->push($request->fd,$content);

});

$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
	$data=$frame->data;
	$user=$frame->fd;
	// $content=json_decode($data)['content'];
	var_dump($data);
    // echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($user, $data);
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();

 ?>