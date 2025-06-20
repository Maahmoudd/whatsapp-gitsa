<?php

use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Route;

Route::post('/whatsapp/send', [WhatsAppController::class, 'sendMessage'])->middleware(['throttle:60,1']);
