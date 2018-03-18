        <form class="form-horizontal" method="POST" action="<?= base_url('user/update') ?>/<?= $edit->id ?>">
            
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Edit User</h2>
                    <hr>
                    <font color="red">
                        <?php echo validation_errors(); ?>
                    </font>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">Name</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-users"></i></div>
                            <input type="text" name="nama" class="form-control" id="nama"
                                   placeholder="Name" value="<?= $edit->nama ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="hp">HP</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-phone"></i></div>
                            <input type="text" name="hp" class="form-control" id="hp"
                                   placeholder="Phone" value="<?= $edit->hp ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="alamat">Alamat</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-tachometer"></i></div>
                            <input type="text" name="alamat" class="form-control" id="alamat"
                                   placeholder="Alamat" value="<?= $edit->alamat ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="hobi">Hobi</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-certificate"></i></div>
                            <input type="text" name="hobi" class="form-control" id="hobi"
                                   placeholder="Hobi" value="<?= $edit->hobi ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Save</button>
                </div>
            </div>

        </form>