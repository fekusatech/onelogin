<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class TestapiController extends Controller
{
    public function syncdatabase()
    {
        // $datauser = User::get();
        $feedmill = DB::connection('feedmill')->table('users')->get();
        $this->feedmill($feedmill);

        $breeder = DB::connection('breeder')->table('tb_user')->get();
        $this->breeder($breeder);

        echo json_encode(['status' => true, 'message' => 'Sync berhasil']);
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
                    ->where('id_unit', '=', "7")
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
    private function breeder($breeder)
    {
        foreach ($breeder as $breeders) {
            $username = $breeders->username;
            $cekusername = User::where('username', '=', $username)
                ->whereRaw("FIND_IN_SET('6',unit)")
                ->first();
            if ($cekusername !== null) {
                $cekdetailuser = DB::table('users_detail')
                    ->where('username', '=', $cekusername->username)
                    ->where('id_unit', '=', "6")
                    ->first();
                if ($cekdetailuser == null) {
                    DB::table('users_detail')->insert([
                        'id_user' => $cekusername->id,
                        'id_unit' => 6,
                        'username' => $breeders->username,
                        'password' =>  $breeders->password,
                        'status' =>  1
                    ]);
                }
            }
        }
    }
}
