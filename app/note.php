<?php
include_once 'db.php';
class note extends db
{
  protected $tbl = 'note';

  public function sendNote($data){
    $this->setTbl($this->tbl);
    $filds = array_keys($data);
    $this->insertData($filds, $data);
  }

  public function listNote(){
    $this->setTbl($this->tbl);
    $result = $this->selectData('*');
    return $result;
  }

  public function post_content($txt){
    $txt = substr($txt,0,120);
    $txt = $txt." ...";
    return $txt;
  }
}