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

            <span style="font-size: 15px; font-family: 'Open Sans';">
                <?= $detailCourse['course_desc']; ?>
            </span>

            <hr>

            <div class="card-subtitle" style="margin-top: 20px"> <i class="fas fa-user-graduate"></i>
                <span style="margin-left: 10px;"><?= $detailCourse['name'] ?></span></div>

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
                                <input class="btn btn-primary" style="float: right;" value="Add" type="submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </a>
            <hr>

            <?php
            $i = 0;
            foreach ($materials as $m) {
                ?>
                <a class="card collapsible" href="#collapse" role="button">
                    <div class="row">
                        <div class="col" style="padding: 0;">
                            <div class="card-subtitle"><?= strtoupper(date('l, j M Y', $m->date_created)); ?></div>
                        </div>
                        <div class="col-1" style="padding: 0; text-align: right;">
                            <div title="Add Assignment" onclick="location.href='<?= base_url(); ?>Assignment/create/<?= $m->course_id ?>/<?= $m->material_id ?>';" class="icon-clickable-blue"><i class="fa fa-plus-square"></i></div>
                        </div>
                        <div class="" style="padding: 0; text-align: right; width: 30px !important;">
                            <div title="Delete Course" onclick="location.href='<?= base_url(); ?>Course/delete_material/<?= $m->course_id ?>/<?= $m->material_id ?>';" class="icon-clickable-red"><i class="far fa-trash-alt"></i></div>
                        </div>
                    </div>
                    <div class="card-title"><?= $m->title ?></div>

                    <div class="content">
                        <div class="card-desc">
                            <?= $m->desc ?>
                        </div>
                        <div class="list">
                            <hr>

                            <div class="container">

                                <?php echo form_open_multipart('Course/upload/' . $m->course_id . '/' . $m->material_id); ?>
                                <div class="row">
                                    <div class="col" style="padding: 0;">
                                        <input type="file" name="userfile" size="20" />
                                    </div>
                                    <div class="col-3" style="padding: 0; padding-left: 10px">
                                        <input class="btn btn-primary" type="submit" value="upload" />
                                    </div>
                                </div>
                                </form>

                            </div>

                            <?php foreach ($files as $f) {
                                    if ($m->material_id == $f->material_id) { ?>
                                    <div class="list-title rounded-list row">
                                        <div class="col" style="padding: 0;">
                                            <div onclick=" window.location = '<?= base_url(); ?>Download/file/<?= $f->id ?>'"><i class="far fa-file-alt" aria-hidden="true" style="width: 20px; text-align: center; margin-right: 7.5px;"></i> <?= $f->file_name . $f->extension ?>
                                            </div>
                                        </div>
                                        <div class="col-1" style="padding: 0;" align='right'>
                                            <div onclick="location.href='<?= base_url(); ?>Course/delete_file/<?= $f->id ?>';" class="icon-clickable-red"><i class="far fa-trash-alt" title="Delete File"></i></div>
                                        </div>
                                    </div>
                            <?php }
                                } ?>
                            <?php foreach ($assignments as $a) {
                                    if ($m->material_id == $a->material_id) { ?>
                                    <div class="list-title rounded-list row">
                                        <div class="col" style="padding: 0;">
                                            <div onclick=" window.location = '<?= base_url(); ?>Assignment/detail/<?= $a->course_id ?>/<?= $a->id ?>'"><i class="fa fa-box-open" aria-hidden="true" style="width: 20px; text-align: center; margin-right: 7.5px;"></i> <?= $a->title ?>
                                            </div>
                                        </div>
                                        <div class="col-1" style="padding: 0;" align='right'>
                                            <div onclick="location.href='<?= base_url(); ?>Assignment/delete/<?= $a->id ?>/<?= $a->course_id ?>';" class="icon-clickable-red"><i class="far fa-trash-alt" title="Delete Assignment"></i></div>
                                        </div>
                                    </div>
                            <?php }
                                } ?>
                        </div>
                    </div>
                </a>
            <?php
                $i++;
            } ?>
        </div>

        <div class="col-4" style="margin-right: 20px">


            <div class="card card-course sidebar" style="padding: 10px !important">
                <div class="card-body">
                    <div class="card-title">Student Info</div>
                    <div class="row">
                        <div class="col-1" style="padding: 0;">
                            <div class="list" style="font-size: 15px">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col">
                            <div class="list" style="font-size: 15px">
                                <div class="list-title">Total student : <?= sizeof($studentList) ?></div>
                                <div class="list-subtitle">
                                    <a href="<?= base_url('Course/student_list/' . $detailCourse['course_id']) ?>">See details</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    collapsible();
    addMaterialCollapse();
</script>

</body>

</html>