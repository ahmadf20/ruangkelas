<div style="padding: 75px 50px; width:81%; margin-left: 250px; margin-top: 80px;">
    <?php echo $this->session->flashdata('message'); ?>
    <h3 class="bold" style="margin-bottom: 70px;">My Courses</h3>

    <div class="row">
        <?php foreach ($myCourse as $s) { ?>
            <div class="col-4">
                <div class="card card-course" style="min-height: 250px; width: 270px" onclick="location.href='MyCourses/course_detail/<?= $s->course_id ?>';">
                    <img class="card-img" src="./assets/course/<?= $s->image ?>" alt="">
                    <div class="card-body">
                        <div class="card-title"><?= $s->course_name ?></div>
                        <div class="card-subtitle"><?= $s->course_desc ?>
                        </div>
                        <hr>
                        <div class="card-subtitle">TO-DO</div>
                        <?php
                            foreach ($todoList as $t) {
                                if ($t->course_id == $s->course_id && $t->due_date > time()) { ?>
                                <a class="todo" href="<?= base_url() . 'Assignment/detail/' . $t->course_id . '/' . $t->id ?>"><?= $t->title ?></a>
                        <?php }
                            } ?>
                        <hr>
                        <div class="card-subtitle"> <i class="fas fa-user-graduate"></i> <span style="margin-left: 10px"><?php echo $user['role_id'] == 1 ? 'Me' : $s->name; ?></span></div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</div>
</div>

</body>

</html>