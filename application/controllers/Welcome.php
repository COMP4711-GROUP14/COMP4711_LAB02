<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 'what' => $record['what'], 'mug' => $record['mug'], 'href' => $record['where']);
		}
		$this->data['authors'] = $authors;

		$this->render();
	}

	public function random()
    {
        $this->data['pagebody'] = 'homepage';

        // build the list of authors, to pass on to our view
        $source = $this->quotes->all();
        $authors = array ();
        $authorcount = count($source);
        $random = rand() % $authorcount;
        $authors[] = array ('who' => $source[$random]['who'], 'what' => $source[$random]['what'], 'mug' => $source[$random]['mug'], 'href' => $source[$random]['where']);
        $this->data['authors'] = $authors;

        $this->render();
    }

}
