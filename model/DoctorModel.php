<?php

class DoctorModel extends DataModel implements DataGetListInterface, DataGetInterface {
  /**
   * Return the list of items.
   *
   * @param $limit
   *
   * @return array
   */
  public function getList( $limit ) {
    return $this->getUserList('doctor', $limit);
  }

  /**
   * Return the data by ID.
   *
   * @param $id
   *
   * @return array
   */
  public function getItem( $id ) {
    return $this->getUserItem('doctor', $id);
  }
}