<body class="bg-grey">

    <div id="header" class="bg-white">
        <ul>
            <li><a id="logo" href="#home" class="text-secondary">RK-UNPAD</a></li>
            <li><a class="active text-secondary" href="#home">Dashboard</a></li>
            <li><a class="text-secondary" href="#news">My Course</a></li>
            <li><a class="text-secondary" href="#contact">Contact Us</a></li>
            <!-- <li style="float:right" id="signUp"><input type="text" name="searchCourse" id=""
                            placeholder="Search Course" class="button"></li> -->
        </ul>

    </div>

    <div class="row">
        <div class="col">
            <div style="padding-top: 100px; padding-left:  120px; padding-bottom: 100px">
                <div class="card" style="max-width: 450px; box-shadow: 0rem 0.5rem 2rem 0.25rem rgba(0, 0, 0, 0.219);">
                    <form action="<?php echo base_url('register') ?>" method="post" enctype="multipart/form-data">
                        <h1 style=" margin-bottom: 3rem;" class="text-primary">Sign Up</h3>

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
            <p style="font-size: 1.25rem; width: 75%">Silakan Sign Up kemudian login untuk mengakses materi
                pembelajaran lebih lengkap.</p>
            <hr style="border: 0.25px solid #6c757d; float: left;" width="25%"> <br> <br>
            <p style="font-size: 0.85rem; margin-bottom: 30px">atau lewatkan bila tidak ingin mengakses <br> materi
                secara penuh</p>
            <div class="btn btn-secondary text-secondary" style="border: 1px solid #585858;">
                Lewatkan</div>
        </div>
    </div>

    <!-- 
            <div id="footer">
                <img src="assets/sosmed.png" alt="" style="height: 200px">
                <div style="width:30%">
                    <h3>INFO</h3>
                    <a href="">- Official Depilkom</a>
                    <a href="">- Official Himatif</a>
                    <a href="">- Official FMIPA UNPAD</a>
                    <a href="">- Portal Staff UNPAD</a>
                    <a href="">- Portal Students UNPAD</a>
                    <a href="">- Kandaga UNPAD</a>
                </div>
                <div>
                    <h3>CONTACT US</h3>
                    <p>Gedung A PPBS Lt.1, Prodi S1 Teknik Informatika, FMIPA, Jl. Raya Bandung-Sumedang Km. 21, Jatinangor,
                        45363
                        <br>Phone: +6222 7798983
                        <br>E-mail: informatika@unpad.ac.id/p>
                </div>
            </div>
            <p class="center">Copyright © 2019 - Developed by Departemen Ilmu Komputer Unpad</p> -->
</body>

</html>