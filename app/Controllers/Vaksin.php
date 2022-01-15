<?php

namespace App\Controllers;

use App\Models\DataModel;
use DateTime;


class Vaksin extends BaseController
{
    protected $dataModel;

    public function __construct()
    {
        $this->dataModel =  new DataModel();
        helper('text');
    }

    public function index()
    {
        $data = [
            'data' => $this->dataModel->getAll()
        ];
        return view('home', $data);
    }

    public function masuk()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('sign-in/signin', $data);
    }

    public function beranda()
    {
        $data = [
            'vaksin' => $this->dataModel->getData('m1800018214@webmail.uad.ac.id'),
            'validation' => \Config\Services::validation()
        ];
        return view('beranda', $data);
    }

    public function login()
    {
        date_default_timezone_set('Asia/Jakarta');
        if (!$this->validate([
            'inputEmail' => [
                'rules' => 'required|is_not_unique[data.email]',
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'is_not_unique' => 'Email tidak terdaftar'
                ]
            ]
        ])) {
            return redirect()->to(base_url('vaksin/masuk'))->withInput();
        } else {

            $inputEmailLogin = $this->request->getVar('inputEmail');
            $dataModelDb = $this->dataModel->getData($inputEmailLogin);


            $kodeOtp = random_string('numeric', 4);
            $currentDate = date('Y-m-d H:i:s');
            $datetime = new DateTime($currentDate);
            $datetime->modify('+1 minute');
            $expiredDate = $datetime->format('Y-m-d H:i:s');

            $this->dataModel->save([
                'nim' => $dataModelDb['nim'],
                'kodeOTP' => $kodeOtp,
                'expiredDate' => $expiredDate
            ]);

            $dataSession = [
                'email' => $dataModelDb['email'],
                'nim' => $dataModelDb['nim'],
                'status' => 'PendingLogin'
            ];

            session()->set($dataSession);

            $email = \Config\Services::email();
            $email->setFrom('miftahsalam958@gmail.com', 'Verifikasi Email Dengan Library Email Codeigniter');
            $email->setTo($inputEmailLogin);
            $email->setSubject('Email Notifikasi');
            $email->setMessage('Halo ini adalah email dari demo ' . $kodeOtp);

            if ($email->send()) {
                echo 'Sukses, email berhasil dikirimkan, coba deh cek email kamu ada surat cinta dari aku :)';
            } else {
                echo 'Error, Gagal melakukan kirim email, cek koneksi jaringan dan lainnya.';
            }

            return redirect()->to(base_url('vaksin/validasi'));
        }
    }

    public function validasi()
    {
        return view('otp');
    }

    public function validating()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        $dataModelDb = $this->dataModel->getData(session()->get('email'));
        date_default_timezone_set('Asia/Jakarta');
        $waktuSekarang = date('Y-m-d H:i:s');
        $kode = $this->request->getVar('inputOTP');


        if ($kode == $dataModelDb['kodeOTP']) {
            if ($waktuSekarang > $dataModelDb['expiredDate']) {
                session()->setFlashdata('gagal', "Kode OTP Sudah Expired");
                return redirect()->to(base_url('vaksin/masuk'));
            }
            return redirect()->to(base_url('vaksin/beranda'));
        }
        session()->setFlashdata('gagal', "Kode OTP Salah");
        return redirect()->to(base_url('vaksin/validating'));
    }

    public function keluar() //fungsi untuk keluar
    {
        session()->destroy();
        return redirect()->to(base_url('vaksin'));
    }


    public function save()
    {
        $filePF = $this->request->getFile('fileProfile');
        $namaFile = $filePF->getRandomName();
        $filePF->move('assets/gambar', $namaFile);

        $this->dataModel->save([
            'nim' => session()->get('nim'),
            'fp' => $namaFile
        ]);

        return redirect()->to(base_url('vaksin/beranda'));
    }

    public function delete()
    {
        $namaFile = $this->dataModel->getData(session()->get('email'));
        if ($namaFile['fp'] != 'default.jpg') {

            $namaFile['fp'];
            unlink('assets/gambar/' . $namaFile['fp']);

            $this->dataModel->save([
                'nim' => session()->get('nim'),
                'fp' => 'default.jpg'
            ]);

            return redirect()->to(base_url('vaksin/beranda'));
        }
        session()->setFlashdata('gagalHapus', "Foto Profil Anda Default");
        return redirect()->to(base_url('vaksin/beranda'));
    }

    public function download($a)
    {
        $nim = session()->get('nim');
        if ($a == 1) {
            return $this->response->download('/assets/gambar/' . $nim . '1.jpg', null);
        } else {
            return redirect()->to(base_url('vaksin/beranda'));
        }
    }
}
