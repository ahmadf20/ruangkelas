<body class="bg-grey">

    <div id="header" class="bg-white">
        <ul>
            <li><a id="logo" href="#home" class="text-secondary">RK-UNPAD</a></li>
            <li><a class="text-secondary" href="#contact">Contact Us</a></li>
        </ul>

    </div>

    <div class="row">
        <div class="col">
            <div style="padding-top: 100px; padding-left:  120px; padding-bottom: 100px">
                <div class="card" style="max-width: 450px; box-shadow: 0rem 0.5rem 2rem 0.25rem rgba(0, 0, 0, 0.219);">
                    <form action="<?php echo base_url('register') ?>" method="post" enctype="multipart/form-data">
                        <h1 style=" margin-bottom: 3rem;" class="text-primary">Sign Up</h3>

                            <label for="npm" class="text-primary">Full Name</label>
                            <input type="text" name="name" id="name" value="<?php echo set_value('name') ?>">
                            <small style="color: red"><?php echo form_error('name'); ?></small>

                            <label for="npm" class="text-primary">NPM</label>
                            <input type="text" name="npm" id="npm" value="<?php echo set_value('npm') ?>">
                            <small style="color: red"><?php echo form_error('npm'); ?></small>

                            <label for="email" class="text-primary">Email</label>
                            <input type="email" name="email" id="email" class="" value="<?php echo set_value('email') ?>">
                            <small style="color: red"><?php echo form_error('email'); ?></small>

                            <label for="username" class="text-primary">Username</label>
                            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>">
                            <small style="color: red"><?php echo form_error('username'); ?></small>

                            <label for="password" class="text-primary">Password</label>
                            <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>">
                            <small style="color: red"><?php echo form_error('password'); ?></small>

                            <a href="#" style="font-size: 0.75rem; font-weight: 600" class="text-secondary">Already
                                have an account?</a>
                            <div class="row" style="padding-top: 2rem;">
                                <div class="col">
                                    <a href="<?php echo base_url('login') ?>">Log In instead</a>
                                </div>
                                <div class="col">
                                    <input class="btn btn-primary" style="float: right;" value="Sign Up" type="submit" />
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col text-secondary" style="padding-top: 120px; margin-left: -25px">
            <p style="font-size: 4rem; font-weight: 700; line-height: 5rem">Selamat <br> Datang!</p>
            <p style="font-size: 1.25rem; width: 75%">Silakan sign up kemudian login untuk mengakses materi
                pembelajaran lebih lengkap.</p>
            <hr style="border: 0.25px solid #6c757d; float: left;" width="25%"> <br> <br>
            <p style="font-size: 0.85rem; margin-bottom: 30px">Daftarkan diri anda dengan menggunakan email <br> yang telah terdaftar di universitas anda.</p>
        </div>
    </div>

</body>

</html>