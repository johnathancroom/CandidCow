<?= form_open($this->uri->uri_string(), array('class' => 'subscription')) ?>
  <?
    $fields = array(
      array(
        'type' => 'label',
        'attributes' => array(
          'value' => 'Your Email',
          'for' => 'email'
        )
      ),
      array(
        'type' => 'input',
        'attributes' => array(
          'name' => 'email',
          'placeholder' => 'silly@billy.com'
        )
      ),
      array(
        'type' => 'submit',
        'attributes' => array(
          'value' => 'Subscribe'
        )
      )
    );

    build_form($fields);
  ?>
<?= form_close() ?>