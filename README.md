# WhatsApp Messaging API

A Laravel-based RESTful API service for sending WhatsApp messages using Twilio's WhatsApp Business API.

## Features

- Send WhatsApp messages via API endpoints
- Clean architecture with service layer pattern
- Exception handling for Twilio API errors
- Input validation and sanitization
- JSON response formatting

## Requirements

- PHP 8.2+
- Laravel 12.x
- Composer
- Twilio Account with WhatsApp capability

## Installation

1. Clone the repository:

```bash
git clone https://github.com/Maahmoudd/whatsapp-gitsa.git
cd whatsapp-gitsa
```

2. Install dependencies:

```bash
composer install
```

3. Set up environment variables:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure Twilio credentials in your `.env` file:

```
TWILIO_SID=your_twilio_sid
TWILIO_AUTH_TOKEN=your_twilio_auth_token
TWILIO_WHATSAPP_FROM=your_twilio_whatsapp_number
```

## Usage

### API Endpoints

#### Send WhatsApp Message

```
POST /api/whatsapp/send
```

Request body:
```json
{
  "to": "+1234567890",
  "message": "Hello from WhatsApp API!"
}
```

Successful response:
```json
{
  "success": true,
  "message": "WhatsApp message sent successfully",
  "data": {
    "message_sid": "SM123456789",
    "recipient": "+1234567890",
    "timestamp": "2023-06-28T14:23:45.000000Z"
  }
}
```

## Implementation Details

The project follows a clean architecture with:

- Service layer pattern for business logic
- Dependency injection for loose coupling
- API resources for standardized responses
- Custom exception handlers

## Troubleshooting

### Common Issues

1. **Invalid 'From' number error**: Make sure you've properly set up and joined the Twilio WhatsApp sandbox, or have a verified business account.

2. **Rate limiting**: Twilio imposes rate limits on API requests. Implement queuing for high-volume scenarios.

3. **Sandbox limitations**: In sandbox mode, you can only message numbers that have opted in and only use pre-approved message templates.
