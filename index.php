  <?php require_once('../../config.php');?>
  <?php $page_id = 'home'; ?>

  <?php 
      //get all content related to the selected page
      $sql = "
      SELECT *
      FROM site_content
      WHERE page_name='home'";

      $myData = $db->query($sql);

      //create container for each piece of data
      while($row = $myData->fetch_assoc())
      {
        if($row['section_name'] === 'blurb')
        {
          $blurb = $row['content'];
        }

        if($row['section_name'] === 'intro')
        {
          $intro = $row['content'];
        }
      }
  ?>

  <?php require_once('includes/top.php');?>
  <?php require_once('includes/header.php');?>
    <section id="main_content">
    	<h2>Three of The Best!</h2>
      <div class="players">
        <img class='img1' src="images/kobe.jpg" alt="Kobe Bryant!" />
        <img class='img2' src="images/kevin.jpg" alt="Kevin Durant!" />
        <img class='img3' src="images/lebron.jpg" alt="Lebron James"/>    
      </div>
      <div id="content">
        <p class="p1">
          <?php echo $intro ?>
        </p>
        <p class="p2">
         <?php echo $blurb ?>
        </p>
      </div>
    </section>
    
  <?php require_once('includes/footer.php');?>
</body>
</html>