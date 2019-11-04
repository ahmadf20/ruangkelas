    <div style="padding: 75px 50px; width:81%; margin-left: 250px; margin-top: 80px;">

        <!-- <div style="padding: 75px 50px"> -->
        <div class="row">
            <h3 class="bold" style="margin-bottom: 70px;">Add Course</h3>
        </div>
        <?php echo $this->session->flashdata('message'); ?>
        <div class="col">
            <div class="" style="max-width: 450px;">
                <form action="<?php echo base_url('AddCourse') ?>" method="post" enctype="multipart/form-data">

                    <p style="margin-top: 10px;">Basic Info</p>
                    <hr>
                    <label for="title" class="text-primary">Course Title</label>
                    <input type="text" name="title" id="title" value="<?php echo set_value('title') ?>">
                    <small style="color: red"><?php echo form_error('title'); ?></small>

                    <label for="desc" class="text-primary">Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="5" style="resize: none;"><?php echo set_value('desc') ?></textarea>
                    <small style="color: red"><?php echo form_error('desc'); ?></small>

                    <p style="margin-top: 10px;">Image & Icon</p>
                    <hr>

                    <label for="icon" class="text-primary">Icon</label>
                    <input type="text" name="icon" id="icon" class="" value="<?php echo set_value('icon') ?>">
                    <small style="color: red"><?php echo form_error('icon'); ?></small>

                    <label for="image" class="text-primary">Image</label>
                    <input type="text" name="image" id="image" value="<?php echo set_value('image') ?>">
                    <small style="color: red"><?php echo form_error('image'); ?></small>


                    <div class="row" style="padding-top: 2rem;">
                        <input class="btn btn-primary" style="float: right;" value="Save" type="submit" />
                    </div>
                </form>
            </div>
        </div>


    </div>
    </div>

    </body>

    </html>