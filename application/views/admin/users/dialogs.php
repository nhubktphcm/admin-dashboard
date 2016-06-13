<!-- Bootstrap modal -->
<div class="modal fade" id="user_modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">User Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="user_form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">User Name</label>

                            <div class="col-md-9">
                                <input name="userName" id="username" placeholder="User Name" class="form-control"
                                       type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>

                            <div class="col-md-9">
                                <input name="password" id="password" placeholder="Password" class="form-control"
                                       type="password">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">First name</label>

                            <div class="col-md-9">
                                <input name="firstName" id="firstName" placeholder="First name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Last name</label>

                            <div class="col-md-9">
                                <input name="lastName" id="lastName" placeholder="lastName" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>

                            <div class="col-md-9">
                                <input name="email" id="email" placeholder="Email" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->