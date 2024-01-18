<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(Message::all());
    }

    public function showByChannel(Request $request, Channel $channel): JsonResponse
    {
        return response()->json($channel->getMessages());
    }

    public function show(Request $request, Message $message): JsonResponse
    {
        return response()->json($message);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(Message::query()->create($request->input()));
    }
}
