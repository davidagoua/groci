<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class SendSms
{
    use AsAction;

    /*
     * https://vital-sms.com/api/api_http.php?username=CNLVC&password=lutte225&sender=CNLVC&to=2250141232582;2250707076421&text=Hello%20world&type=text&datetime=2023-05-05%2015%3A24%3A23
     */

    public function handle($contacts, $message)
    {
        $reponse = Http::get("https://vital-sms.com/api/api_http.php", [
            'username'=>config('SMS_USERNAME','CNLVC'),
            'password'=> config('SMS_PASSWORD','lutte225'),
            'sender'=> config('SMS_SENDER', "CNLVC") ,
            'to'=> collect($contacts)->join(';'),
            'text'=>$message,
            'datetime'=> now()->toDateTimeLocalString()
        ]);
    }
}
