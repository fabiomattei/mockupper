<html>
	<head>
	<title><?PHP echo isset($this->title) ? $this->title : '' ?></title>
	<link rel="stylesheet" type="text/css" href="<?PHP echo BASEPATH ?>assets/css/style.css">
	<?PHP echo isset($this->addToHead) ? $this->addToHead : '' ?>
	</head>
	<body>
	  <div id="centered">
	  <header id="intestazione"> 
			<?PHP 
			if (isset($this->topcontainer)) {
				if (is_array($this->topcontainer)) {
					foreach ($this->topcontainer as $bl) {
						echo $bl->show();
					}
				} else {
					echo $this->topcontainer->show();
				}
			} ?>
	  </header>
	  <div id="container">
  		<div id="leftcolumn">
			<?PHP 
			if (isset($this->leftcontainer)) {
				if (is_array($this->leftcontainer)) {
					foreach ($this->leftcontainer as $bl) {
						echo $bl->show();
					}
				} else {
					echo $this->leftcontainer->show();
				}
			} ?>
  		</div>
  		<div id="centralcolumn">
			<?PHP 
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
  		<div id="rightcolumn">
			<?PHP 
			if (isset($this->rightcontainer)) {
				if (is_array($this->rightcontainer)) {
					foreach ($this->rightcontainer as $bl) {
						echo $bl->show();
					}
				} else {
					echo $this->rightcontainer->show();
				}
			} ?>
  		</div>
	  </div>
	  <footer>
			<?PHP 
			if (isset($this->bottomcontainer)) {
				if (is_array($this->bottomcontainer)) {
					foreach ($this->bottomcontainer as $bl) {
						echo $bl->show();
					}
				} else {
					echo $this->bottomcontainer->show();
				}
			} ?>
	  </footer>
  	  </div>
	  <?PHP echo isset($this->addToFoot) ? $this->addToFoot : '' ?>
	</body>
</html>