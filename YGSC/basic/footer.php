<aside class="sidebar">
  <div class="category">
    <h2>Update's Category</h2>
    <ul class="category-list">
      <?php
      global $con;
      $sql = "SELECT * FROM category ORDER BY id desc";
      $stmt = $con->query($sql);
      while ($DataRows = $stmt->fetch()) {
        // FETCHING ALL THE DATA FROM DB
        $PostId = $DataRows["id"];
        $PostTitle = $DataRows["title"];
      ?>
        <li class="list-items" data-aos="fade-left" data-aos-delay="100">
          <a href="index.php?category=<?php echo $PostTitle; ?>"><?php echo htmlentities($PostTitle); ?></a>
        </li>
      <?php } ?>
    </ul>
  </div>
  <div class="category">
    <h2>Request's Category</h2>
    <ul class="category-list">
      <?php
      global $con;
      $sql = "SELECT * FROM request_category ORDER BY id desc";
      $stmt = $con->query($sql);
      while ($DataRows = $stmt->fetch()) {
        // FETCHING ALL THE DATA FROM DB
        $PostId = $DataRows["id"];
        $PostTitle = $DataRows["title"];
      ?>
        <li class="list-items" data-aos="fade-left" data-aos-delay="100">
          <a href="Requests.php?category=<?php echo $PostTitle; ?>"><?php echo htmlentities($PostTitle); ?></a>
        </li>
      <?php } ?>
    </ul>
  </div>
  <div class="category">
    <h2>Project's Category</h2>
    <ul class="category-list">
      <?php
      global $con;
      $sql = "SELECT * FROM project_category ORDER BY id desc";
      $stmt = $con->query($sql);
      while ($DataRows = $stmt->fetch()) {
        // FETCHING ALL THE DATA FROM DB
        $PostId = $DataRows["id"];
        $PostTitle = $DataRows["title"];
      ?>
        <li class="list-items" data-aos="fade-left" data-aos-delay="100">
          <a href="Projects.php?category=<?php echo $PostTitle; ?>"><?php echo htmlentities($PostTitle); ?></a>
        </li>
      <?php } ?>
    </ul>
  </div>
  <div class="category">
    <h2>Event's Category</h2>
    <ul class="category-list">
      <?php
      global $con;
      $sql = "SELECT * FROM event_category ORDER BY id desc";
      $stmt = $con->query($sql);
      while ($DataRows = $stmt->fetch()) {
        // FETCHING ALL THE DATA FROM DB
        $PostId = $DataRows["id"];
        $PostTitle = $DataRows["title"];
      ?>
        <li class="list-items" data-aos="fade-left" data-aos-delay="100">
          <a href="Events.php?category=<?php echo $PostTitle; ?>"><?php echo htmlentities($PostTitle); ?></a>
        </li>
       
      <?php } ?>
    </ul>
  </div>
  <!-- Ads bar for business needs for the website -->
  <div class="popular-post">
    <h2>Ads Post</h2>
    <div class="post-content" data-aos="flip-up" data-aos-delay="200">
      <div class="post-image">
        <div>
          <img src="./assets/popular-post/m-blog-1.jpg" class="img" alt="blog1">
        </div>
        <div class="post-info flex-row">
          <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
            2019</span>
          <span>2 Commets</span>
        </div>
      </div>
      <div class="post-title">
        <a href="#">New data recording system to better analyse road accidents</a>
      </div>
    </div>
    <div class="post-content" data-aos="flip-up" data-aos-delay="300">
      <div class="post-image">
        <div>
          <img src="./assets/popular-post/m-blog-2.jpg" class="img" alt="blog1">
        </div>
        <div class="post-info flex-row">
          <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
            2019</span>
          <span>2 Commets</span>
        </div>
      </div>
      <div class="post-title">
        <a href="#">New data recording system to better analyse road accidents</a>
      </div>
    </div>
    <div class="post-content" data-aos="flip-up" data-aos-delay="400">
      <div class="post-image">
        <div>
          <img src="./assets/popular-post/m-blog-3.jpg" class="img" alt="blog1">
        </div>
        <div class="post-info flex-row">
          <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
            2019</span>
          <span>2 Commets</span>
        </div>
      </div>
      <div class="post-title">
        <a href="#">New data recording system to better analyse road accidents</a>
      </div>
    </div>
    <div class="post-content" data-aos="flip-up" data-aos-delay="500">
      <div class="post-image">
        <div>
          <img src="./assets/popular-post/m-blog-4.jpg" class="img" alt="blog1">
        </div>
        <div class="post-info flex-row">
          <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
            2019</span>
          <span>2 Commets</span>
        </div>
      </div>
      <div class="post-title">
        <a href="#">New data recording system to better analyse road accidents</a>
      </div>
    </div>
    <div class="post-content" data-aos="flip-up" data-aos-delay="600">
      <div class="post-image">
        <div>
          <img src="./assets/popular-post/m-blog-5.jpg" class="img" alt="blog1">
        </div>
        <div class="post-info flex-row">
          <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
            2019</span>
          <span>2 Commets</span>
        </div>
      </div>
      <div class="post-title">
        <a href="#">New data recording system to better analyse road accidents</a>
      </div>
    </div>
  </div>
  <div class="newsletter" data-aos="fade-up" data-aos-delay="300">
    <h2>Newsletter</h2>
    <div class="form-element">
      <input type="text" class="input-element" placeholder="Email">
      <button class="btn form-btn">Subscribe</button>
    </div>
  </div>
  <div class="popular-tags">
    <h2>Popular Tags</h2>
    <div class="tags flex-row">
      <span class="tag" data-aos="flip-up" data-aos-delay="100"><a href="Events.php">Events</a></span>
      <span class="tag" data-aos="flip-up" data-aos-delay="200"><a href="index.php">Updates</a></span>
      <span class="tag" data-aos="flip-up" data-aos-delay="300"><a href="Requests.php">Requests</a></span>
      <span class="tag" data-aos="flip-up" data-aos-delay="400"><a href="Themes.php">Themes</a></span>
      <span class="tag" data-aos="flip-up" data-aos-delay="500"><a href="Projects.php">Projects</a></span>
    </div>
  </div>
</aside>
</div>
</section>

<!-- -----------x---------- Site Content -------------x------------>

</main>
<footer class="footer">
  <div class="container">
    <div class="about-us" data-aos="fade-right" data-aos-delay="200">
      <h2>About us</h2>
      <p>Yangon Smart City is your innovation platform that brings together proactive citizens, innovative companies, knowledge institutions and public authorities to shape the city of the future.</p>
    </div>
    <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
      <h2>Newsletter</h2>
      <p>Stay update with our latest</p>
      <div class="form-element">
        <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
      </div>
    </div>
    <div class="instagram" data-aos="fade-left" data-aos-delay="200">
      <h2>Instagram</h2>
      <div class="flex-row">
        <img src="./assets/instagram/thumb-card3.png" alt="insta1">
        <img src="./assets/instagram/thumb-card4.png" alt="insta2">
        <img src="./assets/instagram/thumb-card5.png" alt="insta3">
      </div>
      <div class="flex-row">
        <img src="./assets/instagram/thumb-card6.png" alt="insta4">
        <img src="./assets/instagram/thumb-card7.png" alt="insta5">
        <img src="./assets/instagram/thumb-card8.png" alt="insta6">
      </div>
    </div>
    <div class="follow" data-aos="fade-left" data-aos-delay="200">
      <h2>Follow us</h2>
      <p>Let us be Social</p>
      <div>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-youtube"></i>
      </div>
    </div>
  </div>
  <div class="rights flex-row">
    <h4 class="text-gray">
      Copyright ©2020 All rights reserved | made by
      Julian Bharadwaja - <a href="https://myportfoliowebsitejulianbharadwaja.imfast.io/">https://myportfoliowebsitejulianbharadwaja.imfast.io/</a>
    </h4>
  </div>
  <div class="move-up">
    <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
  </div>
</footer>