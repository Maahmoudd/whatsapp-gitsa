<?php

namespace App\Services;

interface IMessageService
{
    /**
     * Send a message to the specified recipient
     *
     * @param string $to Recipient number
     * @param string $message Message content
     * @return array Response data with message details
     * @throws \Exception When message delivery fails
     */
    public function sendMessage(string $to, string $message): array;
}
