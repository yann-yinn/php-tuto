<div id="content">
  <?php
  echo escape($message, ENT_QUOTES, 'UTF-8');
  echo component("components/button.php", array('text' => "Clique ici"));
  ?>
</div>