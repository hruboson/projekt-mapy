<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Db_model extends CI_Model{

    public function get_skoly(){
        $sql = "SELECT skola.id, skola.nazev, skola.geo_lat, skola.geo_long, mesto.nazev as mesto_nazev FROM skola JOIN mesto ON skola.mesto = mesto.id;";
        $resultset = $this->db->query($sql);
        $result = $resultset->result();

        return $result;
    }

    public function get_mesta(){
        $sql = "SELECT * FROM mesto";
        $resultset = $this->db->query($sql);
        $result = $resultset->result();

        return $result;
    }

    public function add_skola($nazev, $geo_lat, $geo_long, $mesto){
        $sql = "INSERT INTO skola (nazev, mesto, geo_lat, geo_long) values (?, ?, ?, ?)";
        $resultset = $this->db->query($sql, array($nazev, $mesto, $geo_lat, $geo_long));
    }

}