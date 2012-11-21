<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $template['title'] ?> | CandidCow</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/stylesheets/style-<?= md5_file('assets/stylesheets/style.css') ?>.css">

  <style type="text/css">
    .logo {
      color: <?= $logo_color ?>;
    }
    footer a:hover {
      color: <?= $logo_color ?>;
    }
    a {
      color: <?= $logo_color ?>;
    }
    .subscription input[type=submit] {
      background-color: <?= $logo_color ?>;
    }

    <? if(isset($display_entry['css'])): ?>
      <?= $display_entry['css']; ?>
    <? endif; ?>
  </style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= $template['metadata'] ?>
</head>
<body>
  <div class="logo">
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

  <div class="floating-footer">
    <footer>
    <?= anchor('archives', 'Archives') ?> &middot; <?= anchor('subscription', 'Daily Email') ?>
    </footer>

    <footer class="byline">
      By <?= anchor('http://twitter.com/johnathancroom', 'Johnathan') ?> &amp; <?= anchor('http://twitter.com/itsjustkarissa', 'Karissa') ?>
    </footer>
  </div>

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-22645449-13']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</body>
</html>