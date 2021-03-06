<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_im_usersocket extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'serial' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            "userId"=>array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
            "socketId"=>array(
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null'=>FALSE
            )
        ));
        $this->dbforge->add_key('serial', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (userId) REFERENCES users(userId)');
        $this->dbforge->create_table('im_usersocket');
    }
    public function down()
    {
        $this->dbforge->drop_table('im_usersocket');
    }
}