<h1>Entries</h1>

<ul>
  <li><?= anchor('entries/create', 'New Entry') ?></li>
  <? foreach($entries as $entry): ?>
    <li>
      <?= date('d F Y', strtotime($entry['date'])) ?>
      <?= anchor('entries/edit/'.$entry['id'], 'Edit') ?>
      <?= anchor('entries/preview/'.$entry['id'], 'Preview') ?>
      <?= anchor('entries/delete/'.$entry['id'], 'Delete') ?>
    </li>
  <? endforeach; ?>
</ul>