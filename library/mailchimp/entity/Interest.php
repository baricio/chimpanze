<?php

namespace max\mailchimp\entity;

class Interest{

	private $title;
	private $id;

	function __construct($id,$title)
	{
		$this->id = $id;
		$this->title = $title;
	}

	public function send(Array $interests, $intrest_id){
		$dados = array();
		foreach ($interests as $item) {
			if($item->id == $intrest_id){
				$dados[$item->id] = true;
			}else{
				$dados[$item->id] = false;
			}
		}
		return $dados;
	}

    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}