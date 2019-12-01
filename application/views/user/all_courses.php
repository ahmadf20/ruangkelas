    <div style="padding: 75px 50px; width:81%; margin-left: 250px; margin-top: 80px;">

        <!-- <div style="padding: 75px 50px"> -->
        <div class="row">
            <h3 class="bold" style="margin-bottom: 70px;">All Courses</h3>
        </div>

        <div class="row">
            <?php foreach ($allCourse as $s) { ?>
                <div class="col-4">
                    <div class="card card-course" style="min-height: 150px; width: 270px" onclick="location.href='AllCourses/course_detail/<?= $s->course_id ?>';">
                        <img class="card-img" src="./assets/course/<?= $s->image ?>" alt="">
                        <div class="card-body">
                            <div class="card-title"><?= $s->course_name ?></div>
                            <div class="card-subtitle"><?= $s->course_desc ?>
                            </div>
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