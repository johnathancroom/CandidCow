<?= form_open($this->uri->uri_string()) ?>
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
          'value' => date('m')
        ),
        'options' => month_select_options(),
        'prefix' => '<div>'
      ),
      array(
        'type' => 'dropdown',
        'attributes' => array(
          'name' => 'date_day',
          'value' => date('d')
        ),
        'options' => day_select_options()
      ),
      array(
        'type' => 'dropdown',
        'attributes' => array(
          'name' => 'date_year',
          'value' => date('Y')
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
          'value' => 'Put yer html here'
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
          'value' => 'Put yer css here'
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