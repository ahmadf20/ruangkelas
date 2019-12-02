    <div style="padding: 75px 50px; width:81%; margin-left: 250px; margin-top: 80px;">

        <!-- <div style="padding: 75px 50px"> -->
        <div class="row">
            <h3 class="bold" style="margin-bottom: 70px;">All Courses</h3>
        </div>
        
        <div class="row" id="result">
        </div>
        <div style="clear:both"></div>

        <br><br><br>

        <!-- <div class="row">
            <?php foreach ($allCourse as $s) { ?>
                <div class="col-4">
                    <div class="card card-course" style="min-height: 150px; width: 270px" onclick="location.href='AllCourses/course_detail/<?= $s->course_id ?>';">
                        <img class="card-img" src="<?= base_url() ?>/assets/course/<?= $s->image ?>" alt="">
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
        </div> -->



    </div>
    </div>

    <script>
$(document).ready(function(){

	load_data();

	function load_data(query)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>ajaxsearch/fetch",
			method:"POST",
			data:{query:query},
			success:function(data){
				$('#result').html(data);
			}
		})
	}

	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
	});
});
</script>

    </body>

    </html>