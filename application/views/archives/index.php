<div class="archives">
  <h1>Archives</h1>

  <ul>
    <? foreach($entries_by_month as $month => $entries): ?>
      <li class="entries_month"><h3><?= $month ?></h3></li>

      <? foreach($entries as $entry): ?>
        <li><?= anchor('archives/show/'.$entry['id'], date('d F Y', strtotime($entry['date']))) ?></li>
      <? endforeach; ?>
    <? endforeach; ?>
  </ul>
</div>