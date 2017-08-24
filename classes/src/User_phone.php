<?php

/**
 * 
 * @author Ravi Chaudhary
 * @Entity @Table(name="user_phone")
 */
Class User_phone{
	/** @Id @Column(type="integer") @GeneratedValue **/
	public $phone_id;
	/** @Column(type="string") **/
	public $number;
	/** @ManyToOne(targetEntity="User") **/
	public $user_id;

    /**
     * Get phone_id
     *
     * @return integer 
     */
    public function getPhoneId()
    {
        return $this->phone_id;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return User_phone
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set user_id
     *
     * @param \User $userId
     * @return User_phone
     */
    public function sestUserId(\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return \User 
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
