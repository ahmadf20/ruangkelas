<div class="row" 0 style="height: 800px">

        <?php foreach ($myCourse as $s) {
                if ($s->subject_id == $this->uri->segment(3)) {
                        $is_enrolled = true;
                        break;
                }
                $is_enrolled = false;
        } ?>

        <div class="sidenav" style="background-color: white; border-right: 0.25px solid rgb(243, 243, 243);">
                <div class="" style="height: 80px; width: 250px; border-right: 0.25px solid rgb(243, 243, 243); border-bottom: 0.25px solid rgb(243, 243, 243); padding-top: 30px; padding-left: 40px">
                        <h5 style="font-weight: 700"><i class="fa fa-book-reader" aria-hidden="true"></i> Ruang Kelas</h5>
                </div>
                <a class="group">MENU</a>
                <a class="<?php if ($this->uri->segment(1) == 'MyCourses' && $this->uri->segment(2) == null) echo 'active' ?>" href="<?= base_url('MyCourses') ?>">
                        <i class="fa fa-newspaper" aria-hidden="true"></i> <span>My Courses</span></a>
                <a class="<?php if ($this->uri->segment(1) == 'AllCourses' && $is_enrolled == false) echo 'active'  ?>" href="<?= base_url('AllCourses') ?>">
                        <i class="fa fa-search" aria-hidden="true"></i><span>Browse Courses</span></a>
                <a class="group"></a>
                <a class="group">ENROLLED</a>

                <?php foreach ($myCourse as $s) { ?>
                        <a class="<?php if ($this->uri->segment(3) == $s->subject_id) echo 'active' ?>" href="<?= base_url('AllCourses/course_detail/' . $s->subject_id) ?>">
                                <div class="row">
                                        <div class="" style="width:10% !important">
                                                <i class="fa fa-tasks" aria-hidden="true"></i>
                                        </div>
                                        <div class="col">
                                                <?= $s->subject_name ?>
                                        </div>
                                </div>
                        </a>
                <?php } ?>
        </div>