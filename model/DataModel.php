<?php
require_once PROJECT_ROOT_PATH . "/model/Database.php";

class DataModel extends Database {
  /**
   * Get the given users list.
   *
   * @param $user
   * @param $limit
   *
   * @return array
   * @throws Exception
   */
  public function getUserList( $user, $limit ) {
    return $this->select("SELECT * FROM users WHERE type='$user' ORDER BY id ASC LIMIT ?", [ "i", $limit ]);
  }

  /**
   * Get the given user data.
   *
   * @param $user
   * @param $id
   *
   * @return array
   * @throws Exception
   */
  public function getUserItem( $user, $id ) {
    return $this->select("SELECT * FROM users WHERE type='$user' AND id=?", [ "i", $id ]);
  }
}

interface DataGetListInterface {
  public function getList($limit);
}

interface DataGetInterface {
  public function getItem($id);
}

interface DataSetInterface {
  public function setItem();
}

interface DataDeleteInterface {
  public function deleteItem($ids);
}