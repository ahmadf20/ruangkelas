<div class="col course-detail" style="padding: 75px 0; width:81%; margin-left: 250px; margin-top: 80px;">
    <div class="row">
        <div class="col" style="padding: 0 50px 0 75px">

            <?php echo $this->session->flashdata('message'); ?>

            <div class="card-subtitle" style="margin-top: 20px">
                <span> <?= date('l, j M  h:i A', $detailAssignment['date_created'] + 6 * 3600) ?></span>
                <br>
                <br>
            </div>

            <h2 class="bold" style="margin-bottom: 50px; color: black "><?= $detailAssignment['title']; ?></h2>
            <h3>DESCRIPTION</h3>

            <span style="font-size: 15px; font-family: 'Open Sans';"> <?= $detailAssignment['desc']; ?></span>

            <hr>

            <div class="card-subtitle" style="margin-top: 20px"> <i class="fas fa-calendar-check"></i>
                <span style="margin-left: 10px;"><?= $detailAssignment['is_late_accepted'] == 1 ? 'Due' : 'No submissions are accepted after ' ?></span>
                <span style="margin-left: 5px; font-weight: bold;"> <?= date('l, j M  h:i A', strtotime($detailAssignment['due_date'])) ?></span>
            </div>


            <h3>YOUR FILE(S)</h3>


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



        </div>
    </div>

</div>


</div>

<script>
    collapsible();
</script>

</body>

</html>