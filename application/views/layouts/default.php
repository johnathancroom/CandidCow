<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $template['title'] ?></title>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/stylesheets/style.css">
  <?= $template['metadata'] ?>
</head>
<body>
  <? if(isset($user)): ?>
    <div>
      Hello, <?= $user['username'] ?>. <?= anchor('auth/logout', 'Logout') ?>
    </div>

    <hr>
  <? endif; ?>

  <?
    if(isset($flashdata))
    {
      foreach($flashdata as $key => $flash)
      {
        if(in_array($key, array('alert', 'error', 'notice')) && $flash != NULL)
        {
          ?>
          <div class="flash_<?= $key ?>"><?= $flash ?></div>
          <?php
        }
      }
    }
  ?>

  <?= $template['body'] ?>
</body>
</html>