<body class="bg-grey" style="padding-top: 100px; padding-left: 120px; padding-bottom: 100px; padding-right: 120px;">

    <a href="<?= base_url('AllCourses') ?>" style="width: 100px; margin-bottom: 50px; margin-left: 15px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> <span style="margin-left: 5px; margin-bottom: 10px;">Back</span></a>

    <br>
    <br>

    <form class="form-horizontal" action="EditProfile/ImageUpload" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="">
                <div class="card" style="padding: 50px;"><img class=" img-profile-big" src="<?= base_url('assets/profile/') . $user['pic'] ?>" id="pic" alt="">
                    <div class="row" style="padding-top: 2rem;">
                        <div class="col" style="padding: 0; margin-left: 10px; margin-top: 20px;">
                            <input class="input-group-text" style="width: 300px;" value="upload" type="file" name="photo" /> <br>
                            <input class="btn btn-primary" style="width: 300px;" value="submit" type="submit" name="submit" />
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <div class="col">
        <div style="padding-left: 50px;">
            <div class="" style="max-width: 450px;">
                <form action="<?php echo base_url('EditProfile/SavePassword') ?>" method="post" enctype="multipart/form-data">
                    <h1 style=" margin-bottom: 3rem;" class="text-primary">Edit Profile </h3>

                        <p style="margin-top: 10px;">Basic Info</p>
                        <hr>
                        <label for="name" class="text-primary">Full Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>" readonly="readonly">
                        <small style="color: red"><?php echo form_error('name'); ?></small>

                        <label for="npm" class="text-primary">NPM</label>
                        <input type="text" name="npm" id="npm" value="<?php echo $user['user_id'] ?>" readonly="readnly">
                        <small style="color: red"><?php echo form_error('npm'); ?></small>

                        <p style="margin-top: 10px;">Account</p>
                        <hr>

                        <label for="email" class="text-primary">Email</label>
                        <input type="email" name="email" id="email" class="" value="<?php echo $user['email'] ?>">
                        <small style="color: red"><?php echo form_error('email'); ?></small>

                        <label for="username" class="text-primary">Username</label>
                        <input type="text" name="username" id="username" value="<?php echo $user['username'] ?>">
                        <small style="color: red"><?php echo form_error('username'); ?></small>

                        <p style="margin-top: 10px;">Security</p>
                        <hr>

                        <label for="passLama" class="text-primary">Password</label>
                        <input type="password" name="passLama" id="passLama" value="<?php echo set_value('passLama') ?>">
                        <small style="color: red"><?php echo form_error('passLama'); ?></small>

                        <label for="passBaru" class="text-primary">New Password</label>
                        <input type="password" name="passBaru" id="passBaru" value="<?php echo set_value('passBaru') ?>">
                        <small style="color: red"><?php echo form_error('passBaru'); ?></small>

                        <label for="passKonf" class="text-primary">Re-type password</label>
                        <input type="password" name="passKonf" id="passKonf" value="<?php echo set_value('passKonf') ?>">
                        <small style="color: red"><?php echo form_error('passKonf'); ?></small>

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