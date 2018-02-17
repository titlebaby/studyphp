<?php
/**
 * Created by PhpStorm.
 * User: ilr
 * Date: 2018/2/17
 * Time: 15:17
 */

namespace Common;


class User
{
    public $db;
    public $id;
    public $name;
    public $email;
    public $updated_at;
    function __construct($id)
    {
        $this->db = new Database\MySQLi();
        $this->db->connect('127.0.0.1', 'root', '', 'test_demo');
        $res= $this->db->query("select * from users where id = $id");
        $data= mysqli_fetch_assoc($res);
//        var_dump($data);
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->updated_at= $data['updated_at'];

    }
    function update(User $user){


    }
    function __destruct()
    {
        $sql = "update users set name ='{$this->name}',email='{$this->email}', updated_at='{$this->updated_at}' where id = {$this->id}";
//        var_dump($sql);
        $res =$this->db->query($sql);
//        $num = mysqli_affected_rows($res);
//        mysqli_affected_rows($this->db,MYSQLI_ASSOC);
//        var_dump($res);
    }

}