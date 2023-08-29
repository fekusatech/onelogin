@extends('layouts.app')
@section('container')

<div class="content-wrapper">
    <div class="pt-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Managemen User</h3>
                    </div>
                    <div class="card-body">
                        <table id="user-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Status Ban</th>
                                    <th>Role</th>
                                    <th>Unit</th>
                                    <th>Unit Control</th>
                                    <th>Reset Pass</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userlist as $userlists) {
                                    $ban = "<a href='#' data-name='status' class='status' data-type='select' data-pk='ban' data-value='{$userlists->ban}' data-url='/api/update-user/{$userlists->id}/ban' data-title='Banned'><p>" . strtoupper($userlists->ban) . "</p></a>";
                                    $role = "<a href='#' data-name='rolelist' class='rolelist' data-type='select' data-pk='rolelist' data-value='{$userlists->role}' data-url='/api/update-user/{$userlists->id}/rolelist' data-title='rolelist'></a>";
                                    $emailbutton = "<a href='#' class='email' data-type='email' data-value='$userlists->email' data-pk='email' data-name='email' data-url='/api/update-user/{$userlists->id}/email' data-title='Enter email'></a>";
                                    $number = "<a href='#' class='number' data-type='number' data-value='$userlists->number' data-pk='number' data-name='number' data-url='/api/update-user/{$userlists->id}/number' data-title='Enter Number'></a>";
                                    $unitrawnew = "<a href='#' class='unitlist' data-type='checklist' data-value='$userlists->unit' data-pk='unit' data-name='unit' data-url='/api/update-user/{$userlists->id}/unit' data-title='Select Unit'></a>";
                                    $name = "<a href='#' class='firstname' data-type='text' data-pk='firstname' data-placement='right' data-url='/api/update-user/{$userlists->id}/name' data-value='{$userlists->name}' data-placeholder='Required' data-title='Enter your name'></a>";
                                    $password = $userlists->password == null ? "Null" : "Ada password";
                                    $passwordbutton = "<a href='#' class='password' data-type='text' data-value='$userlists->password' data-pk='password' data-name='password' data-url='/api/update-user/{$userlists->id}/password' data-title='Enter Password'>$password</a>";
                                    $unitcontrol = "<a href='#' data-name='unit_control' class='unit_control' data-type='select' data-pk='unit_control' data-value='{$userlists->unit_control}' data-url='/api/update-user/{$userlists->id}/unit_control' data-title='unit_control'></a>"; ?>
                                    <tr>
                                        <td>{{$userlists->username}}<br><small>Last Login : <?= date('d M Y H:i', strtotime($userlists->last_login)) ?></small></td>
                                        <td><?= $name ?></td>
                                        <td><?= $emailbutton ?></td>
                                        <td><?= $number ?></td>
                                        <td><?= $ban ?></td>
                                        <td><?= $role ?></td>
                                        <td><?= $unitrawnew ?></td>
                                        <td><?= $unitcontrol ?></td>
                                        <td><?= $passwordbutton ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection