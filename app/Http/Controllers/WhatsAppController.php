<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Services\IMessageService;
use Exception;
use Illuminate\Http\JsonResponse;

class WhatsAppController extends Controller
{
    protected $messageService;

    public function __construct(IMessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Send a WhatsApp message
     *
     * @param MessageRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function sendMessage(MessageRequest $request): JsonResponse
    {
        $result = $this->messageService->sendMessage(
            $request->to,
            $request->message
        );

        return (new MessageResource($result))->response();
    }
}
