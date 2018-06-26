<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_survey_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id');
    # Buying experience
    $this->dbforge->add_field(array(
      'be_knowledge' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'be_courtesy' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'be_response' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'be_appearance' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
    ));
    # Site visit experience
    $this->dbforge->add_field(array(
      'sve_appearance' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'sve_attractiveness' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'sve_orderliness' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'sve_safety' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'sve_accessibility' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
    ));
    # Showroom/Sales Office/Model Unit
    $this->dbforge->add_field(array(
      'ssomu_cleanliness' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'ssomu_safety' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'ssomu_completeness' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'ssomu_accessibility' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'ssomu_comfort' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
    ));
    # Product
    $this->dbforge->add_field(array(
      'p_design' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'p_finishes' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'p_sizes' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'p_amenities' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'p_pricing' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'p_available' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
    ));
    # Home-buying decision
    $this->dbforge->add_field(array(
      'hbd_how' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'hbd_how_testimonial' => array(
        'type' => 'TEXT',
        'constraint' => '200',
        'null' => true,
        'default' => null
      ),
      'hbd_when' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false
      ),
      'hbd_if_not_purchasing' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false,
        'comment' => 'Can be more than one. Imploded by the pipe symbol (|)'
      ),
      'hbd_recommend' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'null' => false,
      ),
      'hbd_recommend_testimonial' => array(
        'type' => 'TEXT',
        'constraint' => '200',
        'null' => true,
        'default' => null
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('survey');
  }

  public function down()
  {
    $this->dbforge->drop_table('survey', true);
  }
}
