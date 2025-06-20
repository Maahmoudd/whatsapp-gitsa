<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Twilio\Exceptions\TwilioException;

class TwilioApiException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => 'WhatsApp provider error',
            'error' => $this->getMessage(),
        ], 503);
    }
}
