<div class="col course-detail" style="padding: 75px 0; width:81%; margin-left: 250px; margin-top: 80px;">
    <div class="row">
        <div class="col" style="padding: 0 50px 0 75px">

            <?php echo $this->session->flashdata('message'); ?>

            <h2 class="bold" style="margin-bottom: 50px; color: black "><?= $detailCourse['course_name']; ?>
                <a href="<?= base_url('Course/edit/' . $detailCourse['course_id']) ?>" method="post" style="display: inline">
                    <button class="btn btn-sm"><i class="fas fa-pen"></i> Edit</button>
                </a>
            </h2>
            <h3>COURSE OVERVIEW</h3>

            <?= $detailCourse['course_desc']; ?>

            <hr>

            <div class="card-subtitle" style="margin-top: 20px"> <i class="fas fa-user-graduate"></i>
                <span style="margin-left: 10px;"><?= $detailCourse['name'] ?> | Pertemuan 5</span></div>

            <h3>YOUR JOURNEY</h3>

            <a class="card add-collapsible" href="#collapse" role="button">
                <div class="row">
                    <div class=""><i class="fa fa-plus-square" aria-hidden="true"></i></div>
                    <div class="col">Add New Material</div>
                </div>
                <div class="content">
                    <form action="<?php echo base_url('Course/add_material/' . $detailCourse['course_id']) ?>" method="post" enctype="multipart/form-data">

                        <hr>
                        <div class="p-3">

                            <label for="title" class="text-primary">Material Title</label>
                            <input type="text" name="title" id="title">

                            <label for="desc" class="text-primary">Short Description</label>
                            <input type="text" name="desc" id="desc">



                            <div class="row" style="padding-top: 2rem;">
                                <input class="btn btn-primary" style="float: right;" value="Save" type="submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </a>
            <hr>

            <?php
            foreach ($materials as $m) {
                ?>
                <a class="card collapsible" href="#collapse" role="button">
                    <div class="row">
                        <div class="col" style="padding: 0;">
                            <div class="card-subtitle"><?php echo strtoupper(date(DATE_RFC1036, $m->date_created)); ?></div>
                        </div>
                        <div class="col-1" style="padding: 0; text-align: right;">
                            <div onclick="location.href='<?= base_url(); ?>Course/delete_material/<?= $m->course_id ?>/<?= $m->material_id ?>';" class="icon-clickable"><i class="fas fa-trash"></i></div>
                        </div>
                    </div>
                    <div class="card-title"><?= $m->title ?></div>

                    <div class="content">
                        <div class="card-desc">
                            <?= $m->desc ?>
                        </div>
                        <div class="list">
                            <hr>
                            <?php foreach ($files as $f) {
                                    if ($m->material_id == $f->material_id) { ?>
                                    <div class="list-title" onclick=" window.location = '<?= base_url(); ?>Download/file/<?= $f->id ?>'"><i class="fa fa-file-pdf" aria-hidden="true"></i> <?= $f->file_name . '.' . $f->extension ?>
                                    </div>
                            <?php }
                                } ?>
                        </div>
                    </div>
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
            <a class="card" href="<?= base_url('Course/delete/' . $detailCourse['course_id']) ?>" role="button">
                <div class="">DELETE COURSE</div>
            </a>
        </div>
    </div>

</div>


</div>

<script>
    collapsible();
    addMaterialCollapse();
</script>

</body>

</html>