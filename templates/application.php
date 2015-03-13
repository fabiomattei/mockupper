<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($this->title) ? $this->title : '' ?></title>

    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- bootstrap framework-->
    <link rel="stylesheet" href="<?php echo BASEPATH ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- todc-bootstrap -->
    <link rel="stylesheet" href="<?php echo BASEPATH ?>assets/css/todc-bootstrap.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="<?php echo BASEPATH ?>assets/css/font-awesome/css/font-awesome.min.css">
    <!-- retina ready -->
    <link rel="stylesheet" href="<?php echo BASEPATH ?>assets/css/retina.css">

    <!-- ebro styles -->
    <link rel="stylesheet" href="<?php echo BASEPATH ?>assets/css/style.css">
    <!-- ebro theme -->
    <link rel="stylesheet" href="<?php echo BASEPATH ?>assets/css/theme/color_1.css" id="theme">

    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/ie.css">
    <script src="<?php echo BASEPATH ?>assets/js/ie/html5shiv.js"></script>
    <script src="<?php echo BASEPATH ?>assets/js/ie/respond.min.js"></script>
    <script src="<?php echo BASEPATH ?>assets/js/ie/excanvas.min.js"></script>
    <![endif]-->

    <!-- custom fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>
	<?php echo isset($this->addToHead) ? $this->addToHead : '' ?>
	
</head>
<body class="boxed pattern_1 sidebar_narrow">

<div id="wrapper_all">
    <header id="top_header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <img src="<?php echo BASEPATH ?>assets/img/logo_main.png" alt="" />
                </div>
            </div>
        </div>
    </header>

    <section class="container clearfix main_section">

        <div id="main_content_outer" class="clearfix">
		<div id="main_content">
            <!-- main content -->
            <div class="row">
				
				<?php 
				if (isset($this->messagescontainer)) {
					if (is_array($this->messagescontainer)) {
						foreach ($this->messagescontainer as $bl) {
							echo $bl->show();
						}
					} else {
						echo $this->messagescontainer->show();
					}
				} ?>
				
				<?php 
				if (isset($this->centralcontainer)) {
					if (is_array($this->centralcontainer)) {
						foreach ($this->centralcontainer as $bl) {
							echo $bl->show();
						}
					} else {
						echo $this->centralcontainer->show();
					}
				} ?>
				
            </div>
			
            <!-- main content -->
            <div class="row">
				
				<?php 
				if (isset($this->secondcentralcontainer)) {
					if (is_array($this->secondcentralcontainer)) {
						foreach ($this->secondcentralcontainer as $bl) {
							echo $bl->show();
						}
					} else {
						echo $this->secondcentralcontainer->show();
					}
				} ?>
				
            </div>
			
            <!-- main content -->
            <div class="row">
				
				<?php 
				if (isset($this->thirdcentralcontainer)) {
					if (is_array($this->thirdcentralcontainer)) {
						foreach ($this->thirdcentralcontainer as $bl) {
							echo $bl->show();
						}
					} else {
						echo $this->thirdcentralcontainer->show();
					}
				} ?>
				
            </div>
        </div>
		</div>
		 
		<?php 
		if (isset($this->menucontainer)) {
			if (is_array($this->menucontainer)) {
				foreach ($this->menucontainer as $bl) {
					echo $bl->show();
				}
			} else {
				echo $this->menucontainer->show();
			}
		} ?>
		
    </section>
    <div id="footer_space"></div>
</div>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                &copy; 2014-2015 TCD - CIHS
            </div>
            <div class="col-sm-8">
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li>&middot;</li>
                    <li><a href="#">Terms of Service</a></li>
                    <li>&middot;</li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li>&middot;</li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
            <div class="col-sm-1 text-right">
                <small class="text-muted">v1.0</small>
            </div>
        </div>
    </div>
</footer>

<?php echo isset($this->addToFoot) ? $this->addToFoot : '' ?>
</body>
</html>