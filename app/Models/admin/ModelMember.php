<?php

namespace App\Models\admin;

use App\Models\HomeModel;

class ModelMember extends HomeModel {
    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('student');
    }

    public function add($param1,$param2,$param3,$param4,$param5, $param6)
    {
        $dataStudent = $this->dbTable('student')->select('*')->where('StudentID', $param2)->get()->getResultArray();
        if (!empty($dataStudent) && count($dataStudent) > 0)
        {
            echo json_encode(array('status' => false, "message" => "Mã sinh viên này đã tồn tại !"));
            return;
        }
        $query = $this->dbTable('lienchidoan')->select('*')->where('Name', $param5)->get()->getResultArray();
        $query = $this->dbTable('chidoan')->select('*')->where(array('LienChiDoan' => $query[0]['ID'], 'Name' => $param3))->get()->getResultArray();
        $data = array(
            'Name' => $param1,
            'StudentID' => $param2,
            'ChiDoan' => $query[0]['ID'],
            'Email' => $param4,
            'DOJ' => date('Y-m-d')  
        );
        $query = $this->database->insert($data);
        $dataStudent = $this->dbTable('student')->select('*')->where('StudentID', $param2)->get()->getResultArray();
        $query = $this->dbTable('position')->select('*')->where('Name', $param6)->get()->getResultArray();
        
        $data = array(
            'User' => $param2,
            'Pass' => md5($param2),
            'Position' => $query[0]['ID'],
            'ID' => $dataStudent[0]['ID']
        );
        $query = $this->dbTable('account')->insert($data);
        echo $query ? json_encode(array('status' => true, "message" => "Thêm thành công !")) : json_encode(array('status' => false, "message" => "Thêm thất bại !"));
    }

    public function updateInfo($param1,$param2,$param3,$param4,$param5,$param6,$param7,$param8,$param9,$param10,$param11,$param12,$param13,$param14, $param15, $param16)
    {
        $lcd = $param2;
        $cd = $param3;
        $query = $this->dbTable('lienchidoan')->select('*')->where('Name', $lcd)->get()->getResultArray();
        $query = $this->dbTable('chidoan')->select('*')->where(array('Name' => $cd, 'LienChiDoan' => $query[0]['ID']))->get()->getResultArray();

        $data = array(
            'Name' => $param1,
            'Email' => $param5,
            'DOB' => $param6,
            'ChiDoan' => $query[0]['ID'],
            'Sex' => $param7,
            'Address' => $param8,
            'DateJoinUnion' => $param9,
            'AddressJoinUnion' => $param10,
            'DateJoinParty' => $param11,
            'AddressJoinParty' => $param12,
            'Award' => $param13,
            'Punishment' => $param14,
        );
        if ($param15 != null)
            $data['StudentID'] = $param15;
        $query = $this->database->where('ID', $param4)->update($data);
        if ($param15 != null)
        {
            $query = $this->dbTable('position')->where('Name', $param16)->get()->getResultArray();
            $data = array(
                'Position' => $query[0]['ID'],
                'User' => $param15
            );
            $query = $this->dbTable('account')->where('ID', $param4)->update($data);
        }
        echo $query ? json_encode(array('status' => true, "message" => "Cập nhật thành công !")) : json_encode(array('status' => false, "message" => "Cập nhật thất bại !"));
    }

    public function deleteMember($id)
    {
        $query = $this->database->select('*')->where('ID', $id)->get()->getResultArray();
        if (empty($query) || count($query) == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy tài khoản !"));
            return;
        }
        $query = $this->database->where('ID', $id)->delete();
        $query = $this->dbTable('account')->where('ID', $id)->delete();
        echo $query ? json_encode(array('status' => true, "message" => "Đã xóa tài khoản này !")) : json_encode(array('status' => false, "message" => "Xóa thất bại !"));
    }

    public function search($inp)
    {
        $query = $this->database->select('*')->like('Name', $inp)->orLike('StudentID', $inp)->get()->getResultArray();
        if (empty($query) || count($query) == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy !"));
            return;
        }
        for ($i=0; $i < count($query); $i++) { 
            $id_position = $this->dbTable('account')->select('*')->where('ID', $query[$i]['ID'])->get()->getResultArray();
            $position = $this->dbTable('position')->select('*')->where('ID', $id_position[0]['Position'])->get()->getResultArray();
            $query[$i]['Position'] = $position[0]['Name'];
        }

        echo json_encode(array('status' => true, "message" => json_encode($query)));
    }

}