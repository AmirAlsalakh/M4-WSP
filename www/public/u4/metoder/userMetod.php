<?php
class UserAuth
{
    private $filename;

    public function __construct($filename = "../../include4/msg.dat")
    {
        $this->filename = $filename;
    }

    public function uname($uname)
    {
        if (!file_exists($this->filename)) {
            return false;
        }

        $person = unserialize(file_get_contents($this->filename));
        if (!is_array($person)) {
            return false;
        }
        foreach ($person as $user) {
            if ($user['UserName'] === $uname) {
                    session_regenerate_id(true);
                    $_SESSION['inloggad'] = true;    // Användaren har anget rätt uppgifter.
                    $_SESSION['user'] = $user['UserName'];
                    return true;
                } else {
                    return false;
                }
            }
        }
    }