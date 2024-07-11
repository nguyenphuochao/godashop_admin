<?php
class StaffRepository extends BaseRepository
{
    function fetAll($condition = null)
    {
        global $conn;
        $sql = "SELECT * FROM staff";

        if ($condition) {
            $sql .= " WHERE $condition";
        }

        $result = $conn->query($sql);
        $staffs = [];

        while ($row = $result->fetch_assoc()) {
            $staff = new Staff(
                $row['id'],
                $row['role_id'],
                $row['name'],
                $row['mobile'],
                $row['username'],
                $row['password'],
                $row['email'],
                $row['is_active']
            );
            $staffs[] = $staff;
        }

        return $staffs;
    }

    function getAll()
    {
        return $this->fetAll();
    }

    function find($id)
    {
        $condition = "id = $id";
        $staffs = $this->fetAll($condition);
        $staff = current($staffs);
        return $staff;
    }

    function findByUserNamePassWord($username, $password)
    {
        $condition = "username = '$username' AND password = '$password'";
        $staffs = $this->fetAll($condition);
        $staff = current($staffs);
        return $staff;
    }

    function findEmail($email)
    {
        $condition = "email = '$email'";
        $staffs = $this->fetAll($condition);
        $staff = current($staffs);
        return $staff;
    }

    function update($staff)
    {
        global $conn;
        $id = $staff->getID();
        $role_id = $staff->getRoleID();
        $name = $staff->getName();
        $mobile = $staff->getMobile();
        $username = $staff->getUsername();
        $password = $staff->getPassword();
        $email = $staff->getEmail();
        $is_active = $staff->getIsActive();
        
        $sql = "UPDATE staff SET 
                role_id = $role_id,
                name = '$name',
                mobile = '$mobile',
                username = '$username',
                password = '$password',
                email = '$email',
                is_active = '$is_active'
                WHERE id = $id";

        if ($conn->query($sql)) {
            return true;
        }
        $this->error =  "Error:" . $sql . PHP_EOL . $conn->error;
        return false;
    }
}
