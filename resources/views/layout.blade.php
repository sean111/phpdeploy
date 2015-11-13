<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Deployment System</title>
        <link rel="stylesheet" href="/css/app.css" media="screen" charset="utf-8">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/font-hack/2.018/css/hack-extended.min.css">
        @yield( 'stylesheets' )
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
                <li><a href="{!! route( 'project.index' ) !!}"><i class="fa fa-briefcase fa-1"></i> Projects</a></li>
                <li><a href="{!! route( 'server.index' ) !!}"><i class="fa fa-server fa-1"></i> Servers</a></li>
                <li><a href="{!! route( 'environment.index' ) !!}"><i class="fa fa-plug fa-1"></i> Environments</a></li>

              </ul>
              <form class="navbar-form navbar-right" role="search" method="post" action='{!! route( 'search' ) !!}'>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search" name="term">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                @yield('content')
              </div>
            </div>
        </div>

        <script type="text/javascript" src="/js/all.js"></script>
        @yield( 'javascript' )
    </body>
</html>
