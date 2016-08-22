<?php

namespace max\mailchimp\entity;

class Membro{
	private $email_address;
	private $status;

	public function __construct(){
		$this->status = 'subscribed';
	}

	public function send(){
		return array(
			'email_address' => $this->email_address,
            'status'        => $this->status);
	}

    /**
     * Gets the value of email_address.
     *
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * Sets the value of email_address.
     *
     * @param mixed $email_address the email address
     *
     * @return self
     */
    public function setEmailAddress($email_address)
    {
        $this->email_address = $email_address;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}