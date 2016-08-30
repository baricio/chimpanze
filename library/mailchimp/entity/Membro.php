<?php

namespace max\mailchimp\entity;

class Membro{
	private $email_address;
	private $status;
    private $interests;
    private $merge_fields;

	public function __construct(){
		$this->status = 'subscribed';
	}

	public function send(){

        $dados = array(
            'email_address' => $this->email_address,
            'status'        => $this->status
        );

        if($this->getInterests()){
            $dados['interests'] = $this->getInterests();
        }

        if($this->getMergeFields()){
            $dados['merge_fields'] = $this->getMergeFields();
        }

		return $dados;
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

    /**
     * Gets the value of interests.
     *
     * @return mixed
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * Sets the value of interests.
     *
     * @param mixed $interests the interests
     *
     * @return self
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;

        return $this;
    }

     /**
     * Gets the value of merge_fields.
     *
     * @return mixed
     */
    public function getMergeFields()
    {
        return $this->merge_fields;
    }

    /**
     * Sets the value of merge_fields.
     *
     * @param mixed $interests the merge_fields
     *
     * @return self
     */
    public function setMergeFields($merge_fields)
    {
        $this->merge_fields = $merge_fields;

        return $this;
    }
}