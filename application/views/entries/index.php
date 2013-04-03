<h1>Entries</h1>

<ul class="entries_list">
  <li><?= anchor('entries/create', 'New Entry') ?></li>
  <? foreach($entries_by_month as $month => $entries): ?>
    <li class="entries_month"><h2><?= $month ?></h2></li>

    <? foreach($entries as $entry): ?>
      <li>
        <?= date('jS', strtotime($entry['date'])) ?>
        <?= anchor('entries/edit/'.$entry['id'], 'Edit') ?>
        <?= anchor('entries/preview/'.$entry['id'], 'Preview') ?>
        <?= anchor('entries/delete/'.$entry['id'], 'Delete') ?>
      </li>
    <? endforeach; ?>
  <? endforeach; ?>
</ul>