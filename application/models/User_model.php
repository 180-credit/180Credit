<?php

Class User_model extends CI_Model {

    function Get($id = NULL, $search = array()) {
        $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);
        $this->db->from('users');
        // Check if we're getting one row or all records
        if ($id != NULL) {
            // Getting only ONE row
            $this->db->where('guid', $id);
            $this->db->limit('1');
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                // One row, match!
                return $query->row();
            } else {
                // None
                return false;
            }
        } else {
            // Get all
            if (!empty($search)) {
                $defaultSearch = array(
                    'username' => '',
                    'password' => '',
                    'reset_password_code' => '',
                    'signup_hash' => '',
                    'guid' => '',
                );
                $search = array_merge($defaultSearch, $search);
                if ($search['username'] != '') {
                    $this->db->like('username', $search['username']);
                }
                if ($search['guid'] != '') {
                    $this->db->where('guid', $search['guid']);
                }
                if ($search['password'] != '') {
                    $this->db->where('password', $search['password']);
                }
                if ($search['reset_password_code'] != '') {
                    $this->db->where('reset_password_code', $search['reset_password_code']);
                }
                if ($search['signup_hash'] != '') {
                    $this->db->where('signup_hash', $search['signup_hash']);
                }
                if (isset($search['order'])) {
                    $order = $search['order'];
                    if ($order[0]['column'] == 1) {
                        $orderby = "username " . strtoupper($order[0]['dir']);
                    }
                    $this->db->order_by($orderby);
                }
                if (isset($search['start'])) {
                    $start = $search['start'];
                    $length = $search['length'];
                    if ($length != -1) {
                        $this->db->limit($length, $start);
                    }
                }
            }
            $query = $this->db->get();
            $data["records"] = array();
            if ($query->num_rows() > 0) {
                // Got some rows, return as assoc array
                $data["records"] = $query->result();
            }
            $count = $this->db->query('SELECT FOUND_ROWS() AS Count');
            $data["countTotal"] = $this->db->count_all('users');
            $data["countFiltered"] = $count->row()->Count;
            return $data;
        }
    }


    public function getPaginationData($input){
        $this->db->reconnect();
        $this->queryBuilder($input);
        $query = $this->db->get();
        $results['count'] =$query->num_rows();
        $this->db->close();
        $this->db->reconnect();
        $this->queryBuilder($input);
        $this->db->limit($input['limit'], (($input['page'] - 1) * $input['limit']));
        $query = $this->db->get();
        $results['data'] =$query->result();
        $this->db->close();
        return $results;
    }

    private function queryBuilder($input){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_profiles', 'user_profiles.user_id = users.userId', 'INNER');
        $this->db->join('state', 'state.id = user_profiles.state_id', 'INNER');
        $this->db->where('180creditUserType',1);
    }


    function Add($data) {
        // Run query to insert blank row

        $this->db->insert('users', $data);
        // Get id of inserted record
        $guid = $this->db->insert_id();
        $this->load->library('logfunction');
        $this->logfunction->userLogRecord(12, serialize((array) $data));
        return $this->db->affected_rows();
    }

    function Edit($id, $data) {
        $this->db->where('userId', $id);
        $result = $this->db->update('users', $data);
        // Return
        if ($result) {
            return $id;
        } else {
            return false;
        }
    }

    function Delete($id) {
        $this->db->where('guid', $id);
        $this->db->delete('users');
        $this->load->library('logfunction');
        $this->logfunction->logRecord("user deleted");
    }

    function ValidateLogin($credentials) {
        $this->db->select('*', FALSE);
        $this->db->from('users');
        $this->db->where('username', $credentials['username']);
        $query = $this->db->get();
        $data["records"] = array();
        if ($query->num_rows() == 1) {
            $data["records"] = $query->result();
            if ($data['records'][0]->password != $credentials['password']) {
                $data["records"] = array();
            } else {
                $this->load->library('logfunction');
                $this->logfunction->userLogRecord(20, serialize((array) $data["records"][0]));
            }
//            print_r(array($query));die;
        }

        return $data;
    }

    function ValidateEmail($credentials) {
        $this->db->select('*', FALSE);
        $this->db->from('users');
        $this->db->where('user_email', $credentials['user_email']);
        $query = $this->db->get();
        $data["records"] = array();
        if ($query->num_rows() == 1) {
            $data["records"] = $query->row();
        }
        return $data;
    }

}
