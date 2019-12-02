    <div style="padding: 75px 50px; width:81%; margin-left: 250px; margin-top: 80px;">

        <div class="row">
            <h3 class="bold" style="margin-bottom: 70px;">All Courses</h3>
        </div>

        <div class="row" id="result">
        </div>
        <div style="clear:both"></div>

        <br><br><br>

    </div>
    </div>

    <script>
        $(document).ready(function() {

            load_data();

            function load_data(query) {
                $.ajax({
                    url: "<?php echo base_url(); ?>ajaxsearch/fetch",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                })
            }

            $('#search_text').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script>

    </body>

    </html>