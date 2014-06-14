  <?php $page_id = 'about'; ?>
  <?php require_once('../../config.php');?>
  <?php 
      //get all content related to the selected page
      $sql = "
      SELECT *
      FROM site_content
      WHERE page_name='about'";

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

<?php
  //interact with DB
  $sql = 'SELECT * FROM media';

  //send command to MySQL
  $myData = $db->query($sql)
  OR exit('unable to select data from table');

  //close DB connection
  $db->close();
  ?>

  <?php require_once('includes/top.php');?>
  <?php require_once('includes/header.php');?>
    <section id="main_content">
    	<h2>The Sneaks</h2>
      
       <div id="content">   
      <p>
        <?php echo $intro ?>
      </p>
      
      </div>
      
  <?php
    echo '<div id="products">';

    while($row = $myData->fetch_assoc())
    {
      echo '<div class="product">';
      echo '<img src="images/' . $row['photo'] . '.jpg" alt="" />';
      echo '<h3>' . $row['name'] . '</h3>';
      echo '<p>' . $row['description'] . '</p>';
      echo '<p>$' . $row['price'] . '</p>';
      echo '</div>';
    }
    echo '<br class="clear" />';
    echo '</div>'
  ?>
     
  
      
  
    </section>
    
  <?php require_once('includes/footer.php');?>
</body>
</html>