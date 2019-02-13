<?php namespace AdilShahzad\Reliefwebapi\Components;

use Cms\Classes\ComponentBase;

class Report extends ComponentBase
{
    public $reports;
    public function componentDetails()
    {
        return [
            'name'        => 'API Report',
            'description' => 'Reports related information'
        ];
    }

    public function defineProperties()
    {
        return [
         'appname' => [
                 'title'             => 'Your application name',
                 'description'       => 'This parameter allows ReliefWeb to monitor API usage and adapt it to user needs.',
                 'default'           => NULL,
                 'type'              => 'string',
                 'validationPattern' => '^[0-9a-zA-Z\s]+$',
                 'validationMessage' => 'Appname is required.'
            ],

        // Set the number of document to return.
         'numberOfItems' => [
                 'title'             => 'No. of Items',
                 'description'       => 'Number of items to show.',
                 'default'           => 5,
                 'type'              => 'string',
                 'validationPattern' => '^[0-9]+$',
                 'validationMessage' => 'Only numeric symbols are allowed.'
            ],
        // Set the how the results should be sorted.
         'sortItems' => [
                 'title'             => 'Sort Items By',
                 'description'       => 'Sort items by',
                 'default'           => NULL,
                 'type'              => 'string',
            ],   
          ]; 
    }

    public function onRun()
    {
        // Create a client.
        $client = new \RWAPIClient\Client();

        // Set the name of the application or website using the API.
        $appname = $this->property('appname');
        $client->appname($appname);

        // Create a query to a resource.
        $query = new \RWAPIClient\Query('reports', $client);

        // Set the number of document to return.
        $numberOfItems = $this->property('numberOfItems');
        $query->limit($numberOfItems);

        // Set the fields to include in the results.
        $query->fields(array('title', 'country.name', 'status', 'url_alias', 'date.created'));

        // Set the how the results should be sorted.
        $query->sort('date', 'desc');
        
        // Run the query.
        $results = $query->execute();

        // Display the title of the returned resource items.
        $this->reports = $results->items();
    }    
}
