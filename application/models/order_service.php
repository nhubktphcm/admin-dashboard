<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: NhuTran
 * Date: 4/21/16
 * Time: 6:28 AM
 * To change this template use File | Settings | File Templates.
 */
class Order_service extends CI_Model
{
    private static $TABLE_NAME = 'orders';

    public function findById($id)
    {
        $this->db->from(self::$TABLE_NAME);
        $this->db->where("id", $id);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
        return false;
    }

    public function findAll()
    {
        $this->db->from(self::$TABLE_NAME);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        }
        return false;
    }

    public function insert($value)
    {
        $this->db->insert(self::$TABLE_NAME, $value);
    }

    public function update($value, $id)
    {
        $this->db->where('id', $id);
        $this->db->update(self::$TABLE_NAME, $value);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete(self::$TABLE_NAME);
    }
}