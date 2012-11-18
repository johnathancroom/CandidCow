<ul>
  <li><?= anchor('admin/entries/create', 'New Entry') ?></li>
  <? foreach($entries as $entry): ?>
    <li><?= date('d F Y', strtotime($entry['date'])) ?> <?= anchor('admin/entries/edit/'.$entry['id'], 'Edit') ?></li>
  <? endforeach; ?>
</ul>