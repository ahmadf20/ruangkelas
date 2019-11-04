<body class="bg-grey" style="padding-top: 100px; padding-left: 120px; padding-bottom: 100px; padding-right: 120px;">


    <button class="btn" style="width: 100px; border: 1px solid grey; margin-bottom: 50px; margin-left: 15px;">Back</button>

    <div class="row">
        <div class="col-5">
            <div class="card"><img class=" img-profile-big" src="<?= base_url('assets/profile/') . $user['pic'] ?>" alt="">
                <div class="row" style="padding-top: 2rem;">
                    <div class="col" style="padding: 0; margin-left: 10px; margin-top: 20px;">
                        <input class="btn btn-primary" style="width: 300px;" value="Upload" type="submit" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div style="padding-left: 50px;">
                <div class="" style="max-width: 450px;">
                    <form action="<?php echo base_url('register') ?>" method="post" enctype="multipart/form-data">
                        <h1 style=" margin-bottom: 3rem;" class="text-primary">Edit Profile </h3>

                            <p style="margin-top: 10px;">Basic Info</p>
                            <hr>
                            <label for="npm" class="text-primary">Full Name</label>
                            <input type="text" name="name" id="name" value="<?php echo set_value('name') ?>">
                            <small style="color: red"><?php echo form_error('name'); ?></small>

                            <label for="npm" class="text-primary">NPM</label>
                            <input type="text" name="npm" id="npm" value="<?php echo set_value('npm') ?>">
                            <small style="color: red"><?php echo form_error('npm'); ?></small>

                            <p style="margin-top: 10px;">Account</p>
                            <hr>

                            <label for="email" class="text-primary">Email</label>
                            <input type="email" name="email" id="email" class="" value="<?php echo set_value('email') ?>">
                            <small style="color: red"><?php echo form_error('email'); ?></small>

                            <label for="username" class="text-primary">Username</label>
                            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>">
                            <small style="color: red"><?php echo form_error('username'); ?></small>

                            <p style="margin-top: 10px;">Security</p>
                            <hr>

                            <label for="password" class="text-primary">Password</label>
                            <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>">
                            <small style="color: red"><?php echo form_error('password'); ?></small>

                            <label for="re-password" class="text-primary">Re-type password</label>
                            <input type="password" name="re-password" id="re-password" value="<?php echo set_value('re-password') ?>">
                            <small style="color: red"><?php echo form_error('re-password'); ?></small>

                            <div class="row" style="padding-top: 2rem;">
                                <div class="col" style="padding: 0; margin-right: 10px;">
                                    <input class="btn" style="float: left; border: 1px solid grey;" value="Cancel" type="submit" />
                                </div>
                                <div class="col" style="padding: 0; margin-left: 10px;">
                                    <input class="btn btn-primary" style="float: right;" value="Save" type="submit" />
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>