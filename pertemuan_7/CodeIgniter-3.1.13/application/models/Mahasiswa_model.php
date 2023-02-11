<?php

class Mahasiswa_model extends CI_Model
{
    // fungsi untuk mengambil data mahasiswa
    public function getMahasiswa($id = null)
    {
        if ($id == null) {
            // query builder untuk mengambil semua data mahasiswa
            return $this->db->get("mahasiswa")->result_array();
        } else {
            return $this->db->get_where('mahasiswa', ['id' => $id])->result_array();
        }
    }

    // fungi detele mahasiswa
    public function deleteMahasiswa($id)
    {
        // query builder untuk menghapus data mahasiswa
        $this->db->delete('mahasiswa',  ['id' => $id]);
        // fungsi ini akan mengembalikan nilai 1 jika data berhasil dihapuskan jika - 1 maka data gagal dihapuskan
        return $this->db->affected_rows();
    }


    // fungis untuk menambahkan data mahasiswa
    public function createMahasiswa($data)
    {
        // query builder untuk menambahkan data mahasiswa
        $this->db->insert('mahasiswa', $data);
        return $this->db->affected_rows();
    }

    //  fungsi untuk mengubah data mahasiwa
    public function updateMahasiswa($data, $id)
    {
        // query builder untuk mengubah data mahasiswa
        $this->db->update('mahasiswa', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
