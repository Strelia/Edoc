<?php
session_start();
if (!isset($_SESSION["user"]) && empty($_SESSION["user"])) {
    header('Location:/login/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EDoc</title>
    <link rel="stylesheet" type="text/css" href="/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>

<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/main/">Edoc</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                if ($_SESSION["user"]["is_admin"] == true) {
                    ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Адміністрування <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Реєстр адміністрації</li>
                            <li><a href="/main/">Список реєстру адміністрації</a></li>
                            <li><a href="/main/add">Додати до реєстру адміністрації</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">РДА/МВК</li>
                            <li><a href="/rda/">Список РДА/МВК</a></li>
                            <li><a href="/rda/add">Додати РДА/МВК</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">СНАП</li>
                            <li><a href="/snap/">Список СНАП</a></li>
                            <li><a href="/snap/add">Додати СНАП</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/logout/">Вихід</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="wrapp">
    <?php include 'application/views/' . $content_view; ?>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/jquery.min.js"><\/script>')</script>
<script src="/js/bootstrap.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

