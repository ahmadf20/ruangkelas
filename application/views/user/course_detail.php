<div class="col course-detail" style="padding: 75px 0; width:81%; margin-left: 250px; margin-top: 80px;">
    <div class="row">
        <div class="col" style="padding: 0 50px 0 75px">

            <?php echo $this->session->flashdata('message'); ?>

            <h2 class="bold" style="margin-bottom: 50px; color: black "><?= $detailCourse['course_name']; ?></h2>
            <h3>COURSE OVERVIEW</h3>

            <?= $detailCourse['course_desc']; ?>

            <hr>

            <div class="card-subtitle" style="margin-top: 20px"> <i class="fas fa-user-graduate"></i>
                <span style="margin-left: 10px;"><?= $detailCourse['name'] ?> | Pertemuan 5</span></div>

            <?php if ($is_enrolled) {
                ?>


                <h3>YOUR JOURNEY</h3>

                <?php
                    foreach ($materials as $m) {
                        ?>
                    <a class="card collapsible" href="#collapse" role="button">
                        <div class="card-subtitle"><?php echo strtoupper(date(DATE_RFC1036, $m->date_created)); ?></div>
                        <div class="card-title"><?= $m->title ?></div>

                        <div class="content">
                            <div class="card-desc">
                                <?= $m->desc ?>
                            </div>
                            <div class="list">
                                <hr>
                                <?php foreach ($files as $f) {
                                            if ($m->material_id == $f->material_id) { ?>
                                        <div class="list-title rounded-list" onclick=" window.location = '<?= base_url(); ?>Download/file/<?= $f->id ?>'"><i class="fa fa-file-pdf" aria-hidden="true"></i> <?= $f->file_name . $f->extension ?>
                                        </div>
                                <?php }
                                        } ?>
                            </div>
                        </div>
                    </a>
                <?php
                    }
                } else { ?>


                <h3 style="color:red">YOU CANNOT ACCESS THIS COURSE. PLEASE ENROLL TO CONTINUE.</h3>
                <a class="card" href="<?= base_url('AllCourses/enroll/') . $detailCourse['course_id'];  ?>" role="button">
                    <div class="card-title">ENROLL ME</div>
                </a>

            <?php } ?>

        </div>

        <div class="col-4" style="margin-right: 20px">
            <div class="card card-course sidebar" style="padding: 10px !important">
                <div class="card-body">
                    <div class="card-title">Assigments</div>
                    <a class="list" style="font-size: 15px" href="#">
                        <div class="row">
                            <div class="list-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <div class="col">
                                <span class="list-title">Metnum - Tugas Besar</span>
                                <div class="list-subtitle">5
                                    November 2019</div>
                            </div>
                        </div>
                    </a>
                    <a class="list" style="font-size: 15px" href="#">
                        <div class="row">
                            <div class="list-icon">
                                <i class="fas fa-keyboard"></i>
                            </div>
                            <div class="col">
                                <span class="list-title">OOP - Tugas Pertemuan 1</span>
                                <div class="list-subtitle">5
                                    November 2019</div>
                            </div>
                        </div>
                    </a>
                    <a class="list" style="font-size: 15px" href="#">
                        <div class="row">
                            <div class="list-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <div class="col">
                                <span class="list-title">SO - Makalah Sistem Operasi</span>
                                <div class="list-subtitle">5
                                    November 2019</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card card-course sidebar" style="padding: 10px !important">
                <div class="card-body">
                    <div class="card-title">Announcement</div>
                    <div class="list" style="font-size: 15px" href="#">
                        <div class="list-title">Praktikum Sisdat Libur</div>
                        <div class="list-subtitle">Dikarenakan lab sedang
                            digunakan untuk kepentingan lomba,
                            maka sementara jadwal praktikum sistem database diliburkan.
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-course sidebar" style="padding: 10px !important">
                <div class="card-body">
                    <div class="card-title">Contact Us</div>
                    <div class="list" style="font-size: 15px" href="#">
                        <div class="row">
                            <div class="col" style="padding: 0">
                                <div class="list-title">Erick Paulus, S.kom, M.M</div>
                                <div class="list-subtitle">08562207263</div>
                            </div>
                            <a class="" href="#">
                                <div class="btn btn-sm">Contact
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($is_enrolled) {
                ?>

                <a class="card" href="<?= base_url('AllCourses/un_enroll/') . $detailCourse['course_id'];  ?>" role="button">
                    <div class="card-title">UN-ENROLL ME</div>
                </a>

            <?php } ?>

        </div>
    </div>

</div>


</div>

<script>
    collapsible();
</script>

</body>

</html>