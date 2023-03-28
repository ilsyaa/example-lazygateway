<?php
header('content-type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
file_put_contents('logwebhook.txt', '[' . date('Y-m-d H:i:s') . "]\n" . json_encode($data) . "\n\n", FILE_APPEND);

$message = $data['message'] ?? null;
$from = $data['from'] ?? null;
$isGroup = $data['isGroup'] ?? null;
$isMe = $data['isMe'] ?? null;

switch ($message) {
    case "ping":
        $data = [
            'message_type' => 'text',
            'message' => array(
                'message' => 'pong'
            )
        ];
        break;
    case "media":
        $data = [
            'message_type' => 'media',
            'message' => array(
                "media_type" => "image", // image, video, audio, file
                "url" => "https://i.ibb.co/QmPKL4Q/sad.jpg",
                "caption" => "This is caption" // optional
            )
        ];
        break;
    default:
        // if message is not match
        $data = false;
        break;
}

print json_encode([
    'status' => 'success',
    'data' => json_encode($data)
]);
