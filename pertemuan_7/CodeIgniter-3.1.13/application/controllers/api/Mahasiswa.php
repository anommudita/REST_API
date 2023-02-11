<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;


class Mahasiswa extends RestController
{
    // jika ingin memanggil model harus dilakukan di construct
    public function __construct()
    {
        parent::__construct();
        // load terlebih dahulu model Mahasiswa_model
        $this->load->model('Mahasiswa_model', 'mahasiswa');

        //  limit akses api
        // perjam berapa kai aksesnya contoh disini saya memberikan 1000 hari dan per key ya !
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_put']['limit'] = 100;
    }

    // index_get method adalah method untuk get semua data 
    public function index_get()
    {

        // Mengecek data mahaasiswa jika berisikan id ini adalah sebuah fitur saja ya!
        $id = $this->get('id');

        if ($id === null) {
            // jika id tidak dikirimkan maka akan menampilkan semua data mahasiswa
            // mahaiswa adalah Mahasiswa_model yang diberikan nama singkat mahasiswa
            $mahasiswa = $this->mahasiswa->getMahasiswa();
        } else {
            // jika id dikirimkan maka akan menampilkan data mahasiswa berdasarkan id
            $mahasiswa = $this->mahasiswa->getMahasiswa($id);
        }

        // Method GET data mahasiswa
        // jika data mahasiswa ada
        if ($mahasiswa) {
            $this->response([
                'status' => true,
                // data yang dikirimkan berupa data json mahaiswa
                'data' => $mahasiswa,
                'message' => 'Data mahasiswa berhasil diambil'
            ], RestController::HTTP_OK);

            // jika client meminta data mahaiswa dengan id yang tidak ada maka tampilkan code ini!
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data mahasiswa tidak ditemukan'
            ], RestController::HTTP_NOT_FOUND);
        }
    }


    // Method DELETE data mahasiswa
    public function index_delete()
    {
        // Mengecek data mahaasiswa jika berisikan id ini adalah sebuah fitur saja ya!
        $id = $this->delete('id');

        // jika id tidak dikirimkan maka tampilkan code ini!
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Memberikan id!'
            ], RestController::HTTP_BAD_REQUEST);
        }
        // jika id dikirimkan maka data tersebut harus dihapuskan!
        else {
            // jika data mahasiswa dihapus satu data maka tampilkan code ini!
            if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
                $this->response([
                    'status' => true,
                    // data yang dikirimkan berupa data json mahasiswa
                    'id' => $id,
                    'message' => 'Data mahasiswa berhasil dihapus'
                ], RestController::HTTP_OK);
            }
            // jika id tidak ada maka tampikan ini ya!
            else {
                $this->response([
                    'status' => false,
                    'message' => 'id tidak ditemukan!'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    // Method POST data mahasiswa atau tambah data mahasiswa
    public function index_post()
    {
        // Menerima data sudah rapi karena kita sudah di server
        // disisi client kita sudah melakukan validasi


        // data yang dikirimkan berupa data json mahasiswa dan harus isi data ya
        $data = [
            'nim' => $this->post('nim'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->mahasiswa->createMahasiswa($data) > 0) {
            $this->response([
                'status' => true,
                // data yang dikirimkan berupa data json mahasiswa
                'message' => 'Data mahasiswa berhasil ditambahkan'
            ], RestController::HTTP_CREATED);
        } else {

            $this->response([
                'status' => false,
                'message' => 'Data mahasiswa gagal ditambahkan'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    // Method PUT data mahasiswa atau update data mahasiswa
    public function index_put()
    {

        // id 
        $id = $this->put('id');

        //  ingat data yang dikirimkan sudah aman ya sudah konfigurasi di client supaya rapi dan sudah divalidasi juga!
        $data = [
            'nim' => $this->put('nim'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->mahasiswa->updateMahasiswa($data, $id) > 0) {
            $this->response([
                'status' => true,
                // data yang dikirimkan berupa data json mahasiswa
                'message' => 'Data mahasiswa berhasil diupdate'
            ], RestController::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => 'Data mahasiswa gagal diupdate'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
