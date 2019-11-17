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

            <?php
            foreach ($myFile as $m) {
                ?>
                <a class="card collapsible" href="<?= base_url() . 'assets/files/assignments/' . $m->file_name  . $m->extension ?>" role="button">
                    <div class="row">
                        <div class="col" style="padding: 0;">
                            <div class="card-title"><?= strtoupper($m->file_name . $m->extension) ?></div>
                            <div class="card-subtitle"><?= strtoupper(date('D, j M Y h:m A', $m->date_uploaded  + 6 * 3600)); ?></div>
                        </div>
                        <div class="col-1" style="padding: 0; text-align: right;">
                            <i class="fa fa-times icon-clickable" aria-hidden="true" onclick=""></i>
                        </div>
                    </div>
                </a>
            <?php } ?>



        </div>


        <div class="col-4" style="margin-right: 20px">
            <div class="card card-course sidebar" style="padding: 10px !important">
                <div class="card-body">
                    <div class="card-title">Upload Your Work</div>
                    <br>
                    <?php echo form_open_multipart('Assignment/submit/' . $detailAssignment['course_id'] . '/' . $detailAssignment['id']); ?>
                    <input type="file" name="userfile" size="20" required />
                    <input class="" type="submit" value="Submit" style="font-size: 14px;" />
                    </form>

                    <div class="list" style="font-size: 15px" href="#">
                        <div class="list-subtitle">Make sure to press the Submit button. Otherwise your work will not be saved.
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