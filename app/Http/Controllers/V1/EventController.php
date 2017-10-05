<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/5/2017
 * Time: 10:20 AM
 */

namespace App\Http\Controllers\V1;


use App\Repositories\EventRepository;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Validator;

class EventController extends Controller
{

    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        parent::__construct();
        $this->eventRepository = $eventRepository;
    }

    public function addEvent()
    {
        return view('admin.addevent');
    }

    public function postEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'start-date' => 'required',
            'end-date' => 'required',
        ]);

        $message = array(
            'type' => 'error',
            'content' => null);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $message['content'] = $errors->all();
            return view('admin.addevent', compact('message'));
        }

        $now = Carbon::now();
        $startDate = new DateTime($request->get('start-date'));
        $endDate = new DateTime($request->get('end-date'));
        $currentDate = new DateTime($now->toDateString());

        if ($startDate < $currentDate) {
            $message['content'][] = 'The start event must after or equal the current date!';
        }
        if ($endDate < $currentDate) {
            $message['content'][] = 'The start event must after or equal the current date!';
        }
        if ($endDate < $startDate) {
            $message['content'][] = 'The end event must after or equal the start event!';
        }


        $data = array();
        $data['title'] = $request->get('title');
        $data['date_start'] = $request->get('start-date');
        $data['date_end'] = $request->get('end-date');
        $data['description'] = $request->get('description');

        $rs = $this->eventRepository->create($data);
        if (!isset($rs)) {
            $message['content'][] = 'Error! Add event has been error.';
        }

        if ($message['content'] !== null) {
            return view('admin.addevent', compact('message'));
        }
        return redirect('admin/foods');
    }

    public function getAllEvent()
    {
        $events = $this->eventRepository->all();
        return view('admin.events', compact('events'));
    }

    public function getActiveEvent()
    {

    }
}