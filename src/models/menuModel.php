<?php
class menu extends baseModel
{
    function get_Category()
    {
        $query = "SELECT * FROM loai";
        $result = $this->_query($query);
        $laythongtinloais = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $laythongtinloais[] = $row;
            }
        }
        return $laythongtinloais;
    }
}
?>