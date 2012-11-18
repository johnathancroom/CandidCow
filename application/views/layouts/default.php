<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $template['title'] ?> | CandidCow</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/stylesheets/style.css">

  <style type="text/css">
    <? if(isset($display_entry['css'])): ?>
      <?= $display_entry['css']; ?>
    <? endif; ?>

    .logo {
      color: <?= $logo_color ?>;
    }
    footer a:hover {
      color: <?= $logo_color ?>;
    }
    a {
      color: <?= $logo_color ?>;
    }
  </style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= $template['metadata'] ?>
</head>
<body>
  <div class="logo" style="color: <?= $logo_color; ?>">
    <?= anchor('', 'CandidCow') ?>
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