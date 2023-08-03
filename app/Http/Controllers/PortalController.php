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


    private function getrequement($idunit)
    {
        switch ($idunit) {
            case '7':
                $url_req = [
                    'identity' => auth()->user()->username,
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
