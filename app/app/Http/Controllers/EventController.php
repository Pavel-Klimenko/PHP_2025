<?php

namespace App\Http\Controllers;

use App\Services\RabbitMQManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private RabbitMQManager $rabbitMQManager;


    public function __construct()
    {
        $this->rabbitMQManager = new RabbitMQManager();
    }

    public function addEvent(Request $request) {
        $this->validate($request, [
            'event' => 'required|string',
        ]);


        $this->rabbitMQManager->pushMessage($request->event);
    }
}
