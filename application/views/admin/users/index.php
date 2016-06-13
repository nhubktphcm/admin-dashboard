<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/layouts/header'); ?>
</head>

<body>
<?php $this->load->view('admin/layouts/nav'); ?>
<div class="container">
    <div class="row">
        <?php $this->load->view('admin/layouts/menu'); ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3>User list</h3>
            <br/>
            <button class="btn btn-success" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i> Add new
            </button>
            <br/>
            <br/>
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th style="width:125px;">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('admin/layouts/footer'); ?>
<?php $this->load->view('admin/users/user-management-script'); ?>
<?php $this->load->view('admin/users/dialogs'); ?>
</body>
</html>