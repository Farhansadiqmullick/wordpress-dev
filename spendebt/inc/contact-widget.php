<?php
global $spendebt_section_id;
$spendent_section = get_post($spendebt_section_id);
$spendent_section_title = $spendent_section->post_title;
$spendent_section_description = $spendent_section->post_description;


?>



<div class="content">
  <form action="#">
      <?php wp_nonce_field( contact, contact)?>

    <label for="fname"></label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname"></label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country"></label>
    <input type="email" id="email" name="email" placeholder="Email number">

    <label for="subject"></label>
    <textarea id="subject" name="subject" placeholder="Enter Subject" style="height:100px"></textarea>

    <label for="message"></label>
    <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" name="submit" value="Submit">

  </form>
</div>