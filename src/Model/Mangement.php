<?php
namespace App\Model;
use App\Database\DbCertificate;

class Mangement extends DbCertificate{
    // background
    public function addBg($data) {
        $sql = "
            INSERT INTO tb_background(
                b_name,
                b_path,
                status
            ) VALUES (
                :b_name,
                :b_path,
                :status
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getBg($action){
        $sql = "
            SELECT * FROM tb_background
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action == "count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getBgById($id){
        $sql = "
            SELECT * FROM tb_background WHERE b_id={$id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    // CA
    public function addCa($data) {
        $sql = "
            INSERT INTO tb_ca(
                ca_name,
                ca_path,
                status
            ) VALUES (
                :ca_name,
                :ca_path,
                :status
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getCa($action){
        $sql = "
            SELECT * FROM tb_ca
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action == "count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getCaById($id){
        $sql = "
            SELECT * FROM tb_ca WHERE ca_id={$id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    // File PHP
    public function addPHP($data) {
        $sql = "
            INSERT INTO tb_filephp(
                f_name,
                f_path,
                f_img,
                status
            ) VALUES (
                :f_name,
                :f_path,
                :f_img,
                :status
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getPHP($action){
        $sql = "
            SELECT * FROM tb_filephp
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action == "count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getPHPById($id){
        $sql = "
            SELECT * FROM tb_filephp WHERE f_id={$id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
}
?>