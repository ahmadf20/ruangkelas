<div class="col course-detail" style="padding: 75px 0; width:81%; margin-left: 250px; margin-top: 80px;">
    <div class="row">
        <div class="col" style="padding: 0 50px 0 75px">

            <?php
            $is_late = ($detailAssignment['is_late_accepted'] == 0 && strtotime($detailAssignment['due_date']) < time());

            echo $this->session->flashdata('message'); ?>

            <div class="card-subtitle" style="margin-top: 20px">
                <span> <?= date('l, j M  h:i A', $detailAssignment['date_created']) ?></span>
                <br>
                <br>
            </div>

            <h2 class="bold" style="margin-bottom: 50px; color: black "><?= $detailAssignment['title']; ?>
                <?php if ($user['role_id'] == 1) { ?>
                    <a href="<?= base_url('Assignment/edit/' . $detailAssignment['course_id'] . '/' . $detailAssignment['id']) ?>" method="post" style="display: inline">
                        <button class="btn btn-sm"><i class="fas fa-pen"></i> Edit</button>
                    </a>
                <?php } ?>
            </h2>

            <h3>DESCRIPTION</h3>

            <span style="font-size: 15px; font-family: 'Open Sans';"> <?= $detailAssignment['desc']; ?></span>

            <hr>

            <div class="card-subtitle" style="margin-top: 20px"> <i class="fas fa-calendar-check"></i>
                <span style="margin-left: 10px;"><?= $detailAssignment['is_late_accepted'] == 1 ? 'Due' : 'No submissions are accepted after ' ?></span>
                <span style="margin-left: 5px; font-weight: bold;"> <?= date('l, j M  h:i A', strtotime($detailAssignment['due_date'])) ?></span>
            </div>

            <?php if ($user['role_id'] == 1) { ?>

                <div class="row">
                    <div class="col" style="padding: 0;">
                        <h3>SUBMITTED FILE(S) : <span> <?= sizeof($userFiles)  ?> </span></h3>
                    </div>
                    <div class="col" style="text-align: right;">
                        <h3><a href="<?= base_url('Assignment/downloadAll/' . $detailAssignment['id']) ?>" style="margin-left: 25px;">Download All</a></h3>
                    </div>
                </div>

                <?php
                    foreach ($userFiles as $m) {
                        ?>
                    <div class="card" role="button">
                        <div class="row">
                            <div class="col" style="padding: 0;cursor: pointer;" onclick="location.href='<?= base_url(); ?>assets/files/assignments/<?= $m->file_name  . $m->extension ?>';">
                                <div class="card-title"><?= strtoupper($m->student_id) ?></div>
                                <div class="card-subtitle"><?= strtoupper($m->file_name . $m->extension) ?></div>
                                <div class="card-subtitle"><?= strtoupper(date('D, j M Y h:m A', $m->date_uploaded)); ?></div>
                            </div>
                            <div class="col-1" style="padding: 0; text-align: right;">
                                <i class="fa fa-times icon-clickable" aria-hidden="true" onclick="location.href='<?= base_url(); ?>Assignment/unsubmit/<?= $m->id ?>';"></i>
                            </div>
                        </div>
                    </div>

                <?php }
                } else { ?>

                <h3>YOUR FILE(S)</h3>

                <?php
                    foreach ($myFile as $m) {
                        ?>
                    <div class="card" role="button">
                        <div class="row">
                            <div class="col" style="padding: 0;cursor: pointer;" onclick="location.href='<?= base_url(); ?>assets/files/assignments/<?= $m->file_name  . $m->extension ?>';">
                                <div class="card-title"><?= strtoupper($m->file_name . $m->extension) ?></div>
                                <div class="card-subtitle"><?= strtoupper(date('D, j M Y h:m A', $m->date_uploaded)); ?></div>
                            </div>
                            <div class="col-1" style="padding: 0; text-align: right;">
                                <i class="fa fa-times icon-clickable" aria-hidden="true" onclick="location.href='<?= base_url(); ?>Assignment/unsubmit/<?= $m->id ?>';"></i>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>

        <div class="col-4" style="margin-right: 20px">
            <?php if ($user['role_id'] != 1) {
                if ($is_late) { ?>
                    <div class="card card-course sidebar" style="padding: 10px !important">
                        <div class="card-body">
                            <div class="card-title text-red">Upload Your Work</div>

                            <div class="list" style="font-size: 15px" href="#">
                                <div class="list-subtitle text-red">Sorry, submission has been closed. Please contact your teacher.
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="card card-course sidebar" style="padding: 10px !important">
                        <div class="card-body">
                            <div class="card-title">Upload Your Work</div>
                            <br>
                            <?php echo form_open_multipart('Assignment/submit/' . $detailAssignment['course_id'] . '/' . $detailAssignment['id']) ?>
                            <input type="file" name="userfile" size="20" required />
                            <input class="" type="submit" value="Submit" style="font-size: 14px;" />
                            </form>

                            <div class="list" style="font-size: 15px">
                                <?php
                                        if (strtotime($detailAssignment['due_date']) < time()) { ?>
                                    <div class="list-subtitle text-red">The deadline has passed but submission is still open.
                                    </div>
                                <?php } ?>

                                <div class="list-subtitle">Make sure to press the Submit button. Otherwise your work will not be saved.
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } ?>
        </div>
    </div>

</div>

</div>

<script>
    collapsible();
</script>

</body>

</html>