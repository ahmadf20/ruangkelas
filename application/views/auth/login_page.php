<body class="bg-blue">
    <div id="header" class="bg-blue text-white">
        <ul>
            <li><a id="logo" href="#home">RK-UNPAD</a></li>
            <li><a class="active" href="#home">Dashboard</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>

    </div>

    <div class="row">
        <div class="col">
            <div style="padding-top: 100px; padding-left:  120px; padding-bottom: 100px">
                <div class="card" style="max-width: 450px;   box-shadow: 0rem 0.5rem 2rem 0.25rem rgba(0, 0, 0, 0.219);">
                    <form action="<?php echo base_url() ?>" method="post">
                        <h1 style="margin-bottom: 3rem;" class="text-primary">Log In</h3>

                            <?php echo $this->session->flashdata('message'); ?>

                            <label for="username" class="text-primary">Username</label>
                            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>">
                            <small style="color: red"><?php echo form_error('username'); ?></small>

                            <label for="password" class="text-primary">Password</label>
                            <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>">
                            <small style="color: red"><?php echo form_error('password'); ?></small>

                            <a href="#" style="font-size: 0.75rem; font-weight: 600" class="text-secondary">Forgot
                                email /
                                password?</a>
                            <div class="row" style="padding-top: 2rem;">
                                <div class="col">
                                    <a href="<?php echo base_url('register') ?>">Create account</a>
                                </div>
                                <div class="col">
                                    <input class="btn btn-primary" style="float: right;" type="submit" value="Log In">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class=" col text-white" style="padding-top: 120px; margin-left: -25px">
            <p style="font-size: 4rem; font-weight: 700; line-height: 5rem">Selamat <br> Datang!</p>
            <p style="font-size: 1.25rem; width: 75%">Silakan login terlebih dahulu untuk mengakses materi
                pembelajaran lebih
                lengkap.</p>
            <hr style="border: 0.25px solid white; float: left;" width="25%"> <br> <br>
            <p style="font-size: 0.85rem; margin-bottom: 30px">Jika belum memiliki akun, silakan sign up <br> terlebih dahulu.</p>
        </div>
    </div>

</body>

</html>