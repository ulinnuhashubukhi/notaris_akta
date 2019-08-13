<?php
session_start();
include "configuration/connection.php";
include "configuration/function.php";

$user   = mysql_fetch_array(mysql_query("SELECT * FROM users where username = '$_SESSION[namauser]'"));

if($user > 0){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Sistem Informasi Pengelolaan Akta Jaminan Fidusia di Kantor Notaris Fenny Octavia, S.H, M.Kn</title>
		
		<?php
		
		?>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
		
		<link rel="shortcut icon" href="img/iconfav.png">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		
        <link href="css/bootstrap-datetimepicker.css" rel="stylesheet">

		<script type="text/javascript" src="js/jquery.js"></script>
		
		<script type="text/javascript">
		
			var htmlobjek;
			$(document).ready(function(){
			  //apabila terjadi event onchange terhadap object <select id=propinsi>
			  $("#kategori").change(function(){
				var kategori = $("#kategori").val();
				$.ajax({
					url: "ambilchild.php",
					data: "kategori="+kategori,
					cache: false,
					success: function(msg){
						//jika data sukses diambil dari server kita tampilkan
						//di <select id=kota>
						$("#child").html(msg);
					}
				});
			  });
			 
			});

		</script>
		
		<script type="text/javascript" src="tiny_mce/tiny_mce_src.js"></script>
        <script type="text/javascript">
         
        //http://cariprogram.blogspot.com
        //nuramijaya@gmail.com

        tinyMCE.init({
         
          mode : "textareas",
            
          // ===========================================
          // Set THEME to ADVANCED
          // ===========================================
            
          theme : "advanced",
            
          // ===========================================
          // INCLUDE the PLUGIN
          // ===========================================
         
          plugins : "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
            
          // ===========================================
          // Set LANGUAGE to EN (Otherwise, you have to use plugin's translation file)
          // ===========================================
         
          language : "en",
             
          theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
          theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
          theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
         
          // ===========================================
          // Put PLUGIN'S BUTTON on the toolbar
          // ===========================================
         
          theme_advanced_buttons4 : "jbimages,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
            
          theme_advanced_toolbar_location : "top",
          theme_advanced_toolbar_align : "left",
          theme_advanced_statusbar_location : "bottom",
          theme_advanced_resizing : true,
            
          // ===========================================
          // Set RELATIVE_URLS to FALSE (This is required for images to display properly)
          // ===========================================
         
          relative_urls : false
            
        });
         
        </script>
		
		<!-- -------------------- DATE TIME -->
		
		<SCRIPT language=Javascript>
		<!--
		function isNumberKey(evt)
		{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
		return true;
		}
		//-->
		</SCRIPT>
		
		
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="admin.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
               Notaris Fenny Octavia
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                      
                    
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
								<?php
								$qry_user = mysql_query("SELECT last_login, nama_lengkap FROM users where username = '$_SESSION[namauser]'");
								$list = mysql_fetch_array($qry_user);
								?>
                                <span><?php echo "$list[nama_lengkap]"; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/favicon.jpg" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php 
										echo "$list[nama_lengkap]";
										
										?>
                                        <small>Login Terakhir <?php echo $list['last_login']?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
		   <?php include "adm_menu.php"; ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            
			<?php konten(); ?>
			
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="js/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
		
		 <!-- date -->
		
		<script src="js/moment-with-locales.js"></script>
		<script src="js/bootstrap-datetimepicker.js"></script>
		 
		 
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
		
		<!-- BANNER -->
		
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
      
		<script>
		$('#buttonLogin').on('click', function(e){

			$("#text_dumet").toggle();
			$(this).toggleClass('class1')
		});
		</script>
		
		<SCRIPT language=Javascript>
	<!--
		function isNumberKey(evt)
		{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
		return true;
		}
		//-->
        		
		<!-- BANNER -->

    </body>
</html>

<?php
}else{
	
	echo "<script>alert('Anda Belum Login');window.location=('index.php')</script>";
	
}
?>
