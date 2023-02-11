<?php
namespace App\Entity;
class index{
        private $username;
        private $password;

        

        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         */ 
        public function setUsername($username)
        {
                $this->username = $username;
        }




        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         */ 
        public function setPassword($password)
        {
                $this->password = $password;
        }
}
?>