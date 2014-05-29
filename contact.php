<?php require_once('../../config.php');?>
<?php 
      //get all content related to the selected page
      $sql = "
      SELECT *
      FROM site_content
      WHERE page_name='contact'";

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

    if(@$_POST['submit'])
    {
      require_once('includes/validation.php');
      
      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $comments = trim($_POST['comments']);
      $errors = array();
      
      // test user info for non-valid data
      $valid = verifyAlphaNum($name);
      if(!$valid)
      {
         $errors['name'] = "Name must be letter, numbers, or spaces"; 
      }
      
      $valid = verifyEmail($email);
      if(!$valid)
      {
        $errors['email'] = "Please provide a vaild email address - test@test.com";
      }
      
      $comments = verifyText($comments);
	
	    //if any errors, don't send email - else send email
	    if(count($errors) === 0)
	    {
          //prepare for sending email
          $destination = 'george.trammell@yahoo.com';
          $subject = 'Comments from my website';
          $body = "$name \n $email \n $comments";
      
        if(mail($destination, $subject, $body))
        {
          echo 'Your message has been sent. Below is the info you provided:';
          
          //test to see if form data is recieved.
          echo '<h1>Thanks for providing feedback</h1>';
          echo '<ul>';
          echo '<li>' . $_POST['name'] . '</li>';
          echo '<li>' . $_POST['email'] . '</li>';
          echo '<li>' . $_POST['comments'] . '</li>';
          echo '</ul>';
        }
        else
        {
          echo 'There was an error. Your message has NOT been sent.';
        }
	    }//if count end

    }
    else // form not submitted
    {  
      //echo "just view form";
    }

  ?>


  <?php $page_id = 'contact'; ?>
  <?php require_once('includes/top.php'); ?>
  <?php require_once('includes/header.php'); ?>

<p><?php echo $intro?> </p>
   <section>
    	<h2>Contact</h2>
      
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
          <legend>Contact Us</legend>
          <p>
            <label for="name">Name: </label>
            <span class="errors"><?php echo @$errors['name']; ?></span>
            <input type="text" name="name" placeholder="Type your name here"
             value="<?php echo @$_POST['name']; ?>"/>
          </p>
          
          <p>
            <label for="email">Email: </label>
             <span class="errors"><?php echo @$errors['email']; ?></span>
            <input type="text" name="email" placeholder="Type your email here"
             value="<?php echo @$_POST['email']; ?>"/>
          </p>
          
          <p>
            <label for="email">Comments: </label>
            <textarea name="comments" placeholder="type your message here">
            <?php echo @$_POST['comments']; ?></textarea>
          </p>
          
          <p>
            <input type="submit" value="send feedback now" name="submit" />
          </p>
        </fieldset>
      </form>
       
    </section>
    
  <?php require_once('includes/footer.php'); ?>
    
</body>
</html>

