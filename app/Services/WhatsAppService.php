<?php

namespace App\Services;

use App\Exceptions\TwilioApiException;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;
use Exception;
use Illuminate\Support\Facades\Log;

class WhatsAppService implements IMessageService
{
    protected $client;
    protected $fromNumber;

    public function __construct()
    {
        $this->client = new Client(
            config('services.twilio.sid'),
            config('services.twilio.auth_token')
        );
        $this->fromNumber = config('services.twilio.whatsapp_from');
    }

    public function sendMessage(string $to, string $message): array
    {
        try {
            $response = $this->client->messages->create(
                "whatsapp:" . $to,
                [
                    'from' => "whatsapp:" . $this->fromNumber,
                    'body' => $message,
                ]
            );

            return [
                'success' => true,
                'message_sid' => $response->sid,
                'recipient' => $to,
                'timestamp' => now()->toIso8601String(),
            ];
        }
        catch (TwilioException $e) {
            Log::error('Twilio Error:', [
                'to' => $to,
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]);

            throw new TwilioApiException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            Log::error('WhatsApp Service Error:', [
                'to' => $to,
                'message' => $e->getMessage()
            ]);

            throw $e;
        }
    }
}
