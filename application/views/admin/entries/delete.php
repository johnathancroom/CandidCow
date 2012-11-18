<h1>Delete Entry for <?= date('d F Y', strtotime($entry['date'])) ?></h1>

<?= form_open($this->uri->uri_string()) ?>
  Are you sure you want to delete this entry? <?= form_submit('submit', 'Confirm Delete') ?>
<?= form_close() ?>