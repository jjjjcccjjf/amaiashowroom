<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_thankyou_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      'heading' => array(
        'type' => 'VARCHAR',
        'constraint' => '200'
      ),
      'content' => array(
        'type' => 'TEXT',
        'null' => true
      )
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    if($this->dbforge->create_table('thankyou'))
    {
      $table = 'thankyou';

      $data = array(
        'heading' => 'Thank you!',
        'content' => 'You have finished the survey. ',
      );
      $this->db->insert($table, $data);
    }
  }

  public function down()
  {
    $this->dbforge->drop_table('thankyou', true);
  }
}
