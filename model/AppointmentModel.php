<?php

class AppointmentModel extends DataModel implements DataGetInterface, DataSetInterface, DataDeleteInterface {
  /**
   * Save the data and return the data.
   *
   * @return array
   * @throws Exception
   */
  public function setItem() {
    $params = array("doctorID", "patientID", "scheduleID");
    $params_values = array();
    foreach ( $params as $key ) {
      $params_values[] = isset($_POST[$key]) ? "'" . (int) $_POST[$key] . "'" : "";
    }

    $params[] = "status";
    $params_values[] = "'booked'";
    $insert_id = $this->insert("INSERT INTO appointments (" . implode(",", $params) . ") VALUES (" . implode(",", $params_values) . ")");

    return $this->getItem($insert_id);
  }

  /**
   * Return the data by ID.
   *
   * @param $id
   *
   * @return array
   * @throws Exception
   */
  public function getItem( $id ) {
    return $this->select("SELECT appointments.*, doctors.name as doctor_name, patients.name as patient_name, schedule.time  FROM appointments
         LEFT JOIN users as doctors on doctors.id=appointments.doctorID
         LEFT JOIN users as patients on patients.id=appointments.patientID
         LEFT JOIN schedule on schedule.id=appointments.scheduleID
         WHERE appointments.id=?", [ "i", $id ]);
  }

  /**
   * Delete the given item.
   *
   * @param $ids
   *
   * @return array
   * @throws Exception
   */
  public function deleteItem($ids) {
    return $this->delete("DELETE FROM appointments WHERE doctorID='$ids[0]' AND scheduleID='$ids[1]'");
  }
}