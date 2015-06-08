<?php

class Template {
	public static function getHeader($page = 'Home') {
		//Return the header in HTML
		$line = '<!DOCTYPE html>';
		$line .= '<html>';
		$line .= '<head>';
		$line .= '<title>' . $page . ' - Natuurkunde project</title>';
		$line .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">';
		$line .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">';
		$line .= '</head>';
		$line .= '<body style="padding-top: 60px;">';
		
		return $line;
	}
	
	public static function getNavBar($currentpage = 'home') {
		return '<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Natuurkunde project</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ' . (($currentpage == 'home') ? 'class="active"' : '') . '><a href="index.php">Home</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>';
	}
	
	public static function getFooter() {
		//Return the footer in HTML
		$line = '<div class="container"><hr /><small>Copyright &copy; 2015 by Rick Bakker</small></div>';
		$line .= '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>';
		$line .= '</body>';
		$line .= '</html>';
		return $line;
	}
}