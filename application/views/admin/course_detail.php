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
                                <input class="btn btn-primary" style="float: right;" value="Add" type="submit" />
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
                            <div title="Add Assignment" onclick="location.href='<?= base_url(); ?>Assignment/create/<?= $m->course_id ?>/<?= $m->material_id ?>';" class=""><i class="fa fa-plus-square"></i></div>
                        </div>
                        <div class="" style="padding: 0; text-align: right; width: 30px !important;">
                            <div title="Delete Course" onclick="location.href='<?= base_url(); ?>Course/delete_material/<?= $m->course_id ?>/<?= $m->material_id ?>';" class="icon-clickable"><i class="far fa-trash-alt"></i></div>
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

                                <div class="row">
                                    <div class="col" style="padding: 0;">
                                        <input type="file" name="files" id="files" multiple size="20" />
                                    </div>
                                    <div class="col-3" style="padding: 0; padding-left: 10px">
                                        <button class="btn btn-primary" onclick="uploadFile(<?= $m->course_id . ',' . $m->material_id ?>)">Upload</button>
                                    </div>
                                </div>
                                <!-- <div style="clear:both"></div> -->
                                <!-- <div id="uploaded_images"></div> -->
                            </div>

                            <?php foreach ($files as $f) {
                                    if ($m->material_id == $f->material_id) { ?>
                                    <div class="list-title rounded-list row">
                                        <div class="col" style="padding: 0;">
                                            <div onclick=" window.location = '<?= base_url(); ?>Download/file/<?= $f->id ?>'"><i class="far fa-file" aria-hidden="true"></i> <?= $f->file_name . $f->extension ?>
                                            </div>
                                        </div>
                                        <div class="col-1" style="padding: 0;" align='right'>
                                            <div onclick="location.href='<?= base_url(); ?>Course/delete_file/<?= $f->id ?>';" class="icon-clickable"><i class="far fa-trash-alt" title="Delete File"></i></div>
                                            <!-- <i class="far fa-trash-alt" aria-hidden="true"></!-->
                                        </div>
                                    </div>
                            <?php }
                                } ?>
                            <hr>
                            <?php foreach ($assignments as $a) {
                                    if ($m->material_id == $a->material_id) { ?>
                                    <div class="list-title rounded-list row">
                                        <div class="col" style="padding: 0;">
                                            <div onclick=" window.location = '<?= base_url(); ?>Assignment/<?= $a->id ?>'"><i class="far fa-file" aria-hidden="true"></i> <?= $a->title ?>
                                            </div>
                                        </div>
                                        <div class="col-1" style="padding: 0;" align='right'>
                                            <div onclick="location.href='<?= base_url(); ?>Assignment/delete/<?= $a->id ?>/<?= $a->course_id ?>';" class="icon-clickable"><i class="far fa-trash-alt" title="Delete Assignment"></i></div>
                                            <!-- <i class="far fa-trash-alt" aria-hidden="true"></!-->
                                        </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    collapsible();
    addMaterialCollapse();
</script>

</body>

</html>
<script>
    // $(document).ready(function() {
    function uploadFile(course_id, material_id) {
        // $('#files').change(function() {
        var files = $('#files')[0].files;
        var error = '';
        var _url = "<?= base_url(); ?>Course/upload/";
        _url = _url.concat(course_id, "/", material_id);
        var form_data = new FormData();
        for (var count = 0; count < files.length; count++) {
            var name = files[count].name;
            var extension = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'pdf', 'rar', 'zip']) == -1) {
                error += "Invalid " + count + " Image File"
            } else {
                form_data.append("files[]", files[count]);
            }
        }
        if (error == '') {
            $.ajax({
                url: _url,
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
                },
                success: function(data) {
                    $('#uploaded_images').html(data);
                    $('#files').val('');
                }
            });
        } else {
            alert(error);
        }
        // });
        // });
        // location.reload();
    };
</script>