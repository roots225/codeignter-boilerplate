<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_ion_auth extends CI_Migration {
	private $tables;

	public function __construct() {
		parent::__construct();
		$this->load->dbforge();
	}

	public function up() {
		// Drop table 'groups' if it exists
		$this->dbforge->drop_table($this->tables['ci_sessions'], TRUE);

		// Table structure for table 'groups'
		$this->dbforge->add_field(array(
			'id' => array(
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'ip_address' => array(
				'type'       => 'VARCHAR',
				'constraint' => '45',
			),
			'timestamp' => array(
                'type'       => 'INT',
                'constraint' => '10',
                'unsigned'       => TRUE
			),
			'data' => array(
				'type'       => 'BLOB',
			)
		));
		
	}

	public function down() {
		$this->dbforge->drop_table($this->tables['ci_sessions'], TRUE);
	}
}
