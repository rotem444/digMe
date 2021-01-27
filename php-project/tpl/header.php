<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>digg | <?= $page_title;?></title>
</head>

<body>
    <header>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
  <a class="navbar-brand text-white" href="./">dig </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="about.php">about </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="blog.php">blog</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php if(! isset($_SESSION['user_id'])): ?>
      <li class="nav-item active">
        <a class="nav-link text-white" href="signin.php">Sing-In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="signup.php">Sing-Up</a>
      </li>
    <?php else: ?>
      <li class="nav-item active">
        <a class="nav-link text-white" href="user_profile.php"><?= $_SESSION['user_name'] ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">logout</a>
      </li>
    <?php endif;?>
    </ul>

  </div>
</nav>
</div>
    </header>