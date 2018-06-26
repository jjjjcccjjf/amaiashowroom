<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_personal_information_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id');
    # Personal information fields
    $this->dbforge->add_field(array(
      'name' => array(
        'type' => 'TEXT',
        'null' => false
      ),
      'gender' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'age' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'civil_status' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'occupation' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'current_residence' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'work_location' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'email_address' => array(
        'type' => 'VARCHAR',
        'constraint' => '300',
        'null' => false
      ),
      'mobile_number' => array(
        'type' => 'VARCHAR',
        'constraint' => '300',
        'null' => false
      ),
      'how_many_guests' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      )
    ));
    # Other fields
    $this->dbforge->add_field(array(
      'is_current_buyer' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'is_current_buyer' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'purpose_of_visit_buyer' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => true,
        'default' => null
      ),
      'purpose_of_visit_non_buyer' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => true,
        'default' => null
      ),
      'source' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false,
        'comment' => 'How did you learn about Amaia? Can be more than one. Imploded by the pipe symbol (|)'
      ),
      'budget' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false,
      ),
      'primary_interest' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false,
      ),
      'secondary_interest' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false,
        'comment' => 'Can be more than one. Imploded by the pipe symbol (|)'
      ),
      'primary_amenities' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false,
        'comment' => 'Can be more than one. Imploded by the pipe symbol (|)'
      ),
      'secondary_amenities' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false,
        'comment' => 'Can be more than one. Imploded by the pipe symbol (|)'
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('personal_information');
  }

  public function down()
  {
    $this->dbforge->drop_table('personal_information', true);
  }
}
