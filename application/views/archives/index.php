<div class="archives">
  <h1>Archives</h1>

  <ul>
    <? foreach($entries as $entry): ?>
      <li><?= anchor('archives/show/'.$entry['id'], date('d F Y', strtotime($entry['date']))) ?></li>
    <? endforeach; ?>
  </ul>
</div>