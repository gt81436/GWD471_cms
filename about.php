  <?php $page_id = 'about'; ?>
  <?php require_once('../../config.php');?>
  <?php
  //interact with DB
  $sql = 'SELECT * FROM media';

  //send coomand to MySQL
  $myData = $db->query($sql)
  OR exit('unable to select data from table');

  //close DB connection
  $db->close();
  ?>

  <?php require_once('includes/top.php');?>
  <?php require_once('includes/header.php');?>
    <section>
    	<h2>About Us</h2>
  <?php
    echo '<div id="products">';
    while($row = $myData->fetch_assoc())
    {
      echo '<div class="product">';
      echo '<img src="" alt="" />';
      echo '<h3>' . $row['name'] . '</h3>';
      echo '<p>' . $row['description'] . '</p>';
      echo '<p>$' . $row['price'] . '</p>';
      echo '</div>';
    }
    echo '<br class="clear" />';
    echo '</div>'
  ?>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc felis purus, pharetra eu ante nec, sollicitudin interdum tortor. Suspendisse in dui lectus. In in eros felis. Suspendisse euismod neque non bibendum fringilla. Cras aliquam, arcu ut ultrices venenatis, ipsum sem suscipit odio, iaculis viverra dolor ante eu nunc. Pellentesque tempor ipsum ut tempor cursus. Integer in ligula varius dolor pellentesque luctus et vitae est. Sed imperdiet massa metus. Mauris malesuada tristique purus non fermentum. Praesent mattis eros et ornare congue. 
        </p>
    </section>
    
  <?php require_once('includes/footer.php');?>
</body>
</html>