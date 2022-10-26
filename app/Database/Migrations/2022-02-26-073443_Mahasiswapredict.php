<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswapredict extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => '11',
			],
			
			'nim' => [
				'type'           => 'VARCHAR',
				'constraint'     => '10',
			],
			'nama_mahasiswa' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'XC1' => [
				'type'           => 'FLOAT',
				'constraint'     => '20',
			],
			'XC2' => [
				'type'           => 'FLOAT',
				'constraint'     => '20',
			],
			'XC3' => [
				'type'           => 'FLOAT',
				'constraint'     => '20',
			],
			'XC4' => [
				'type'           => 'FLOAT',
				'constraint'     => '20',
			],
			'K13' => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
				'null'       	 => true,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			]
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('mahasiswa_predict');
	}

	public function down()
	{
		$this->forge->dropTable('mahasiswa_predict');
	}
}
