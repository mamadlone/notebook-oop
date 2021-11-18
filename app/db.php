<?php

class db
{
  protected $pdo;
  private $db;
  private $user;
  private $pass;
  private $tbl;

  public function __construct($db="note_book",$user = "root", $pass="")
  {
    date_default_timezone_set('Asia/Tehran');
    $this->db = $db;
    $this->user = $user;
    $this->pass = $pass;
    $this->connction();
  }

  public function connction()
  {
    try
    {
      $this->pdo = new PDO("mysql:host=localhost;dbname={$this->db}", $this->user, $this->pass);
    }
    catch(Exception $e)
    {
      $e->getMessage();
    }
  }

  public function setTbl($tbl)
  {
    $this->tbl = $tbl;
  }

  public function searchData($name, $val)
  {
    $sql = $this->pdo->prepare("SELECT * FROM {$this->tbl} WHERE $name = '$val'");
    $sql->execute();
    $res = $sql->fetch(PDO::FETCH_OBJ);
    return $res;
  }

  public function insertData($filds, $data)
  {
    if(is_array($data))
    {
      $names = "'" . implode("','" , $data) . "'";
      $filds = implode("," , $filds);

      $sql = $this->pdo->prepare("INSERT INTO {$this->tbl} ($filds) VALUES ($names)");
      $sql->execute();
    }
  }

  public function selectData($name)
  {

    if(is_array($name))
    {
      $names = "'" . implode("','",$name) . "'";
      $sql = $this->pdo->prepare("SELECT {$names} FROM {$this->tbl} ");
    }else
    {
      $sql = $this->pdo->prepare("SELECT {$name} FROM {$this->tbl} ORDER BY {$this->tbl}.`date` DESC");
    }
    
    $sql->execute();
    $row = $sql->fetchAll(PDO::FETCH_OBJ);
    return $row;
  }

  public function searchNote($name, $key)
  {
    $sql = $this->pdo->prepare("SELECT * FROM {$this->tbl} WHERE $name = '$key'");
    $sql->execute();
    $results = $sql->fetch(PDO::FETCH_OBJ);
    return $results;
  }

  public function likeData($name, $value)
  {
    $sql = $this->pdo->prepare("SELECT * FROM {$this->tbl} WHERE $name LIKE '%$value%'");
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_OBJ);
    return $results;
  }

  public function deleteData($id)
  {
    $sql = $this->pdo->prepare("DELETE FROM {$this->tbl} WHERE id=$id");
    $sql->execute();
  }

  public function editData($filds, $data, $id)
  {
    foreach ($filds as $key => $val)
    {
      $txt[] = $val . " = '" . $data[$val] . "'";
    }
    $query = implode(' , ', $txt);
    $sql = $this->pdo->prepare("UPDATE {$this->tbl} SET ".$query." WHERE id = '$id'");
    $sql->execute();
  }

  public function showContact($id)
  {
    $sql = $this->pdo->prepare("select * from {$this->tbl} where id = $id");
    $sql->execute();
    $res = $sql->fetch(PDO::FETCH_OBJ);
    return $res;
  }

}