<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Live Data Search in Codeigniter</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <br />
            <br />
            <h2 align="center">Live Data Search</h2><br />
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Search</span>
                    <input type="text" name="search_engine" id="search_engine" placeholder="" class="form-control" />
                </div>
            </div>
            <br />
            <div id="result"></div>
        </div>
        <div style="clear:both"></div>
        <br />
        <br />
        <br />
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(a) {
            load_data();

            function load_data(query)
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>controllersearch/search",
                    method:"POST",
                    data:{query:query},
                    success:function(data){
                        $('#result').html(data);
                    }
                })
            }

            $('#search_engine').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script>
</html>