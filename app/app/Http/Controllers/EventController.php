<?php

namespace App\Http\Controllers;


use App\Helper;
use App\Models\Events;
use App\Services\EventService;
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
    private EventService $eventService;


    public function __construct()
    {
        $this->rabbitMQManager = new RabbitMQManager();
        $this->eventService = new EventService();
    }

    public function add(Request $request) {
        try {
            $this->validate($request, ['number' => 'required|integer']);
            $this->rabbitMQManager->pushMessage($request->number);
            return Helper::successResponse([], 'New event added to queue');

        } catch(\Exception $exception) {
            return Helper::failedResponse($exception->getMessage());
        }
    }

    public function get(Request $request) {
        try {
            $this->validate($request, ['number' => 'required|integer']);

            $event = $this->eventService->getEvent($request->number);
            if (!$event) {
                throw new \RuntimeException('Event with such number not found');
            }

            return Helper::successResponse([
                'event' => $event,
            ], 'Event');

        } catch(\Exception $exception) {
            return Helper::failedResponse($exception->getMessage());
        }
    }

}
