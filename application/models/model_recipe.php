<?php

class Model_Recipe extends Model
{
    public function get_data()
    {
        return $data = $this->connectDB("SELECT * FROM `ingredient`");
    }

    public function get_data2()
    {
        return $data2 = $this->connectDB("SELECT * FROM `recepts`");
    }

    private function connectDB($query)
    {
        $link = mysqli_connect("localhost", "root", "", "recepts") or die(mysqli_error());
        $rs = mysqli_query($link, $query);
        $data = array();
        while ($row = mysqli_fetch_array($rs)) {
            $data[$row['id']] = $row;
        }
        mysqli_close($link);
        return $data;
    }
}