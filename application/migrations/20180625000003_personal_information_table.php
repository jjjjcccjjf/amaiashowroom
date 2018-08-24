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
      'specific_occupation' => array(
        'type' => 'VARCHAR',
        'constraint' => '400',
        'null' => true
      ),
      'current_residence' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'specific_residence' => array(
        'type' => 'VARCHAR',
        'constraint' => '400',
        'null' => true
      ),
      'work_location' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'specific_work_location' => array(
        'type' => 'VARCHAR',
        'constraint' => '400',
        'null' => true
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
      ),
      'primary_interest' => array(
        'type' => 'VARCHAR',
        'constraint' => '500',
        'null' => true
      ),
      'secondary_interest' => array(
        'type' => 'VARCHAR',
        'constraint' => '500',
        'null' => true
      )
    ));
    # Is buyer
    $this->dbforge->add_field(array(
      'is_current_buyer' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
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
