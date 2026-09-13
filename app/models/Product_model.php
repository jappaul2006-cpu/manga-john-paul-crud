<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Product_model extends Model {
    
    public function __construct() {
        parent::__construct();
        $this->call->database(); // Na-add na ang database connection para hindi mag-error
    }

    // Read: Kunin lahat ng produkto
    public function get_all() {
        return $this->db->table('products')->get_all();
    }

    // Read: Kunin ang isang produkto base sa ID (para sa edit)
    public function get_by_id($id) {
        return $this->db->table('products')->where('id', $id)->get();
    }

    // Create: Magdagdag ng bagong produkto
    public function insert($data) {
        return $this->db->table('products')->insert($data);
    }

    // Update: I-update ang produkto
    public function update($id, $data) {
        return $this->db->table('products')->where('id', $id)->update($data);
    }

    // Delete: Burahin ang produkto
    public function delete($id) {
        return $this->db->table('products')->where('id', $id)->delete();
    }
}