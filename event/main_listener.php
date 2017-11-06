<?php

namespace heinrichk\searchreload\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

class main_listener implements EventSubscriberInterface
{
	/** @var \phpbb\request\request */
	protected $request;
	protected $search_id;

	public function __construct(\phpbb\request\request $request)
	{
    $this->request = $request;
	}

	
    /**
     * Assign functions defined in this class to event listeners in the core
     *
     * @return array
     */
    static public function getSubscribedEvents()
    {
        return array(
            'core.search_results_modify_search_title' => 'reload_page',
        );
    }

    /**
     * Load the Acme Demo language file
     *     acme/demo/language/en/demo.php
     *
     * @param \phpbb\event\data $event The event object
     */
    public function reload_page($event)
    {
		$request = new \phpbb\request\request();
		$search_id		= $this->request->variable('search_id', '');
		switch($search_id) {
			case 'egosearch':
			case 'newposts':
			case 'unreadposts':
			case 'unanswered':
			case 'active_topics':
				header("Refresh:60");
//				echo "Blaubeerkuchen!";
				continue;
			default:
				echo "kein Blaubeerkuchen!";
		}

    }
}