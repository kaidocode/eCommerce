<nav class="navbar navbar-inverse">
  <div class="container">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo langs('HOME') ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="nav navbar-nav">
        <li><a href="#"><?php echo langs('CTEGORIES') ?></a></li>
        <li><a href="#"><?php echo langs('ITEMS') ?></a></li>
        <li><a href="#"><?php echo langs('MEMBERS') ?></a></li>
        <li><a href="#"><?php echo langs('STATISTICS') ?></a></li>
        <li><a href="#"><?php echo langs('LOGS') ?></a></li>
       
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nacer <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="members.php?do=Edit&userId=<?php echo $_SESSION['Id']?>">Edit Profil</a></li>
            <li><a href="#">Setting</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>