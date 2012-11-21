<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Add_subscription_table extends CI_Migration {

  function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => 256,
      ),
      'active' => array(
        'type' => 'INT',
        'constraint' => 1,
        'default' => 1
      ),
      'created_at' => array(
        'type' => 'DATETIME'
      )
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('subscriptions');
  }

  function down()
  {
    $this->dbforge->drop_table('subscriptions');
  }

}