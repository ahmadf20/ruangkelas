<div style="padding: 75px 50px; width:81%; margin-left: 250px; margin-top: 60px;">

    <!-- <div style="padding: 75px 50px"> -->
    <a href="<?= base_url('Assignment/detail/' . $courseData->course_id . '/' . $assignmentDetail->id) ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> <span style="margin-left: 5px; margin-bottom: 10px;">Back</span></a>


    <div class="row">
        <h3 class="bold" style="margin-bottom: 70px;margin-top: 50px;">Edit Assignment</h3>
    </div>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="col">
        <div class="" style="max-width: 450px;">
            <form action="<?php echo base_url('Assignment/edit/' . $courseData->course_id . '/' . $assignmentDetail->id) ?>" method="post">

                <p style="margin-top: 10px;">Basic Info</p>
                <hr>
                <label for="title" class="text-primary">Assignment Title</label>
                <input type="text" name="title" id="title" value="<?= $assignmentDetail->title ?>">
                <small style="color: red"><?php echo form_error('title'); ?></small>

                <label for="desc" class="text-primary">Description</label>
                <textarea name="desc" id="desc" cols="30" rows="5" style="resize: none;"><?= $assignmentDetail->desc ?></textarea>
                <small style="color: red"><?php echo form_error('desc'); ?></small>

                <label for="due_date" class="text-primary">Due Date</label>
                <input type="datetime-local" name="due_date" id="due_date" value="<?= $assignmentDetail->due_date ?>" required>

                <div class="row" style="padding: 0;margin: 20px 0 50px;">
                    <div class="col-1" style="padding: 0;margin: 0;">
                        <input type="checkbox" name="is_late_accepted" id="is_late_accepted" style="padding: 0;margin: 0;" value="0" <?php if ($assignmentDetail->is_late_accepted == 0) echo 'checked' ?>>
                    </div>
                    <div>
                        <label for="is_late_accepted" style="padding: 0;margin: 0;">No submissions are accepted after the due date </label>
                    </div>
                </div>
                <div class=" row" style="padding-top: 2rem;">
                    <input class="btn btn-primary" style="float: right;" value="Save" type="submit" />
                </div>
            </form>
        </div>
    </div>
    <div class="col">

    </div>


</div>
</div>

</body>

</html>