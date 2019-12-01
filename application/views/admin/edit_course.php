<div style="padding: 75px 50px; width:81%; margin-left: 250px; margin-top: 60px;">

    <!-- <div style="padding: 75px 50px"> -->
    <a href="<?= base_url('AllCourses/course_detail/' . $courseData->course_id) ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> <span style="margin-left: 5px; margin-bottom: 10px;">Back</span></a>


    <div class="row">
        <h3 class="bold" style="margin-bottom: 70px;margin-top: 50px;">Edit Course</h3>
    </div>
    <?php echo $this->session->flashdata('message'); ?>
    <div class="col">
        <div class="" style="max-width: 450px;">
            <?php echo form_open_multipart(base_url('Course/edit/' . $courseData->course_id)); ?>

            <p style="margin-top: 10px;">Basic Info</p>
            <hr>
            <label for="title" class="text-primary">Course Title</label>
            <input type="text" name="title" id="title" value="<?= $courseData->course_name ?>">
            <small style="color: red"><?php echo form_error('title'); ?></small>

            <label for="desc" class="text-primary">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="5" style="resize: none;"><?= $courseData->course_desc ?></textarea>
            <small style="color: red"><?php echo form_error('desc'); ?></small>

            <p style="margin-top: 10px;">Image & Icon</p>
            <hr>

            <label for="image" class="text-primary">Image</label>
            <input type="file" name="image" size="20" />

            <label for="icon" class="text-primary">Icon</label>
            <div class="row">
                <div class="col" style="padding: 0;">
                    <input type="text" name="icon" id="icon" class="" value='<?= $courseData->icon ?>' onchange="iconPreview()">

                </div>
                <div class="col-1" id="icon-preview" style="text-align: center; padding: 12.5px 20px;">
                    <?= $courseData->icon ?>

                </div>
            </div>
            <small>Find it at <a href="https://fontawesome.com">fontawesome</a> or leave it blank for the default. Example: <xmp><i class="fa fa-star" aria-hidden="true"></i></xmp></small><br>
            <small style="color: red"><?php echo form_error('icon'); ?></small>

            <div class="row" style="padding-top: 2rem;">
                <input class="btn btn-primary" style="float: right;" value="Save" type="submit" />
            </div>
            </form>
        </div>
    </div>
    <div class="col">

    </div>


</div>
</div>
<script type="text/javascript">
    function iconPreview() {
        $code = document.getElementById("icon").value;
        document.getElementById("icon-preview").innerHTML = $code;
    }
</script>

</body>

</html>