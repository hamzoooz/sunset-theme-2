<?php 

?>

<!-- /container -->

<div class="container">
<div class="header-container background-image text-center " style="background-image:url(<?php header_image(); ?> );height:200px; width:100%; background-repeat:no-repeat; background-size: cover;"></div>
  <nav class="navbar-header nav-tabs justify-content-start navbar navbar-expand-lg " style="background-color: #156580;" data-bs-theme="dark">
      <a class="navbar-brand" href="<?php bloginfo("url") ?>"><?php bloginfo("name") ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <?php hamzoooz_bootstrap_menu() ?>
      </div>
  </nav>
</div><!-- /container -->



