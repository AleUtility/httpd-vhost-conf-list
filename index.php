<?php
	/*
	 *
	 * Created by Alessandro
	 * Download or clone me on GitHub (https://github.com/AleUtility/httpd-vhost-conf-list)
	 * XAMPP and Windows only
	 *
	 */

	define("HTTPD_VHOST_CONF_PATH", "C:/xampp/apache/conf/extra/httpd-vhosts.conf");
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>httpd_vhost_conf projects list</title>

    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- FontAwesome Core CSS -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default" 	 role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><i class="fa fa-hashtag" aria-hidden="true"></i> httpd vhost conf projects list</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="https://github.com/AleUtility/httpd-vhost-conf-list"><i class="fa fa-download" aria-hidden="true"></i> Download or clone me</a>
                    </li>
                    <li>
                        <a href="https://github.com/AleUtility/"><i class="fa fa-server" aria-hidden="true"></i> All projects</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="progettialessandro(at)gmail.com" onCLick="return false;"><i class="fa fa-comment" aria-hidden="true"></i> Contact me</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Contact Section -->
    <section id="list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<?php
						$count = 0;
						$content = [];
					
						$httpd_vhosts_conf = explode("\n", file_get_contents(HTTPD_VHOST_CONF_PATH));
						foreach($httpd_vhosts_conf as $key => $value) {
							$value = trim($value);
							if(!startsWith($value, "#") && $value!="") {
								if(startsWith($value, "</")) {
									$count++;
								}
								else if(startsWith($value, "<")) { // Save port, but it is unless
									$line = explode(' ', str_replace(['<', '>'], '', $value));
									$line_content = explode(":", $line[1]);
									$content[$count][$line[0]] = array(
										'ip' => $line_content[0],
										'port' => $line_content[1]
									);
								}
								else {
									$line = explode(' ', $value);
									$content[$count][$line[0]] = $line[1];
								}

								// Print it!
								// $value = str_replace("<", "&lt;", $value);
								// $value = str_replace(">", "&gt;", $value);
								// echo "Key: " . $key . "; Value: " . $value . "<br />";
							}
						}
						// echo '<pre>';
						// print_r($content);
						// echo '</pre>';
						
						echo '<div class="card-group">';
						foreach($content as $idx => $values)
						{
							?>
								<div class="card col-md-4">
									<div class="card-block">
										<h4 class="card-title">
											<?php
												if(isset($values['ServerAlias']))
													echo $values['ServerAlias'];
												else if(isset($values['ServerAdmin']))
													echo $values['ServerAdmin'];
											?>
										</h4>
										<p class="card-text">
											
										</p>
										<pre>DocumentRoot:<br />  <?= isset($values['DocumentRoot']) ? $values['DocumentRoot'] : ''; ?></pre>
										<pre>VirtualHost:<br />  <?= isset($values['VirtualHost']) ? join(':', $values['VirtualHost']) : ''; ?></pre>
										<a href="http://<?= isset($values['ServerAdmin']) ? $values['ServerAdmin'] : ''; ?>" target="_blank" class="btn btn-primary pull-right">
											Open <i class="fa fa-external-link" style="position: relative; top: -3px; font-size: 80%;" aria-hidden="true"></i>
										</a>
										<div class="clearfix"></div>
									</div>
								</div>
							<?php
							if($idx%3==2)
								echo '</div><div class="card-group">';
						}
						echo '</div>';
					?>
                </div>
            </div>
        </div>
    </section>
	
	<footer>
		<hr />
		<div class="container align-center" style="padding: 5px 25px 25px;">
			<div class="copyright pull-right">
				© 2017, made with <i class="fa fa-heart"></i> by Alessando.
			</div>
		</div>
	</footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
</body>

</html>
<?php
	function startsWith($haystack, $needle)
	{
		 $length = strlen($needle);
		 return (substr($haystack, 0, $length) === $needle);
	}
?>
