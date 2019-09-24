<?php 
require_once"header.php"; 
$latestpost = $post->getLatestPost();
 ?>

  <!-- Main Content -->
  <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="font-size: 30px; color: red; font-family: bold;">
        Category
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <?php foreach ($catlist as $cat) { ?>
              <a class="nav-link" href="post.php?category=<?php echo $cat->id ?>"><?php echo $cat-> name ?></a>

          <?php  } ?>

          </li>
        
        </ul>
      </div>



    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <h2 style="color:black;font-style:italic">Latest blogs</h2>

          <?php foreach ($latestpost as $lp) { ?>
            
            <a href="details.php?id=<?php echo $lp->id ?>">
            <h1 class="post-title"> <?php echo $lp->title ?>  </h1>
            <p>
              <?php echo substr($lp->bodytext,0,300) ?>...
            </p>
          </a>
          <p class="post-meta">Posted by
            <a >..........<?php echo $lp->created_by ?></p>
          
          <?php } ?>
            
          
        </div>
        <hr>
        
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="post.php">All Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php 
require_once"footer.php"; 
 ?>
 