<?php

class PatientModel extends DataModel implements DataGetListInterface, DataGetInterface, DataSetInterface {
  /**
   * Return the list of items.
   *
   * @param $limit
   *
   * @return array
   */
  public function getList( $limit ) {
    return $this->getUserList('patient', $limit);
  }

  /**
   * Return the data by ID.
   *
   * @param $id
   *
   * @return array
   */
  public function getItem( $id ) {
    return $this->getUserItem('patient', $id);
  }

  /**
   * Save the data and return the data.
   *
   * @return array
   * @throws Exception
   */
  public function setItem() {
    $params = array("type", "name", "email", "password");
    $params_values = array();
    foreach ( $params as $key ) {
      $params_values[] = isset($_POST[$key]) ? "'" . $_POST[$key] . "'" : "";
    }

    $insert_id = $this->insert("INSERT INTO users (" . implode(",", $params) . ") VALUES (" . implode(",", $params_values) . ")");

    return $this->getItem($insert_id);
  }
}