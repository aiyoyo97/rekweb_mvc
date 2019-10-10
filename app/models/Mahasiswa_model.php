<?php

class Mahasiswa_model{

	private $table = 'mahasiswa';
	private $db;
	
	public function __construct()
	{
		$this->db = new Database;
	}

	/*[
		[
			'nrp' => '253302',
			'nama' => 'Beh',
			'email' => 'beh@gmail.com',
			'jurusan' => 'Teknik Informatika'
		],
		[
			'nrp' => '253234',
			'nama' => 'So',
			'email' => 'so@gmail.com',
			'jurusan' => 'Teknik Informatika'
		],
		[
			'nrp' => '253156',
			'nama' => 'Tang',
			'email' => 'tang@gmail.com',
			'jurusan' => 'Teknik Informatika'
		]
	];*/


	public function getAllMahasiswa()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
		/*$this->stmt = $stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
		$this->stmt->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);*/
		//return $this->mhs;
	}


	public function getMahasiswaById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDataMahasiswa($data)
	{
		$query = "INSERT INTO mahasiswa
					VALUES
					('', :nama, :nrp, :email, :jurusan)";

		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nrp', $data['nrp']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jurusan', $data['jurusan']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataMahasiswa($id)
	{
		$query = "DELETE FROM mahasiswa WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();

	}
}