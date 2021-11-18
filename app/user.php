<?php
include_once 'db.php';
class user extends db
{
  protected $tbl = 'user';

  public function login($data)
  {
    $email = $data['email'];
    $pass = $data['password'];
    $this->setTbl($this->tbl);
    $user_data = $this->searchData('email', $email);

    if($pass == $user_data->password)
    {
      $_SESSION['name'] = $user_data->name;
      header("location:dashboard.php");
    }else{
      header("location:index.php?login=no");
    }
  }

  public function logout()
  {
    session_destroy();
    header("location:index.php");
  }
}