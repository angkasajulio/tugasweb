<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Page</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('cssadmin/bootstrap.min.css') ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('cssadmin/metisMenu.min.css') ?>" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url('css/timeline.css') ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('cssadmin/startmin.css') ?>" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('css/morris.css') ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!-- DataTables CSS -->
        <link href="<?php echo base_url('css/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url('css/dataTables/dataTables.responsive.css') ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        
        <title>CKEditor Sample</title>
        <script src="../ckeditor/ckeditor.js"></script>
        <script src="../ckeditor/samples/js/sample.js"></script>
        <link rel="stylesheet" href="../ckeditor/samples/css/samples.css">
        <link rel="stylesheet" href="../ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
                $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
            } );
        </script>

    </head>
    <body>
        <div id="wrapper">
        	<div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin Web</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div> 
                <div>
                    <a href="admin_tambah">
                      <input type="button" class="btn btn-primary" value="Tambah Admin">
                    </a>
                    <a href="?module=user_cari">
                      <input type="button" class="btn btn-primary" value="Search">
                    </a>
                </div>
                <p>                                  
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d) {
                            echo "<tr>";
                                echo "<td>".$d['username']."</td>";
                                echo "<td>".$d['password']."</td>";
                                echo "<td>".$d['level']."</td>";
                                echo "<td> 
                                      <a href='admin_edit/".$d['id']."'><input type='button' class='btn btn-success' value='Edit'></a>";?>
                                      

                                      <a href='admin_delete/<?php echo $d['id']; ?>' onclick="return confirm('Are you sure?')">
                                        <input type='button' class='btn btn-danger' value='Delete'>
                                      </a>
                                <?php echo "</td>";
                            echo "</tr>";
                        }
                        ?> 
                </tbody>
                </table>
        	</div>
         </div>
        <!-- /#wrapper -->

        <!-- jQuery -->

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

        <script>
            initSample();
        </script>
    </body>
</html>
