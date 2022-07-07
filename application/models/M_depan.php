<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_depan extends CI_Model
{
  public function create($data)
  {
    $this->db->insert('users', $data);
  }

  public function read_condition($table, $condition)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($condition);

    $query = $this->db->get();
    return $query;
  }

  public function read_book_joinMember()
  {
    $this->db->select('*');
    $this->db->from('books_outs bo');
    $this->db->join('books b', 'bo.id_book = b.id_book', 'left');
    $this->db->join('members m', 'bo.id_member = m.id_member');

    $query = $this->db->get();
    return $query;
  }

  public function read_book_joinMember_condition($condition)
  {
    $this->db->select('*');
    $this->db->from('books_outs bo');
    $this->db->join('books b', 'bo.id_book = b.id_book');
    $this->db->join('members m', 'bo.id_member = m.id_member');
    $this->db->where($condition);

    $query = $this->db->get();
    return $query;
  }

  public function update($table, $condition, $data)
  {
    return $this->db->update($table, $data, $condition);
  }
}
