<?php
namespace App\Models;

class ProfileModel
{
    private $id;

    private $firstname;

    private $lastname;

    private $address;

    private $phone;

    private $email;

    private $user_id;

    /**
     *
     * @param
     *            $firstname
     * @param
     *            $lastname
     * @param
     *            $address
     * @param
     *            $phone
     * @param
     *            $email
     * @param
     *            $user_id
     */
    public function __construct($firstname, $lastname, $address, $phone, $email, $user_id)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     *
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     *
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     *
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     *
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     *
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     *
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     *
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
}