<div style="padding: 75px 50px; width:81%; margin-left: 250px; margin-top: 80px;">
    <h3 class="bold" style="margin-bottom: 70px;">My Courses</h3>

    <div class="row">
        <?php foreach ($myCourse as $s) { ?>
            <div class="col-4">
                <div class="card card-course" style="min-height: 333px; width: 270px" onclick="location.href='MyCourses/course_detail/<?= $s->subject_id ?>';">
                    <img class="card-img" src="./assets/course/<?= $s->subject_id ?>.jpg" alt="">
                    <div class="card-body">
                        <div class="card-title"><?= $s->subject_name ?></div>
                        <div class="card-subtitle"><?= $s->subject_desc ?>
                        </div>
                        <hr>
                        <div class="card-subtitle">TO-DO</div>
                        <a class="todo" href="#">Tugas pertemuan 1</a>
                        <a class="todo" href="#">Tugas pertemuan 2</a>
                        <hr>
                        <div class="card-subtitle"> <i class="fas fa-user-graduate"></i> <span style="margin-left: 10px"><?= $s->name ?></span></div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</div>
</div>

</body>

</html>