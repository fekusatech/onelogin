@extends('layouts.app')
@section('container')

<div class="content-wrapper">
    <div class="pt-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <?php $no = 1;
                            $active = true;
                            foreach ($unitlist as $unitlists) {
                                $active = $no++ == 1 ? true : false;
                                $id = str_replace(" ", "_", strtolower($unitlists->nama));
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= $active ? 'active' : null ?>" id="custom-<?= $id ?>-tab" data-toggle="pill" href="#custom-<?= $id ?>" role="tab" aria-controls="custom-<?= $id ?>" aria-selected="true"><?= ucwords($unitlists->nama) ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <?php $no = 1;
                            $active = true;
                            foreach ($unitlist as $unitlists) {
                                $active = $no++ == 1 ? true : false;
                                $id = str_replace(" ", "_", strtolower($unitlists->nama));
                            ?>
                                <div class="tab-pane fade <?= $active ? 'active show' : null ?>" id="custom-<?= $id ?>" role="tabpanel" aria-labelledby="custom-<?= $id ?>-tab">
                                    <table id="<?= $id ?>-table" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status Ban</th>
                                                <th>Role</th>
                                                <th>Unit</th>
                                                <th>Reset Pass</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($userlist as $userlists) {
                                                $ban = "<a href='#' data-name='status' class='status' data-type='select' data-pk='ban' data-value='{$userlists->ban}' data-url='/api/update-user/{$userlists->id}/ban' data-title='Banned'><p>" . strtoupper($userlists->ban) . "</p></a>";
                                                $role = "<a href='#' data-name='rolelist' class='rolelist' data-type='select' data-pk='rolelist' data-value='{$userlists->role}' data-url='/api/update-user/{$userlists->id}/rolelist' data-title='rolelist'></a>";
                                                $emailbutton = "<a href='#' class='email' data-type='text' data-value='$userlists->email' data-pk='email' data-name='email' data-url='/api/update-user/{$userlists->id}/email' data-title='Enter email'></a>";
                                                $unitrawnew = "<a href='#' class='unitlist' data-type='checklist' data-value='$userlists->unit' data-pk='unit' data-name='unit' data-url='/api/update-user/{$userlists->id}/unit' data-title='Select Unit'></a>";
                                                $name = "<a href='#' class='firstname' data-type='text' data-pk='firstname' data-placement='right' data-url='/api/update-user/{$userlists->id}/name' data-value='{$userlists->name}' data-placeholder='Required' data-title='Enter your name'></a>";
                                                $password = $userlists->password == null ? "Null" : "Ada password";
                                                $passwordbutton = "<a href='#' class='password' data-type='text' data-value='$userlists->password' data-pk='password' data-name='password' data-url='/api/update-user/{$userlists->id}/password' data-title='Enter Password'>$password</a>";
                                            ?>
                                                <tr>
                                                    <td>{{$userlists->username}}<br><small>Last Login : <?= date('d M Y H:i', strtotime($userlists->last_login)) ?></small></td>
                                                    <td><?= $name ?></td>
                                                    <td><?= $emailbutton ?></td>
                                                    <td><?= $ban ?></td>
                                                    <td><?= $role ?></td>
                                                    <td><?= $unitrawnew ?></td>
                                                    <td><?= $passwordbutton ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection