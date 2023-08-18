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
                ca_position,
                ca_position2,
                status
            ) VALUES (
                :ca_name,
                :ca_path,
                :ca_position,
                :ca_position2,
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
                f_excel,
                status
            ) VALUES (
                :f_name,
                :f_path,
                :f_img,
                :f_excel,
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

    // Data Certificate
    public function addDataCertificate($data){
        $sql ="
            INSERT INTO tb_data_certificate(
                ba_name,
                num,
                name,
                school,
                project,
                teacher,
                team,
                activity,
                level,
                award,
                event,
                event_date,
                ca_name,
                link
            ) VALUES (
                :ba_name,
                :num,
                :name,
                :school,
                :project,
                :teacher,
                :team,
                :activity,
                :level,
                :award,
                :event,
                :event_date,
                :ca_name,
                :link
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getDataCerByBatch($action,$batch){
        $sql = "
            SELECT *
            FROM tb_data_certificate
            WHERE ba_name='{$batch}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=='count'){
            return count($data);
        }else{
            return $data;
        }
    }
    // Batch
    public function addBatch($data){
        $sql = "
            INSERT INTO tb_batch(
                num,
                ba_name,
                ba_date,
                activity_name,
                folder,
                ba_start,
                ba_end,
                u_id
            ) VALUES (
                :num,
                :ba_name,
                :ba_date,
                :activity_name,
                :folder,
                :ba_start,
                :ba_end,
                :u_id
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getBatchName(){
        $sql ="
            SELECT num
            FROM tb_batch
            ORDER BY num DESC
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if(count($data) > 0 ){
            $num = $data[0]['num'];
            return $num;
        }else{
            $num = 0;
            return $num;
        }
        
    }
    public function getBatchAll(){
        $sql = "
            SELECT *
            FROM tb_batch
            ORDER BY ba_date DESC
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
}
?>