<?= form_open($this->uri->uri_string(), array('class' => 'subscription')) ?>
  <h1>Daily Email</h1>
  <p>Type in your email address below and we will send you an update from CandidCow every morning. Don’t worry, we don’t spam and you can unsubscribe at any time.</p>
  <hr>

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