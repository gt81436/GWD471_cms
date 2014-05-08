<?php
$page_id = 'update';
  require_once('../../../config.php');

  require_once('../includes/top.php');
?>
<link rel="stylesheet" href="../css/main.css" />
<h1>Update Page</h1>
<form action="" method="post">
  <fieldset>
    <legend>Update Page Info</legend>
    <select id="page" onchange="set_page(this)">
      <option value="">Choose a page to edit</option>
      <option value="home" id="home">Home</option>
      <option value="about" id="about">About</option>
      <option value="contact" id="contact">Contact</option>
    </select>
    
    <label for"intro">intro</label>
    <textarea name="intro" rows="10" cols="30"></textarea>
    
    <label for"body">body</label>
    <textarea name="body" rows="10" cols="30"></textarea>
    
    <input type="submit" name="submitted" value="update now" />
    
  </fieldset>
</form>





<?php  require_once('../includes/footer.php');?>