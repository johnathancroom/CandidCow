<?= form_open($this->uri->uri_string(), array('class' => 'entries_form')) ?>
  <?
    $fields = array(
      array(
        'type' => 'label',
        'attributes' => array(
          'value' => 'Date'
        )
      ),
      array(
        'type' => 'dropdown',
        'attributes' => array(
          'name' => 'date_month',
          'value' => (isset($entry['date_pieces']['month'])) ? $entry['date_pieces']['month'] : date('m', $new_entry_date)
        ),
        'options' => month_select_options(),
        'prefix' => '<div>'
      ),
      array(
        'type' => 'dropdown',
        'attributes' => array(
          'name' => 'date_day',
          'value' => (isset($entry['date_pieces']['day'])) ? $entry['date_pieces']['day'] : date('d', $new_entry_date)
        ),
        'options' => day_select_options()
      ),
      array(
        'type' => 'dropdown',
        'attributes' => array(
          'name' => 'date_year',
          'value' => (isset($entry['date_pieces']['year'])) ? $entry['date_pieces']['year'] : date('Y', $new_entry_date)
        ),
        'options' => year_select_options(2005, 2020),
        'suffix' => '</div>'
      ),
      array(
        'type' => 'label',
        'attributes' => array(
          'value' => 'HTML',
          'for' => 'html'
        )
      ),
      array(
        'type' => 'textarea',
        'attributes' => array(
          'name' => 'html',
          'value' => (isset($entry['html'])) ? $entry['html'] : 'Put yer HTML here.'
        ),
        'prefix' => '<div>',
        'suffix' => '</div>'
      ),
      array(
        'type' => 'label',
        'attributes' => array(
          'value' => 'CSS',
          'for' => 'css'
        )
      ),
      array(
        'type' => 'textarea',
        'attributes' => array(
          'name' => 'css',
          'value' => (isset($entry['css'])) ? $entry['css'] : 'Put yer CSS here'
        ),
        'prefix' => '<div>',
        'suffix' => '</div>'
      ),
      array(
        'type' => 'submit',
        'attributes' => array(
          'value' => 'Submit'
        )
      )
    );

    build_form($fields);
  ?>
<?= form_close() ?>

<div class="post-preview"></div>
<style type="text/css" class="post-preview-styles"></style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  $(".post-preview").html($("#html").val())
  $(".post-preview-styles").html($("#css").val())

  $("#html").keyup(function() {
    $(".post-preview").html($(this).val())
  })

  $("#css").keyup(function() {
    $(".post-preview-styles").html($(this).val())
  })
</script>