<?php
namespace App\Models;

class HomeModel{
    public $db;
    public $student_data;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->student_data = $this->get_data_user();
    }

    public function dbTable($param)
    {
        return $this->db->table($param);
    }

    public function get_data_user()
    {
        $session = session();

        $query = $this->dbTable('account')->where('User', $session->get('User'))->get()->getRowArray();
        if (count($query) == 0)
            return false;
        $ID = $query['ID'];
        $position_id = $query['Position'];

        $query = $this->dbTable('position')->where('ID', $position_id)->get()->getRowArray();
        if (count($query) == 0)
            return false;
        $position = $query['Name'];

        $query = $this->dbTable('student')->where('ID', $ID)->get()->getRowArray();
        if (count($query) == 0)
            return false;

        $student_data = array(
            'User' => $session->get('User'),
            'User_ID' => $ID,
            'Name' => $query['Name'],
            'StudentID' => $query['StudentID'],
            'Avatar' => $query['Avatar'],
            'PhoneNumber' => $query['PhoneNumber'],
            'Email' => $query['Email'],
            'DOB' => $query['DOB'],
            'Sex' => $query['Sex'],
            'Address' => $query['Address'],
            'Language' => $query['Language'],
            'DateJoinUnion' => $query['DateJoinUnion'],
            'AddressJoinUnion' => $query['AddressJoinUnion'],
            'DateJoinParty' => $query['DateJoinParty'],
            'AddressJoinParty' => $query['AddressJoinParty'],
            'ChiDoan' => $query['ChiDoan'],
            'Grade' => $query['Grade'],
            'Award' => $query['Award'],
            'Punishment' => $query['Punishment'],
            'Notification' => $query['Notification'],
            'Position' => $position,
            'Position_ID' => $position_id,
        );

        return $student_data;
    }
}