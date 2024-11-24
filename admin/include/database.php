<?php
class DB
{
    private $host = "localhost";
    private $user = "root";
    private $pas = "";
    private $db = "project";
    private $conn = false;
    private $mysqli = "";
    private $result = array();
    function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->host, $this->user, $this->pas, $this->db);
            $this->conn = true;
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                // return false;
            }
        } else {
            // return true;
        }
    }
    function insert($table, $para = array())
    {
        // print_r($para);
        if ($this->tableExist($table)) {
            $tab_col = implode(', ', array_keys($para));
            $tab_val = implode("', '", $para);
            $sql = "INSERT INTO $table ($tab_col) VALUES ('$tab_val')";
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            } else {

                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }
    function update($table, $para = array(), $where = null)
    {
        // print_r($para);
        if ($this->tableExist($table)) {
            $arg = array();
            foreach ($para as $key => $val) {
                $arg[] = "$key='$val'";
            }
            $sql = "UPDATE $table SET " . implode(', ', $arg);
            if ($where != null) {
                $sql .= "WHERE $where";
            }

            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {

                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }
    function delete($table, $where = null)
    {
        // print_r($para);
        if ($this->tableExist($table)) {

            $sql = "DELETE FROM $table";
            if ($where != null) {
                $sql .= " WHERE $where";
            }

            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {

                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }
    public function select($table, $row = "*", $where = null, $join = null, $order = null, $limit = null)
    {
        // print_r($para);
        if ($this->tableExist($table)) {

        $sql = "SELECT $row FROM $table";
        if ($join != null) {
            $sql .= " $join";
        }
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        if ($order != null) {
            $sql .= " ORDER BY $order";
        }
        if ($limit != null) {
            $sql .= " LIMIT $limit";
        }


        if ($this->mysqli->query($sql)) {
            $query = $this->mysqli->query($sql);
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return $this->result;
        } else {
            array_push($this->result, $this->mysqli->error);
            return false;
        }
        }
    }



    private function tableExist($table)
    {
        $sql = "SHOW TABLES FROM $this->db LIKE '$table'";
        $run = $this->mysqli->query($sql);
        if ($run) {
            return true;
        } else {
            array_push($this->result, $table . "Table not exist in this database");
            return false;
        }
    }
    public function getresult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }
    public function getstr($str)
    {
        return mysqli_real_escape_string($this->mysqli, $str);
    }
    public function getLatestInvoiceId() {
        $sql = "SELECT userinvoice FROM pos_userinfo ORDER BY userid DESC LIMIT 1";
        $query = $this->mysqli->query($sql);
        if ($query && $query->num_rows > 0) {
            $result = $query->fetch_assoc();
            return intval($result['userinvoice']);
        } else {
            return null;
        }
    }
    
    function __destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
                // return true;
            }
        } else {
            // return false;
        }
    }
}
