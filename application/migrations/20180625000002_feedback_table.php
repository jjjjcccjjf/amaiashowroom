<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_feedback_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      'timestamp' => array(
        'type' => 'varchar',
        'constraint' => '200',
        'comment' => 'Unique identifier for each feedback form',
        'null' => false
      ),
      'personal_information_id' => array(
        'type' => 'INT',
        'null' => false,
        'comment' => 'FK from personal_information table'
      ),
      'survey_id' => array(
        'type' => 'INT',
        'null' => true,
        'default' => null,
        'comment' => 'FK from survey table'
      ),
      'showroom' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false,
        'comment' => 'Which showroom this feedback form is from'
      )
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('feedback');
  }

  public function down()
  {
    $this->dbforge->drop_table('feedback', true);
  }
}
