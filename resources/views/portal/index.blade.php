@extends('layouts.app')
@section('container')
<div class="content-wrapper">
    <div class="pt-5"></div>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">
                        <span>
                            <strong>Hello, <b>{{ ucwords(auth()->user()->name) }}</b>.</strong>
                            <br>Silahkan pilih aplikasi yang ingin anda akses
                        </span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5"></div>
    <div class="content">
        <div class="container">
            <div class="row">
                @foreach ($dataunitalls as $dataunitall)
                <?php
                $unitaccess = auth()->user()->unit;
                $uniataccess_arr = explode(",", $unitaccess);
                if ($dataunitall->showing_sub) {
                    $url = "href='" . url('submenu') . "/" . $dataunitall->id  . "/" . $dataunitall->nama . "'";
                } else {
                    $url = "href='$dataunitall->link'";
                }
                if (array_search($dataunitall->id, $uniataccess_arr) !== false) {
                    $ribbon = "<div class='ribbon bg-success'>Akses diberikan</div>";
                } else {
                    $url = "href='#' onclick='blockurl(`$dataunitall->nama`)'";
                    $ribbon = "<div class='ribbon bg-danger'>Tidak ada akses</div>";
                }
                ?>
                <div class="col-sm-4 mb-4">
                    <a @php echo $url @endphp>
                        <div class="position-relative p-3 bg-gray shadow" style="height: 180px; border-radius:16px;">
                            <div class="ribbon-wrapper ribbon-lg">
                                @php echo $ribbon @endphp
                            </div>
                            {{ $dataunitall->nama }}
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection