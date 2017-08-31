<?php
/*
 *
 * Created by Alessandro
 * Download or clone me on GitHub (https://github.com/AleUtility/httpd-vhost-conf-list)
 * XAMPP and Windows only
 *
 */
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
<style>
    #site-list .card:nth-child(3n + 1) {
        clear: left;
    }
</style>

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
            <?php
                if(isset($_COOKIE['password']) && $_COOKIE['password']=="p4ssw0rd") {
            ?>
                <div id="filter-list" class="col-lg-12">

                </div>
                <hr /><br />
                <div id="site-list" class="col-lg-12">

                </div>
            <?php
                }
                else {
            ?>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="password" id="password" name="password" value="" class="form-control" placeholder="Input password">
                </div>
                <div class="form-group">
                    <input type="button" value="Go" class="btn btn-success col-md-offset-4 col-md-4">
                </div>
                <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                        crossorigin="anonymous"></script>
                <script>
                    $(document)
                        .on('click', 'input[type=button]', function(e) {
                            e.preventDefault();

                            document.cookie = "password=" + $('#password').val();
                            location.reload();
                        });
                </script>
            <?php
                }
            ?>
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

<?php
    if(isset($_COOKIE['password']) && $_COOKIE['password']=="p4ssw0rd") {
?>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $.get("get_info.php", function(data) {
            $.each(data, function(idx, site) {
                var serverDomains = site.ServerName.split('.').reverse();
                $card = $('' +
                    '<div class="card col-md-4" data-filters="' + getFilters(serverDomains, serverDomains.length-1) + '">' +
                    '   <div class="card-block">' +
                    '       <h4 class="card-title">' +
                    '           ' + (site.ServerAlias ? site.ServerAlias : site.ServerName) +
                    '       </h4>' +
                    '       <p class="card-text">' +
                    '' +
                    '       </p>' +
                    '       <pre>DocumentRoot:<br />' +
                    '           ' + site.DocumentRoot +
                    '       </pre>' +
                    '       <pre>VirtualHost:<br />' +
                    '           ' + site.VirtualHost.ip + ":" + site.VirtualHost.port +
                    '       </pre>' +
                    '       <pre>ServerName:<br />' +
                    '           ' + site.ServerName +
                    '       </pre>' +
                    '       <a href="http://' + site.ServerName + '" target="_blank" class="btn btn-primary pull-right">' +
                    '           Open <i class="fa fa-external-link" style="position: relative; top: -3px; font-size: 80%;" aria-hidden="true"></i>' +
                    '       </a>' +
                    '       <div class="clearfix"></div>' +
                    '   </div>' +
                    '</div>' +
                    '');
                serverDomains = site.ServerName.split('.');
                if($(':contains("' + site.DocumentRoot + '")').length == 0) {
                    $('#site-list')
                        .append($card);
                    serverDomains = serverDomains.reverse();
                    $.each(serverDomains, function(idx, part) {
                        if($('#filter-list .row[data-level=' + idx + '] button[value=' + part + ']').length == 0) {
                            if($('#filter-list .row[data-level=' + idx + ']').length == 0) {
                                $('#filter-list')
                                    .append($('' +
                                        '<div class="row hidden" data-level="' + idx + '">' +
                                        '   <div class="col-md-2" style="padding: 8px 0px;">Level ' + idx + '</div>' +
                                        '   <div class="col-md-10 domain-list">' +
                                        (idx == 0 ?
                                            '       <div class="col-md-2">' +
                                            '           <button class="btn btn-info col-md-12" data-current-level="' + idx + '" style="margin-bottom: 4px;">' +
                                            '               All' +
                                            '           </button>' +
                                            '       </div>' : "") +
                                        '   </div>' +
                                        '</div>')
                                    );
                            }
                            $('#filter-list .row[data-level=' + idx + '] div.domain-list')
                                .append('' +
                                    '<div class="col-md-2">' +
                                    '   <button class="btn btn-info col-md-12" data-current-level="' + idx + '" data-filters="' + getFilters(serverDomains, idx) + '" value="' + part + '" style="margin-bottom: 4px;">' +
                                    '       ' + part + '' +
                                    '   </button>' +
                                    '</div>');
                        }
                    });
                }
                $('#filter-list .row[data-level=0]').removeClass('hidden');
            });
        }, "json");
        function getFilters(domainPart, max) {
            return domainPart.slice(0, max+1).join(' ');
        }
        $(document)
            .on('click', '#filter-list button', function(e) {
                e.preventDefault();
                $('#filter-list .row, #filter-list button')
                    .addClass('hidden');
                $('#site-list .card')
                    .removeClass('hidden');
                var currentLevel = $(this).attr('data-current-level');
                if($(this).is('[data-filters]')) {
                    var filters = $(this).attr('data-filters');
                    var filters_list = filters.split(' ');
                    filters_list.push("");
                    var filterToShow = "";
                    $.each(filters_list, function(idx, filter) {
                        filterToShow += filter;
                        // Update button list
                        $('.row[data-level="' + (idx+1) + '"] button[data-filters^="' + filterToShow + '"]').removeClass('hidden');
                        $('.row[data-level="' + idx + '"]').removeClass('hidden');
                        filterToShow += ' ';
                    });
                    // Hide not selected cards
                    filterToShow = filterToShow.substring(0, filterToShow.length - 2);
                    console.log($('#site-list .card[data-filters^="' + filterToShow + '"]'));
                    $('#site-list .card:not([data-filters^="' + filterToShow + '"])').addClass('hidden');
                }
                $('#filter-list .row:first, #filter-list .row:first button').removeClass('hidden');
                $lastLine = $('.row[data-level="' + (currentLevel*1+1) + '"]');
                if($lastLine.find('button:not(.hidden)').length==0) {
                    $lastLine.addClass('hidden');
                }
            });
    });
</script>
<?php
    }
?>
</body>

</html>