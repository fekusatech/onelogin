<?php

// app/Traits/RoleValidationTrait.php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait SendWhatsapp
{
    public function sendotp($number, $otp, $kegunaan)
    {
        if($kegunaan == "ubah"){
            $message = "Gunakan kode verifikasi (OTP) {$otp} untuk ubah nomor di APPDMC";
        }
        $data = [
            'number' => $number,
            'message' => $message,
        ];
        $response = Http::post('http://103.254.169.133:4003/send', $data);
        return $response->body();
    }
}
