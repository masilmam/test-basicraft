<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_depan');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function doLogin()
	{
		$userData = $this->M_depan->read_condition(['username' => $this->input->post('username')])->row();

		if ($userData) {
			if (password_verify($this->input->post('password'), $userData->password)) {
				$sessionData = [
					'username' => $userData->username,
					'logged_in' => TRUE
				];
				$this->session->set_userdata($sessionData);

				if ($this->session->userdata('logged_in') == TRUE) {
					redirect('Welcome/dashboard');
				} else {
					redirect('Welcome/login');
				}
			} else {
				// wrong password
				$this->session->set_flashdata('msg', 'Username atau password salah!');
				redirect('Welcome/login');
			}
		} else {
			// username not found
			$this->session->set_flashdata('msg', 'Username atau password salah!');
			redirect('Auth/login');
		}
	}

	public function dashboard()
	{
		$data = ['title' => 'Dashboard'];
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}

	public function userList()
	{
		$data = [
			'title' => 'User List',
			'userList' => $this->M_depan->read_condition('users', ['is_active' => 'active'])->result()
		];

		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('userList', $data);
		$this->load->view('templates/footer');
	}

	public function editUser($id)
	{
		$data = [
			'title' => 'Edit User',
			'userList' => $this->M_depan->read_condition('users', [
				'id_user' => $id,
				'is_active' => 'active'
			])->row()
		];

		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('editUser', $data);
		$this->load->view('templates/footer');
	}

	public function bookRentList()
	{
		$data = [
			'title' => 'Daftar Peminjaman Buku',
			'bookRentList' => $this->M_depan->read_book_joinMember()->result()
		];

		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('bookRentList', $data);
		$this->load->view('templates/footer');
	}

	public function editRent($id)
	{
		$data = [
			'title' => 'Edit Peminjaman Buku',
			'memberList' => $this->M_depan->read_condition('members', ['is_active' => 'active'])->result(),
			'bookRent' => $this->M_depan->read_book_joinMember_condition(['id_books_out' => $id])->row()
		];

		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('editRent', $data);
		$this->load->view('templates/footer');
	}

	public function returnRent($id)
	{
		$data = [
			'title' => 'Edit Pengembalian Buku',
			'memberList' => $this->M_depan->read_condition('members', ['is_active' => 'active'])->result(),
			'bookRent' => $this->M_depan->read_book_joinMember_condition(['id_books_out' => $id])->row()
		];

		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('returnRent', $data);
		$this->load->view('templates/footer');
	}

	public function doEditRent()
	{
		$data = [
			'id_member' => $this->input->post('id_member'),
			'date_out' => $this->input->post('date_out'),
			'date_in_actual' => $this->input->post('date_in_actual')
		];

		$condition = ['id_books_out' => $this->input->post('id_books_out')];

		$this->M_depan->update('books_outs', $condition, $data);

		redirect('Welcome/bookRentList');
	}

	public function reportRent()
	{
		$data = [
			'title' => 'Report - Peminjaman Buku',
			'bookRentList' => $this->M_depan->read_book_joinMember()->result()
		];

		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('reportRent', $data);
		$this->load->view('templates/footer');
	}

	public function reportAllBook()
	{
		$data = [
			'title' => 'Report - Semua Buku',
			'bookList' => $this->M_depan->read_condition('books', ['is_active' => 'active'])->result()
		];

		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('reportAllBook', $data);
		$this->load->view('templates/footer');
	}

	public function insertUser()
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$salt = '';
		for ($i = 0; $i < 5; $i++) {
			$salt .= $characters[mt_rand(0, 10)];
		}

		$data = [
			'username' => 'ilmam',
			'password' => password_hash('ilmam', PASSWORD_BCRYPT),
			'salt' => $salt,
			'is_active' => 'active',
			'created' => date('Y-m-d H:i:s')
		];

		$this->M_depan->create($data);
	}
}
