<?php

class ScheduleModel extends DataModel implements DataGetInterface {
  /**
   * Return the data by ID.
   *
   * @param $id
   *
   * @return array
   * @throws Exception
   */
  public function getItem( $id ) {
    $appointments = $this->select("SELECT scheduleID FROM appointments WHERE status='booked' AND doctorID=?", [ "i", $id ]);
    $schedule = $this->select("SELECT * FROM schedule");

    $booked_appointments = array();
    foreach ($appointments as $appointment) {
      $booked_appointments[] = $appointment["scheduleID"];
    }

    foreach ( $schedule as $key => $item ) {
      if ( in_array($item['id'], $booked_appointments) ) {
        $schedule[$key]['booked'] = TRUE;
       }
    }
    return $schedule;
  }
}