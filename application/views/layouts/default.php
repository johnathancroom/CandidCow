<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $template['title'] ?> | Lugnuts</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/stylesheets/style.css">

  <? if(isset($display_entry['css'])): ?>
    <style type="text/css">
      <?= $display_entry['css']; ?>
    </style>
  <? endif; ?>

  <?= $template['metadata'] ?>
</head>
<body>
  <div class="logo" style="color: <?= $logo_color; ?>">
    <?= anchor('', 'Lugnuts') ?>
  </div>

  <? if(isset($user)): ?>
    <div class="admin">
      Hello, <?= $user['username'] ?>.
      <?= anchor('entries', 'Entries') ?>
      <?= anchor('auth/logout', 'Logout') ?>
    </div>
  <? endif; ?>

  <?
    if(isset($flashdata))
    {
      foreach($flashdata as $key => $flash)
      {
        if(in_array($key, array('alert', 'error', 'notice', 'success')) && $flash != NULL)
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