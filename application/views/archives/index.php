<div class="archives">
  <h1>Archives</h1>

  <ul>
    <? foreach($entries_by_month as $month => $entries): ?>
      <li class="entries_month"><h3><?= $month ?></h3></li>

      <li>
        <? sort($entries); ?>
        <? foreach($entries as $entry): ?>
          <?= anchor('archives/show/'.$entry['id'], date('jS', strtotime($entry['date']))) ?>
        <? endforeach; ?>
      </li>
    <? endforeach; ?>
  </ul>
</div>