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
        $user = array(
            ['id' => '1', 'nama' => 'Engineer', 'username' => 'Engineer', 'password' => '99', 'level' => 'admin', 'lokasi' => 'Balikpapan', 'roll' => '', 'user_kandang' => ''],
            ['id' => '6', 'nama' => 'Auzani Masqun', 'username' => 'Zani', 'password' => '123', 'level' => 'user', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '7', 'nama' => 'Teguh', 'username' => 'Teguh', 'password' => '123', 'level' => 'user', 'lokasi' => 'Tulungagung', 'roll' => '', 'user_kandang' => ''],
            ['id' => '8', 'nama' => '0', 'username' => '0', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '9', 'nama' => '0', 'username' => '0', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '10', 'nama' => 'Uky Agung', 'username' => 'uky_agung', 'password' => 'adreena', 'level' => 'admin', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '11', 'nama' => 'Ahmad Baharudin', 'username' => 'A_Baharudin', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '12', 'nama' => '0', 'username' => '0', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '13', 'nama' => 'Samsul Hadi', 'username' => 'Samsul_hadi', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '14', 'nama' => 'Samsul Hadi', 'username' => 'Samsul_hadi', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '16', 'nama' => 'Teguh Tri Santoso', 'username' => 'P_Teguh', 'password' => '123', 'level' => 'Trainer', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '17', 'nama' => 'Iqbal', 'username' => 'Iqbal', 'password' => '123', 'level' => 'user', 'lokasi' => 'Tulungagung', 'roll' => '', 'user_kandang' => ''],
            ['id' => '18', 'nama' => 'Taufiq Bayu Wijaya', 'username' => 'P_Taufiq', 'password' => '123', 'level' => 'Trainer', 'lokasi' => 'Tulungagung', 'roll' => '', 'user_kandang' => ''],
            ['id' => '19', 'nama' => 'Ari Sumantri', 'username' => 'P_Ari', 'password' => '123', 'level' => 'Trainer', 'lokasi' => 'Parepare', 'roll' => '', 'user_kandang' => ''],
            ['id' => '20', 'nama' => 'Abdul Basit', 'username' => 'Abdul_Basit', 'password' => '123', 'level' => 'user', 'lokasi' => 'Parepare', 'roll' => '', 'user_kandang' => ''],
            ['id' => '21', 'nama' => 'Daroni Munaji', 'username' => 'P_Daroni', 'password' => '123', 'level' => 'Trainer', 'lokasi' => 'Manado', 'roll' => '', 'user_kandang' => ''],
            ['id' => '22', 'nama' => 'Mario Fransisco', 'username' => 'Mario', 'password' => '123', 'level' => 'user', 'lokasi' => 'Manado', 'roll' => '', 'user_kandang' => ''],
            ['id' => '23', 'nama' => 'Pathurrozi', 'username' => 'P_Pathurrozi', 'password' => '123', 'level' => 'Trainer', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '24', 'nama' => 'Subeki', 'username' => 'Subeki', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '25', 'nama' => 'Hariyanto Jaenuri', 'username' => 'Hariyanto', 'password' => '123', 'level' => 'user', 'lokasi' => 'Gorontalo', 'roll' => '', 'user_kandang' => ''],
            ['id' => '26', 'nama' => 'Frenly Tompodung', 'username' => 'P_Frenly', 'password' => '123', 'level' => 'Trainer', 'lokasi' => 'Gorontalo', 'roll' => '', 'user_kandang' => ''],
            ['id' => '27', 'nama' => 'Garry Bryan Korompis', 'username' => 'P_Garry', 'password' => '123', 'level' => 'Trainer', 'lokasi' => 'Kotamobagu', 'roll' => '', 'user_kandang' => ''],
            ['id' => '28', 'nama' => 'Vially Lundungan', 'username' => 'Vially', 'password' => '123', 'level' => 'user', 'lokasi' => 'Kotamobagu', 'roll' => '', 'user_kandang' => ''],
            ['id' => '29', 'nama' => 'Musthikawaty', 'username' => 'Metty', 'password' => '999999', 'level' => 'admin', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '30', 'nama' => 'Mochamad Ainur Rovicky', 'username' => 'Vicky', 'password' => '123', 'level' => 'admin', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '31', 'nama' => 'Asma\'ul Husna', 'username' => 'husna', 'password' => '123', 'level' => 'admin', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '32', 'nama' => 'Jerry Rischa Fauzi', 'username' => 'Jerry', 'password' => '123', 'level' => 'admin', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '33', 'nama' => 'Debora Putri', 'username' => 'Putri', 'password' => '123', 'level' => 'admin', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '34', 'nama' => 'Fariz', 'username' => 'Fariz', 'password' => '123', 'level' => 'user', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '35', 'nama' => 'p', 'username' => 'p', 'password' => 'p', 'level' => 'Trainer', 'lokasi' => 'Parepare', 'roll' => '', 'user_kandang' => ''],
            ['id' => '36', 'nama' => 'Ismail Arif', 'username' => 'ismail_arif', 'password' => '123', 'level' => 'user', 'lokasi' => 'Gorontalo', 'roll' => '', 'user_kandang' => ''],
            ['id' => '37', 'nama' => 'Rahmat Hidayat', 'username' => 'Rahmat', 'password' => '123', 'level' => 'user', 'lokasi' => 'Parepare', 'roll' => '', 'user_kandang' => ''],
            ['id' => '38', 'nama' => 'Ulin', 'username' => 'Ulin', 'password' => '123', 'level' => 'user', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '39', 'nama' => 'Chandra', 'username' => 'Chandra', 'password' => 'chandra', 'level' => 'superuser', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '40', 'nama' => 'Dedi Apriadi', 'username' => 'Dedi', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '41', 'nama' => 'Taufik Habibi', 'username' => 'Taufik', 'password' => '123', 'level' => 'user', 'lokasi' => 'Manado', 'roll' => '', 'user_kandang' => ''],
            ['id' => '42', 'nama' => 'Leo', 'username' => 'Leo', 'password' => '123', 'level' => 'user', 'lokasi' => 'Manado', 'roll' => '', 'user_kandang' => ''],
            ['id' => '43', 'nama' => 'Yunindra ', 'username' => 'Yunindra', 'password' => 'yunindra', 'level' => 'superuser', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '44', 'nama' => 'Indi', 'username' => 'indi', 'password' => 'indi', 'level' => 'admin', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '45', 'nama' => 'Faisal Nimran', 'username' => 'Faisal_Nimran', 'password' => '110A', 'level' => 'user', 'lokasi' => 'Bima', 'roll' => '', 'user_kandang' => ''],
            ['id' => '46', 'nama' => 'Fakharudin', 'username' => 'Fakharudin', 'password' => '123', 'level' => 'user', 'lokasi' => 'Bima', 'roll' => '', 'user_kandang' => ''],
            ['id' => '47', 'nama' => 'Mursalim', 'username' => 'Mursalim', 'password' => '123', 'level' => 'user', 'lokasi' => 'Parepare', 'roll' => '', 'user_kandang' => ''],
            ['id' => '48', 'nama' => 'Dedi Ismawan', 'username' => 'P_Dedi', 'password' => '123', 'level' => 'user', 'lokasi' => 'Bima', 'roll' => '', 'user_kandang' => ''],
            ['id' => '49', 'nama' => 'Jonathan Sesa', 'username' => 'Jonathan', 'password' => '123', 'level' => 'user', 'lokasi' => 'Gorontalo', 'roll' => '', 'user_kandang' => ''],
            ['id' => '50', 'nama' => 'MUHAMMAD SYAMSUL HUDA', 'username' => 'Huda', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '51', 'nama' => 'RIZKY MATHEOS', 'username' => 'Rizky_', 'password' => '123', 'level' => 'admin', 'lokasi' => 'Manado', 'roll' => '', 'user_kandang' => ''],
            ['id' => '52', 'nama' => 'NOFSEL_K_RARES', 'username' => 'NOFSEL_K_RARES', 'password' => '123', 'level' => 'user', 'lokasi' => 'Manado', 'roll' => '1', 'user_kandang' => '\'NOFSEL_K_RARES\''],
            ['id' => '53', 'nama' => 'febri kukuh', 'username' => 'poseidonwood', 'password' => 'putri123', 'level' => 'admin', 'lokasi' => 'Mojokerto', 'roll' => '', 'user_kandang' => ''],
            ['id' => '54', 'nama' => 'SUJIONO', 'username' => 'SUJIONO', 'password' => '123', 'level' => 'user', 'lokasi' => 'Tulungagung', 'roll' => '1', 'user_kandang' => '\'SUJIONO\''],
            ['id' => '55', 'nama' => 'M_SALEH_RAHMANSYAH', 'username' => 'M_SALEH_RAHMANSYAH', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '1', 'user_kandang' => '\'M_SALEH_RAHMANSYAH\''],
            ['id' => '56', 'nama' => 'APRILIYAWAN_HASANIA', 'username' => 'APRILIYAWAN_HASANIA', 'password' => '123', 'level' => 'user', 'lokasi' => 'Gorontalo', 'roll' => '1', 'user_kandang' => '\'APRILIYAWAN_HASANIA\''],
            ['id' => '57', 'nama' => 'IR_HI_SONDA', 'username' => 'IR_HI_SONDA', 'password' => '123', 'level' => 'user', 'lokasi' => 'Kotamobagu', 'roll' => '1', 'user_kandang' => '\'IR_HI_SONDA\''],
            ['id' => '58', 'nama' => 'RIJAAH', 'username' => 'RIJAAH', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '1', 'user_kandang' => '\'RIJAAH\''],
            ['id' => '59', 'nama' => 'INDAH_SUCIANI', 'username' => 'INDAH_SUCIANI', 'password' => '123', 'level' => 'user', 'lokasi' => 'Kediri', 'roll' => '1', 'user_kandang' => '\'INDAH_SUCIANI\''],
            ['id' => '60', 'nama' => 'MUSTARI', 'username' => 'MUSTARI', 'password' => '123', 'level' => 'user', 'lokasi' => 'Parepare', 'roll' => '1', 'user_kandang' => '\'MUSTARI\''],
            ['id' => '61', 'nama' => 'internalaudit', 'username' => 'internalaudit', 'password' => 'iaptdmc', 'level' => 'superuser', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '62', 'nama' => '123', 'username' => '123', 'password' => '123', 'level' => 'superuser', 'lokasi' => 'Kediri', 'roll' => '', 'user_kandang' => ''],
            ['id' => '63', 'nama' => 'Fajar fachtur rohman', 'username' => 'Fajar', 'password' => '123', 'level' => 'user', 'lokasi' => 'Tulungagung', 'roll' => '', 'user_kandang' => ''],
            ['id' => '64', 'nama' => 'Rizal Pahlawan', 'username' => 'Rizal', 'password' => '123', 'level' => 'user', 'lokasi' => 'Bima', 'roll' => '', 'user_kandang' => ''],
            ['id' => '65', 'nama' => 'David', 'username' => 'David', 'password' => '123', 'level' => 'user', 'lokasi' => 'Balikpapan', 'roll' => '', 'user_kandang' => ''],
            ['id' => '66', 'nama' => 'Sardi', 'username' => 'Sardi', 'password' => '123', 'level' => 'user', 'lokasi' => 'Balikpapan', 'roll' => '', 'user_kandang' => ''],
            ['id' => '67', 'nama' => 'Herry', 'username' => 'P_Herry', 'password' => '123', 'level' => 'Trainer', 'lokasi' => 'Balikpapan', 'roll' => '', 'user_kandang' => ''],
            ['id' => '68', 'nama' => 'Rusdan Makmun', 'username' => 'Rusdan', 'password' => '123', 'level' => 'user', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '69', 'nama' => 'Harja Aryawan', 'username' => 'Harja', 'password' => '123', 'level' => 'user', 'lokasi' => 'Balikpapan', 'roll' => '', 'user_kandang' => ''],
            ['id' => '70', 'nama' => 'M Irfan', 'username' => 'Irfan', 'password' => '123', 'level' => 'user', 'lokasi' => 'Bima', 'roll' => '', 'user_kandang' => ''],
            ['id' => '71', 'nama' => 'Wahyu Pratama', 'username' => 'Wahyu', 'password' => '123', 'level' => 'admin', 'lokasi' => 'Lombok', 'roll' => '', 'user_kandang' => ''],
            ['id' => '72', 'nama' => 'Jordy', 'username' => 'Jordy', 'password' => '123', 'level' => 'user', 'lokasi' => 'Palu', 'roll' => '', 'user_kandang' => ''],
            ['id' => '73', 'nama' => 'Iswanto Gaib', 'username' => 'Iswanto', 'password' => '123', 'level' => 'user', 'lokasi' => 'Kotamobagu', 'roll' => '', 'user_kandang' => ''],
            ['id' => '74', 'nama' => 'Syamsudin', 'username' => 'Syamsudin', 'password' => '123', 'level' => 'user', 'lokasi' => 'Bima', 'roll' => '', 'user_kandang' => ''],
            ['id' => '75', 'nama' => 'Salim', 'username' => 'Salim', 'password' => '123', 'level' => 'user', 'lokasi' => 'Palu', 'roll' => '', 'user_kandang' => ''],
            ['id' => '76', 'nama' => 'RIZKY MATHEOS', 'username' => 'Rizky', 'password' => '123', 'level' => 'user', 'lokasi' => 'Palu', 'roll' => '', 'user_kandang' => '']
        );
        $validatedData = array();
        foreach ($user as $users) {
            // echo $users['id']."<br>";?
            $cekusername = User::where('username', '=', $users['username'])
                ->first();
            if ($cekusername) {
                // echo $cekusername->id.",";
                User::where('id', $cekusername->id)
                    ->update([
                        'unit' => DB::raw("CONCAT(unit, ',4')")
                    ]);
            }else{
                $validatedData = [
                    'name' => $users['nama'],
                    'username' => strtolower($users['username']),
                    'email' => NULL,
                    'password' => NULL,
                    'unit' => 4,
                ];

                // Memeriksa apakah username sudah digunakan sebelumnya
                $existingUser = User::where('username', $users['username'])->exists();

                if ($existingUser) {
                }else{
                    // User::create($validatedData);
                }
            }
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
                ->whereRaw("FIND_IN_SET('2',unit)")
                ->first();

            if ($cekusername !== null) {
                $cekdetailuser = DB::table('users_detail')
                    ->where('username', '=', $cekusername->username)
                    ->where('id_unit', '=', "2")
                    ->first();
                if ($cekdetailuser == null) {
                    DB::table('users_detail')->insert([
                        'id_user' => $cekusername->id,
                        'id_unit' => 2,
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
