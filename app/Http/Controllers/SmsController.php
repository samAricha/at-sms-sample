<?php

namespace App\Http\Controllers;

use App\Services\AfricasTalking\Sms\SmsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected SmsService $smsService;
    // recipients
    private $numOfRecipients;
    private $recipients = "+254711XXXYYY,+254733YYYZZZ";

    //message
    private $message = "Hi everyone this is only a test message";

    // Set your shortCode or senderId
    private $from = "Gerald";

    public function __construct()
    {
        $this->smsService = new SmsService();
    }


    public function sendSms(Request $request)
    {
        //receiving recipients as a String and the message curated.
        $recipients = $request->input('recipients');
        $message = $request->input('message');

        $result = $this->smsService->sendSms(1, $recipients, $message);

        return response()->json($result);

    }
}
