<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class TestapiController extends Controller
{
    public function test()
    {
        $tb_user = array(
            array('nama' => '123', 'username' => '123', 'password' => '123', 'level' => 'superuser', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'adi_hdc', 'username' => 'adi_hdc', 'password' => 'adi_hdc', 'level' => 'hdc', 'lokasi' => 'JOMBANG-3', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JOMBANG-3\',\'JOMBANG-4\''),
            array('nama' => 'admin htc b', 'username' => 'admin htc b', 'password' => 'adminhtcb', 'level' => 'admin', 'lokasi' => 'HTC Balongbendo', 'bisnisunit' => 'HATCHERY', 'custom_lokasi' => ''),
            array('nama' => 'admin htc w', 'username' => 'admin htc w', 'password' => 'adminhtcw', 'level' => 'admin', 'lokasi' => 'HTC Watudakon', 'bisnisunit' => 'HATCHERY', 'custom_lokasi' => ''),
            array('nama' => 'admin j1', 'username' => 'admin j1', 'password' => 'adminj1', 'level' => 'admin', 'lokasi' => 'JOMBANG-1', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'Risa', 'username' => 'admin j3', 'password' => 'adminj3', 'level' => 'admin', 'lokasi' => 'JOMBANG-3', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'admin j5', 'username' => 'admin j5', 'password' => 'adminj5', 'level' => 'admin', 'lokasi' => 'JOMBANG-5', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'admin j6', 'username' => 'admin j6', 'password' => 'adminj6', 'level' => 'admin', 'lokasi' => 'JOMBANG-6', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'admin jab', 'username' => 'admin jab', 'password' => 'admin', 'level' => 'admin', 'lokasi' => 'JABUNG', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'agung_hdc', 'username' => 'agung_hdc', 'password' => 'agung_hdc', 'level' => 'hdc', 'lokasi' => 'JABUNG', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JABUNG\''),
            array('nama' => 'Ali', 'username' => 'ali j5', 'password' => 'alij5', 'level' => 'admin', 'lokasi' => 'JOMBANG-5', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'Anggan', 'username' => 'Anggan', 'password' => '1234', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'asdianto', 'username' => 'asdianto', 'password' => 'asdianto', 'level' => 'admin', 'lokasi' => 'HTC Watudakon', 'bisnisunit' => 'HATCHERY', 'custom_lokasi' => ''),
            array('nama' => 'Chandra', 'username' => 'chandra', 'password' => 'chandra', 'level' => 'superuser', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'christo', 'username' => 'christo', 'password' => 'christo', 'level' => 'superuser', 'lokasi' => 'JOMBANG-4', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'Conny', 'username' => 'conny j5', 'password' => 'connyj5', 'level' => 'admin', 'lokasi' => 'JOMBANG-5', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'Dika', 'username' => 'dika j3', 'password' => 'dikaj3', 'level' => 'admin', 'lokasi' => 'JOMBANG-3', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'Diki', 'username' => 'diki', 'password' => 'diki', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Eka', 'username' => 'eka', 'password' => 'eka', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Endra', 'username' => 'Endra', 'password' => 'endra', 'level' => 'superuser', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Engineer', 'username' => 'engineer', 'password' => '99', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'faisol', 'username' => 'faisol', 'password' => 'faisol', 'level' => 'superuser', 'lokasi' => 'JOMBANG-5', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'feri_hdc', 'username' => 'feri_hdc', 'password' => 'feri_hdc', 'level' => 'hdc', 'lokasi' => 'JOMBANG-5', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JOMBANG-5\''),
            array('nama' => 'hdc j1', 'username' => 'hdc j1', 'password' => 'hdcj1', 'level' => 'hdc', 'lokasi' => 'JOMBANG-1', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JOMBANG-1\''),
            array('nama' => 'hdc j2', 'username' => 'hdc j2', 'password' => 'hdcj2', 'level' => 'hdc', 'lokasi' => 'JOMBANG-2', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JOMBANG-2\''),
            array('nama' => 'hdc j3', 'username' => 'hdc j3', 'password' => 'hdcj3', 'level' => 'hdc', 'lokasi' => 'JOMBANG-3', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JOMBANG-3\''),
            array('nama' => 'hdc j4', 'username' => 'hdc j4', 'password' => 'hdcj4', 'level' => 'hdc', 'lokasi' => 'JOMBANG-4', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JOMBANG-4\''),
            array('nama' => 'hdc j5', 'username' => 'hdc j5', 'password' => 'hdcj5', 'level' => 'hdc', 'lokasi' => 'JOMBANG-5', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JOMBANG-5\''),
            array('nama' => 'hdc ja', 'username' => 'hdc ja', 'password' => 'hdcja', 'level' => 'hdc', 'lokasi' => 'JABUNG', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JABUNG\''),
            array('nama' => 'hosin', 'username' => 'hosin', 'password' => 'hosin', 'level' => 'superuser', 'lokasi' => 'JOMBANG-3', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'internalaudit', 'username' => 'internalaudit', 'password' => 'iaptdmc', 'level' => 'superuser', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Ismail', 'username' => 'ismail jab', 'password' => 'ismailjab', 'level' => 'admin', 'lokasi' => 'JABUNG', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'ismoyo', 'username' => 'ismoyo', 'password' => 'ismoyo', 'level' => 'superuser', 'lokasi' => 'JOMBANG-5', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'kaka', 'username' => 'kaka j4', 'password' => 'kakaj4', 'level' => 'admin', 'lokasi' => 'JOMBANG-4', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'lukas', 'username' => 'lukas j4', 'password' => 'lukasj4', 'level' => 'admin', 'lokasi' => 'JOMBANG-4', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'Mahmudi', 'username' => 'mahmudi', 'password' => 'mahmudi', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Nasir', 'username' => 'nasir j3', 'password' => 'nasirj3', 'level' => 'admin', 'lokasi' => 'JOMBANG-3', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'poseidonwood', 'username' => 'poseidonwood', 'password' => 'putri123', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Putra', 'username' => 'putra j4', 'password' => 'putraj4', 'level' => 'admin', 'lokasi' => 'JOMBANG-4', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'rachman', 'username' => 'rachman', 'password' => 'rachman', 'level' => 'superuser', 'lokasi' => 'X', 'bisnisunit' => 'HATCHERY', 'custom_lokasi' => ''),
            array('nama' => 'Ramadhani', 'username' => 'Ramadhani', 'password' => 'Ramadhani', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Ravi', 'username' => 'Ravi', 'password' => 'ravi', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Sena', 'username' => 'sena', 'password' => 'sena', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Sigit', 'username' => 'sigit j3', 'password' => 'sigitj3', 'level' => 'admin', 'lokasi' => 'JOMBANG-3', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'sugiharto', 'username' => 'sugiharto', 'password' => 'sugiharto', 'level' => 'superuser', 'lokasi' => 'JABUNG', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'Superuser', 'username' => 'superuser', 'password' => 'superuser', 'level' => 'superuser', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Syahri', 'username' => 'syahri jab', 'password' => 'syahrijab', 'level' => 'admin', 'lokasi' => 'JABUNG', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'Ulin', 'username' => 'ulin', 'password' => 'ulin', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Very', 'username' => 'very', 'password' => 'very', 'level' => 'engineer', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => ''),
            array('nama' => 'Wahyu', 'username' => 'wahyu j5', 'password' => 'wahyuj5', 'level' => 'admin', 'lokasi' => 'JOMBANG-5', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => ''),
            array('nama' => 'wahyudiono_hdc', 'username' => 'wahyudiono_hdc', 'password' => 'wahyudiono_hdc', 'level' => 'hdc', 'lokasi' => 'JABUNG', 'bisnisunit' => 'BREEDING', 'custom_lokasi' => '\'JABUNG\',\'JOMBANG-5\',\'JOMBANG-4\',\'JOMBANG-3\''),
            array('nama' => 'yanto', 'username' => 'yanto', 'password' => 'yanto', 'level' => 'admin', 'lokasi' => 'HTC Balongbendo', 'bisnisunit' => 'HATCHERY', 'custom_lokasi' => ''),
            array('nama' => 'Yunindra ', 'username' => 'Yunindra', 'password' => 'yunindra', 'level' => 'superuser', 'lokasi' => 'X', 'bisnisunit' => 'ADMIN', 'custom_lokasi' => '')
        );

        foreach ($tb_user as $users) {
            // echo $users['id']."<br>";?
            // $cekusername = User::where('username', '=', strtolower($users['username']))
            //     ->first();
            // if ($cekusername) {
            //     // echo $cekusername->id.",";
            //     User::where('id', $cekusername->id)
            //         ->update([
            //             'unit' => DB::raw("CONCAT(unit, ',6')")
            //         ]);
            // }else{
            //     $validatedData = [
            //         'name' => $users['nama'],
            //         'username' => strtolower($users['username']),
            //         'email' => NULL,
            //         'password' => NULL,
            //         'unit' => 6,
            //     ];

            //     // Memeriksa apakah username sudah digunakan sebelumnya
            //     $existingUser = User::where('username', $users['username'])->exists();

            //     if ($existingUser) {
            //     }else{
            //         User::create($validatedData);
            //     }
            // }
        }
        // echo count($validatedData);
    }
    public function syncdatabase()
    {
        // $datauser = User::get();
        $mitra = DB::connection('mitra')->table('user')->get();
        $this->mitra($mitra);
        $cmms = DB::connection('cmms')->table('users')->get();
        $this->cmms($cmms);
        $feedmill = DB::connection('feedmill')->table('users')->get();
        $this->feedmill($feedmill);
        $breeder = DB::connection('breeder')->table('tb_user')->get();
        $this->breeder($breeder);

        echo json_encode(['status' => true, 'message' => 'Sync berhasil']);
    }
    private function mitra($mitra)
    {
        foreach ($mitra as $mitras) {
            $username = $mitras->username;
            $cekusername = User::where('username', '=', $username)
                ->whereRaw("FIND_IN_SET('4',unit)")
                ->first();

            if ($cekusername !== null) {
                $cekdetailuser = DB::table('users_detail')
                    ->where('username', '=', $cekusername->username)
                    ->where('id_unit', '=', "4")
                    ->first();
                if ($cekdetailuser == null) {
                    DB::table('users_detail')->insert([
                        'id_user' => $cekusername->id,
                        'id_unit' => 4,
                        'username' => $mitras->username,
                        'password' =>  $mitras->password,
                        'status' =>  1
                    ]);
                }
            }
        }
    }
    private function cmms($cmms)
    {
        foreach ($cmms as $cmmss) {
            $username = $cmmss->username;
            $cekusername = User::where('username', '=', $username)
                ->whereRaw("FIND_IN_SET('8',unit)")
                ->first();

            if ($cekusername !== null) {
                $cekdetailuser = DB::table('users_detail')
                    ->where('username', '=', $cekusername->username)
                    ->where('id_unit', '=', "8")
                    ->first();
                if ($cekdetailuser == null) {
                    DB::table('users_detail')->insert([
                        'id_user' => $cekusername->id,
                        'id_unit' => 8,
                        'username' => $cmmss->username,
                        'password' =>  $cmmss->password,
                        'status' =>  1
                    ]);
                }
            }
        }
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
