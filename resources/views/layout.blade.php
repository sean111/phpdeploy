<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Deployment System</title>
        <link rel="stylesheet" href="/css/app.css" media="screen" charset="utf-8">
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <span class="navbar-brand">PHP Deployer</span>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
              <ul class="nav navbar-nav">
                <li><a href="{!! route( 'project.index' ) !!}">Projects</a></li>
                <li><a href="{!! route( 'server.index' ) !!}">Servers</a></li>
                <li><a href="#">Environments</a></li>

              </ul>
              <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        @yield('content')
        <script type="text/javascript" src="/js/all.js"/>
    </body>
</html>
