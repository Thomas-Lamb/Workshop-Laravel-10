<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(Channel::getAll());
    }

    public function show(Request $request, Channel $channel): JsonResponse
    {
        return response()->json($channel);
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(Channel::query()->create($request->input()));
    }
}
