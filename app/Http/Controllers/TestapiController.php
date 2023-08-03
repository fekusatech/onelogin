<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class TestapiController extends Controller
{
    public function getAPIatasan($nrp)
    {
        $data = Http::withHeaders([
            'Authorization' => '113|ZBWSpfldV0hdU3B5hfMc2FQIBq8jeXh51KVCa6WE'
        ])->get('https://webportal.patria.co.id:24000/satria-api-man/public/api/sf-emp-atasan/' . $nrp);

        return $data['data'];
    }
    public function syncdatabase()
    {
        // $datauser = User::get();
        $feedmill = DB::connection('feedmill')->table('users')->get();
        $this->feedmill($feedmill);
    }
    private function feedmill($feedmill)
    {
        foreach ($feedmill as $feedmills) {
            $username = $feedmills->username;
            $cekusername = User::where('username', '=', $username)
                ->whereRaw("FIND_IN_SET('7',unit)")
                ->first();
            if ($cekusername !== null) {
                $cekdetailuser = DB::table('users_detail')
                    ->where('username', '=', $cekusername->username)
                    ->first();
                if ($cekdetailuser == null) {
                    DB::table('users_detail')->insert([
                        'id_user' => $cekusername->id,
                        'id_unit' => 7,
                        'username' => $feedmills->username,
                        'password' =>  $feedmills->password,
                        'status' =>  1
                    ]);
                }
            }
        }
    }
}
