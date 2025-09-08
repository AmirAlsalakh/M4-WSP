<?php

class User
{
    public $fname;
    public $lname;
    public $uname;
    public $password;

    public function __construct($fname, $lname, $uname, $password)
    {
        $this->fname = $this->cleanData($fname);
        $this->lname = $this->cleanData($lname);
        $this->uname = $this->cleanData($uname);
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    private function cleanData($data)
    {
        $data = strip_tags($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }

    public function save($filename = "../../include4/msg.dat")
    {
        $users = [];
        if (file_exists($filename)) {
            $users = unserialize(file_get_contents($filename));
            if (!is_array($users)) {
                $users = [];
            }
        }

        $users[] = [
            "FirstName" => $this->fname,
            "LastName"  => $this->lname,
            "UserName"  => $this->uname,
            "Password"  => $this->password
        ];

        file_put_contents($filename, serialize($users));
    }
}
?>