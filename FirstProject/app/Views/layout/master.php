
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://bootswatch.com/5/flatly/bootstrap.css" rel="stylesheet" crossorigin="anonymous">

  </head>
  <body>
    <div class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a href="/" class="navbar-brand">My Website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            
          <ul class="navbar-nav"> <!--
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="themes">Themes <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
                <a class="dropdown-item" href="../default/">Default</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="">Cerulean</a>
                <a class="dropdown-item" href="">Cosmo</a>
              </div> -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/adduser/">Add User</a>
            </li>
            <!--
            <li class="nav-item">
              <a class="nav-link" href="https://blog.bootswatch.com/">Blog</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" id="download">Flatly <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="download">
                <a class="dropdown-item" rel="noopener" target="_blank" href="https://jsfiddle.net/bootswatch/uzajL5kb/">Open in JSFiddle</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../5/flatly/bootstrap.min.css" download>bootstrap.min.css</a>
                <a class="dropdown-item" href="../5/flatly/bootstrap.css" download>bootstrap.css</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../5/flatly/_variables.scss" download>_variables.scss</a>
                <a class="dropdown-item" href="../5/flatly/_bootswatch.scss" download>_bootswatch.scss</a>
              </div>
            </li> -->
          </ul>
            
        </div>
      </div>
    </div>

    <div class="container">
        <!--Area for dynamic content -->
        <?= $this->renderSection("content"); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- <script src="/js/script.js"></script> -->
    </div>

    </body>
</html>