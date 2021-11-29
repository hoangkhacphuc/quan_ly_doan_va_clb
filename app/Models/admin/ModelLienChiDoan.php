<?php

namespace App\Models\admin;

use App\Models\HomeModel;

class ModelLienChiDoan extends HomeModel {
    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('lienchidoan');
    }

    public function add($param1)
    {
        $data = array(
            'Name' => $param1,
        );
        $query = $this->database->insert($data);
        
        echo $query ? json_encode(array('status' => true, "message" => "Thêm thành công !")) : json_encode(array('status' => false, "message" => "Thêm thất bại !"));
    }

    public function getLCD()
    {
        return $this->database->select('*')->get()->getResultArray();
        
    }

    public function getCD($lcd)
    {
        $query = $this->dbTable('lienchidoan')->where('Name', $lcd)->get()->getResultArray();
        if (count($query) == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy Liên chi Đoàn !"));
            return;
        }
        $query = $this->dbTable('chidoan')->select('*')->where('LienChiDoan', $query[0]['ID'])->get()->getResultArray();
        echo json_encode(array('status' => true, "message" => json_encode($query)));
    }

    public function getStudent($lcd, $cd)
    {
        $query = $this->dbTable('lienchidoan')->select('*')->where('Name', $lcd)->get()->getResultArray();
        if (count($query) == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy Liên chi Đoàn !"));
            return;
        }
        $query = $this->dbTable('chidoan')->select('*')->where(array('LienChiDoan' => $query[0]['ID'], 'Name' => $cd))->get()->getResultArray();
        if (count($query) == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy Chi Đoàn !"));
            return;
        }
        $dataStudent = $this->dbTable('student')->select('*')->where('ChiDoan', $query[0]['ID'])->get()->getResultArray();
        $num = 0;
        foreach ($dataStudent as $key ) {
            
            $id_position = $this->dbTable('account')->select('*')->where('ID', $key['ID'])->get()->getResultArray();
            $position = $this->dbTable('position')->select('*')->where('ID', $id_position[0]['Position'])->get()->getResultArray();
            $dataStudent[$num]['Position'] = $position[0]['Name'];
            $num++;
        }
        echo json_encode(array('status' => true, "message" => json_encode($dataStudent)));
    }

    public function getStudentData($id)
    {
        $dataStudent = $this->dbTable('student')->select('*')->where('ID', $id)->get()->getResultArray();
        if (count($dataStudent) == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy tài khoản !"));
            return;
        }

        $dataCD = $this->dbTable('chidoan')->select('*')->where(array('ID' => $dataStudent[0]['ChiDoan']))->get()->getResultArray();
        $dataLCD = $this->dbTable('lienchidoan')->select('*')->where('ID', $dataCD[0]['LienChiDoan'])->get()->getResultArray();
        $dataStudent[0]['LCD'] = $dataLCD[0]['Name'];
        $dataStudent[0]['ChiDoan'] = $dataCD[0]['Name'];
        $id_position = $this->dbTable('account')->select('*')->where('ID', $dataStudent[0]['ID'])->get()->getResultArray();
        $position = $this->dbTable('position')->select('*')->where('ID', $id_position[0]['Position'])->get()->getResultArray();
        $dataStudent[0]['Position'] = $position[0]['Name'];
        echo json_encode(array('status' => true, "message" => json_encode($dataStudent[0])));
    }

    public function update($param1,$param2)
    {
        $data = array(
            'Name' => $param2,
        );
        $this->database->where('ID', $param1);
        $query = $this->database->get();
        if ($query->getRow() == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm tìm thấy Liên chi Đoàn !"));
            return;
        }
        $this->database->where('ID', $param1);
        $query = $this->database->update($data);
        echo $query ? json_encode(array('status' => true, "message" => 'Cập nhật thành công !')) : json_encode(array('status' => false, "message" => 'Cập nhật thất bại !'));
    }

    public function delete($param1)
    {
        $this->database->where('ID', $param1);
        $query = $this->database->get();
        if ($query->getRow() == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm tìm thấy Liên chi Đoàn !"));
            return;
        }
        $query = $this->dbTable('chidoan')->where('LienChiDoan', $param1)->get()->getResultArray();
        if (!empty($query) && count($query) > 0)
        {
            echo json_encode(array('status' => false, "message" => "Có Chi Đoàn trong Liên chi Đoàn, không thể xóa !"));
            return;
        }
        $this->database->where('ID', $param1);
        $query = $this->database->delete();
        echo $query ? json_encode(array('status' => true, "message" => 'Xóa thành công !')) : json_encode(array('status' => false, "message" => 'Xóa thất bại !'));
    }

}