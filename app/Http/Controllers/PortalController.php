<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class PortalController extends Controller
{
    public function index()
    {
        $dataunitalls = Unit::where('status', '=', '1')->orderBy('id', 'desc')->get();
        return view('portal.index', [
            'title' => 'Portal',
            'active' => 'portal',
            'dataunitalls' => $dataunitalls,
            'reqparam' => $this->getrequement()
        ]);
    }
    public function submenu($id, $nama)
    {
        $datamenu = DB::table('list_sub_unit')
            ->join('list_unit', 'list_unit.id', '=', 'list_sub_unit.id_unit')
            ->select('list_sub_unit.*', 'list_unit.link as base_url', 'list_unit.link_login as login_url')
            ->where('list_sub_unit.id_unit', '=', $id)
            ->get();


        return view('portal.submenu', [
            'title' => 'Submenu',
            'active' => 'submenu',
            'unit_nm' => $nama,
            'datamenus' => $datamenu,
            'reqparam' => $this->getrequement($id)
        ]);
    }


    private function getrequement($idunit = null)
    {
        $getbreederdata = DB::table('users_detail')
            ->where('username', '=', auth()->user()->username)
            ->where('id_unit', '=', "6")
            ->first();
        $getbrdmanadodata = DB::table('users_detail')
            ->where('username', '=', auth()->user()->username)
            ->where('id_unit', '=', "9")
            ->first();
        $getmitradata = DB::table('users_detail')
            ->where('username', '=', auth()->user()->username)
            ->where('id_unit', '=', "4")
            ->first();
        $getcmms = DB::table('users_detail')
            ->where('username', '=', auth()->user()->username)
            ->where('id_unit', '=', "8")
            ->first();
        if ($idunit == null) {
            $dataarray = [
                '7' => [
                    'identity' => auth()->user()->username,
                    'password' => Str::random(32),
                    'bypass' => 'true'
                ],
                '2' => [ //Invoice
                    'username' => auth()->user()->username,
                    'password' => "mea",
                ],
            ];

            if ($getcmms) {
                $dataarray['8'] = [
                    'identity' => auth()->user()->username,
                    'password' => Str::random(32),
                    'bypass' => 'true',
                    "target" => "dashboard",
                    "return" => url()->current()
                ];
            }
            if ($getbreederdata) {
                $dataarray['6'] = [
                    'username' => auth()->user()->username,
                    'password' => $getbreederdata->password,
                ];
                $dataarray['5'] = [
                    'username' => auth()->user()->username,
                    'password' => $getbreederdata->password,
                ];
            }
            if ($getbrdmanadodata) {
                $dataarray['9'] = [
                    'username' => auth()->user()->username,
                    'password' => $getbrdmanadodata->password,
                ];
            }
            if ($getmitradata) {
                $dataarray['4'] = [
                    'username' => auth()->user()->username,
                    'password' => $getmitradata->password,
                ];
            }

            return $dataarray;
        } else {
            switch ($idunit) {
                case '8': //CMMS / Engineer
                    $url_req = [
                        'identity' => auth()->user()->username,
                        'password' => Str::random(32),
                        'bypass' => 'true',
                        "target" => "dashboard",
                        "return" => url()->current()
                    ];

                    $reqparam = http_build_query($url_req);
                    break;
                case '7': //Feedmill
                    $url_req = [
                        'identity' => auth()->user()->username,
                        'password' => Str::random(32),
                        'bypass' => 'true'
                    ];

                    $reqparam = http_build_query($url_req);
                    break;
                case '2': //Invoice
                    $url_req = [
                        'username' => auth()->user()->username,
                        'password' => "mea"
                    ];

                    $reqparam = http_build_query($url_req);
                    break;
                case '4': //Breeding
                    $url_req = [
                        'username' => auth()->user()->username,
                        'password' => Str::random(32),
                        'bypass' => 'true'
                    ];

                    $reqparam = http_build_query($url_req);
                    break;
                case '6': //Breeding
                    $url_req = [
                        'username' => auth()->user()->username,
                        'password' => Str::random(32),
                        'bypass' => 'true'
                    ];

                    $reqparam = http_build_query($url_req);
                    break;
                case '9': //Breeding Manado
                    $url_req = [
                        'username' => auth()->user()->username,
                        'password' => Str::random(32),
                        'bypass' => 'true'
                    ];

                    $reqparam = http_build_query($url_req);
                    break;
                case '5': //HTC
                    $url_req = [
                        'username' => auth()->user()->username,
                        'password' => Str::random(32),
                        'bypass' => 'true'
                    ];

                    $reqparam = http_build_query($url_req);
                    break;

                default:
                    $reqparam = null;
                    break;
            }
            return $reqparam;
        }
    }
}
