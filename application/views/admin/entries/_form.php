<?= form_open($this->uri->uri_string()) ?>
  <?
    $fields = array(
      array(
        'type' => 'hidden',
        'attributes' => array(
          'id' => (isset($entry['id'])) ? $entry['id'] : ''
        )
      ),
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
          'value' => (isset($entry['date_pieces']['month'])) ? $entry['date_pieces']['month'] : date('m')
        ),
        'options' => month_select_options(),
        'prefix' => '<div>'
      ),
      array(
        'type' => 'dropdown',
        'attributes' => array(
          'name' => 'date_day',
          'value' => (isset($entry['date_pieces']['day'])) ? $entry['date_pieces']['day'] : date('d')
        ),
        'options' => day_select_options()
      ),
      array(
        'type' => 'dropdown',
        'attributes' => array(
          'name' => 'date_year',
          'value' => (isset($entry['date_pieces']['year'])) ? $entry['date_pieces']['year'] : date('Y')
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