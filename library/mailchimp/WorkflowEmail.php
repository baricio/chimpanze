<?php

namespace max\mailchimp;

use \max\mailchimp\AbstractApi;

class WorkflowEmail extends AbstractApi
{
    private $uri;

    private $workflow_emails;

    private $workflow_id;

    public function __construct($workflow_id)
    {
        $this->workflow_id = $workflow_id;
        $this->uri = '/automations/' . $this->workflow_id . '/emails/';
        parent::__construct();
    }

    public function get()
    {
        $workflow_emails = $this->api->get($this->uri);

        $dados = array();
        if ($workflow_emails) {
            foreach ($workflow_emails['emails'] as $item) {
                $dados[$item['settings']['title']] = $item['id'];
            }
            $this->workflow_emails = $dados;
            return $this->workflow_emails;
        }

        return array();

    }

    public function queue($workflow_email_id)
    {

        $emails_queue = $this->api->get($this->uri . $workflow_email_id . '/queue');

        return $emails_queue;

    }

    public function queueEmails($workflow_email_id)
    {

        $emails_queue = $this->queue($workflow_email_id);;

        if ($emails_queue) {
            $emails = array();
            foreach ($emails_queue['queue'] as $item) {
                $emails[] = $item['email_address'];
            }


            return $emails;
        }

        return array();

    }

    public function queueAllEmails()
    {

        $wEmails = $this->get();

        if ($wEmails) {
            $emails = array();
            foreach ($wEmails as $key => $workflow_email_id) {
				$emails = array_merge($emails, $this->queueEmails($workflow_email_id));
			}


            return $emails;
        }

        return array();

    }
}
