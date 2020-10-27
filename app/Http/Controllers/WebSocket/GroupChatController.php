<?php

namespace App\Http\Controllers\WebSocket;

use App\Http\Response\ApiCode;
use App\Workerman\GateWay;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

/**
 * Class GroupChatController 测试内容可删除 WebSocket
 * @package App\Http\Controllers\WebSocket
 */
class GroupChatController extends WebSocketController
{
    public function sendChat($collect)
    {
        $message = $collect->get('message');
        try {
            $response = ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
                ->withData([
                    'type' => __FUNCTION__,
                    'message' => $message
                ])
                ->withMessage(__('message.common.search.success'))
                ->build();
            $groupChat = Cache::store('redis')->get('groupChat', collect());
            $admin = GateWay::getUserByClientId($this->clientId);
            if ($admin !== null) {
                $content = collect([
                    [
                        'clientId' => $admin->id,
                        'name' => $admin->name,
                        'message' => $message,
                        'created_at' => Carbon::now(config('app.timezone'))->toISOString(),
                    ]
                ]);
                $merged = $groupChat->merge($content);
                Cache::store('redis')->put('groupChat', $merged);
            }
            GateWay::sendResponseToAll($response);
        } catch (\Exception $e) {

        }
    }

    public function online()
    {
        try {
            $count = GateWay::getAllClientCount();
            $response = ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
                ->withData([
                    'type' => __FUNCTION__,
                    'count' => $count
                ])
                ->withMessage(__('message.common.search.success'))
                ->build();
            GateWay::sendResponseToAll($response);
        } catch (\Exception $e) {

        }
    }

    public function getChatRecord()
    {
        $groupChat = Cache::store('redis')->get('groupChat', collect());
        $response = ResponseBuilder::asSuccess(ApiCode::HTTP_OK)
            ->withData([
                'type' => __FUNCTION__,
                'groupChat' => $groupChat
            ])
            ->withMessage(__('message.common.search.success'))
            ->build();
        GateWay::sendResponseToAll($response);
    }
}
