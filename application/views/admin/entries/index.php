<ul>
  <li><?= anchor('admin/entries/create', 'New Entry') ?></li>
  <? foreach($entries as $entry): ?>
    <li><?= date('d F Y', strtotime($entry['date'])) ?></li>
  <? endforeach; ?>
</ul>