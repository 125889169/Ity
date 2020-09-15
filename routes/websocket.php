<?php

use Illuminate\Support\Facades\Route;


Route::namespace('WebSocket')->group(function () {
    // 测试内容可删除 GroupChatController WebSocket
    Route::any('send', 'GroupChatController@sendChat')->name('gc.send');
    Route::any('online', 'GroupChatController@online')->name('gc.online');
    Route::any('chatRecord', 'GroupChatController@getChatRecord')->name('gc.chatRecord');
});
