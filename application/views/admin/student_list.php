<div class="col course-detail" style="padding: 75px 0; width:81%; margin-left: 250px; margin-top: 80px;">

    <div class="row">
        <div class="col" style="padding: 0 50px 0 75px">
            <?php
            foreach ($studentList as $s) {
                ?>
                <div class="card" role="button" style="cursor: pointer;">
                    <div class="row">
                        <div class="col-2" style="padding: 0;cursor: pointer;">
                            <img class="img-profile" src="<?= base_url('assets/profile/') . $s->pic ?>" style="width: 50px; height:50px;">
                        </div>
                        <div class="col" style="padding: 0;">
                            <div class="card-subtitle"><?= strtoupper($s->username . ' - ' . $s->email); ?></div>
                            <div class="card-title"><?= strtoupper($s->user_id . ' - ' . $s->name) ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
        </div>
    </div>

</div>


</div>

</body>

</html>