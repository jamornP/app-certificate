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
                link,
                pro_id
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
                :link,
                :pro_id
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getDataCerByAll($action){
        $sql = "
            SELECT *
            FROM tb_data_certificate
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=='count'){
            return count($data);
        }else{
            return $data;
        }
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
    public function getDataCerByEvent($action,$event){
        $sql = "
            SELECT *
            FROM tb_data_certificate
            WHERE event='{$event}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=='count'){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getDataEvent($action){
        $sql = "
            SELECT *
            FROM tb_data_certificate
            GROUP BY event
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=='count'){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getCertificate($name,$e_name){
        $sql = "
            SELECT *
            FROM tb_data_certificate
            WHERE name LIKE '%{$name}%' AND event LIKE '{$e_name}'
            ORDER BY name
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
        // return $sql;
    }
    public function getDataCerEvent(){
        $sql ="
            SELECT * 
            FROM tb_data_certificate as dc
            WHERE event NOT IN (SELECT e_name FROM tb_event)
            GROUP BY event
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getDataById($id){
        $sql = "
            SELECT *
            FROM tb_data_certificate
            WHERE dc_id = {$id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function delDataById($id){
        $sql ="
            DELETE 
            FROM tb_data_certificate 
            WHERE dc_id = {$id}
        ";
        $stmt = $this->pdo->query($sql);
        if($stmt){
            return true;
        }else{
            return false;
        }
    }
    public function delDataByBatch($id){
        $sql ="
            DELETE 
            FROM tb_data_certificate 
            WHERE ba_name = '{$id}'
        ";
        $stmt = $this->pdo->query($sql);
        if($stmt){
            return true;
        }else{
            return false;
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
    public function getBatchByUser($u_id){
        $sql = "
            SELECT *
            FROM tb_batch
            WHERE u_id = {$u_id}
            ORDER BY ba_date DESC
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getBatchById($id){
        $sql ="
            SELECT * 
            FROM tb_batch
            WHERE ba_name = {$id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function delBatch($id){
        $sql ="
            DELETE 
            FROM tb_batch
            WHERE ba_name = '{$id}'
        ";
        $stmt = $this->pdo->query($sql);
        if($stmt){
            return true;
        }else{
            return false;
        }
    }
    // User
    public function getUser($email,$img){
        $sql ="
            SELECT * 
            FROM tb_user
            WHERE u_email = '{$email}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if(count($data)>0){
        session_start();
        $_SESSION['certificate-login']=true;
        $_SESSION['u_id']=$data[0]['u_id'];
        $_SESSION['u_email']=$data[0]['u_email'];
        $_SESSION['u_name']=$data[0]['u_name'];
        $_SESSION['role']=$data[0]['role'];
        $_SESSION['img']=$img;
        $_SESSION['linux']=true;
        
        return $data[0];
        }else{
            return false;
        }
    }
    public function addUser($user){
        $user['u_password'] = password_hash($user['u_password'],PASSWORD_DEFAULT);
        $sql = "
            INSERT INTO tb_user (
                u_email,
                u_password, 
                u_name,
                role
                
            ) VALUES (
                :u_email,
                :u_password, 
                :u_name,
                :role
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($user);
        return true;
    }
    public function checkUser($user){
        $sql = "
        SELECT
            *
        FROM
            tb_user
        WHERE
            u_email = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user['u_email']]);
        $data = $stmt->fetchAll();
        $userDB = $data[0];
        if(password_verify($user['u_password'],$userDB['u_password'])) {
            session_start();
            $_SESSION['certificate-login']=true;
            $_SESSION['u_id']=$data[0]['u_id'];
            $_SESSION['u_email']=$data[0]['u_email'];
            $_SESSION['u_name']=$data[0]['u_name'];
            $_SESSION['role']=$data[0]['role'];
            $_SESSION['img']="/app-certificate/backend/images/logo/user.png";
            $_SESSION['linux']=true;

            return true;
        } else {
            return false;
        }
    }
    public function getAllUser(){
        $sql ="
            SELECT * FROM tb_user
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function delUser($id){
        $sql = "
            DELETE FROM tb_user WHERE u_id={$id}
        ";
        $stmt = $this->pdo->query($sql);
        if($stmt){
            return true;
        }else{
            return false;
        }
    }
    public function ChangePass($user){
        $user['u_password'] = password_hash($user['u_password'],PASSWORD_DEFAULT);
        $sql = "
            UPDATE tb_user SET u_password = :u_password WHERE u_email = :u_email
        ";
        $stmt = $this->pdo->prepare($sql);
        $ck=$stmt->execute($user);
        if($ck){
            return true;
        }else{
            return false;
        }
    }

    // Event
    public function addEvent($data){
        $sql = "
            INSERT INTO tb_event(
                e_name,
                e_img,
                e_show
            ) VALUES (
                :e_name,
                :e_img,
                :e_show
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    public function getEvent(){
        $sql ="
            SELECT * FROM tb_event
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }

}
?>