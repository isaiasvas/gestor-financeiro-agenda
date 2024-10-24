<?php

namespace App\Observers;

use App\Models\Event;
use Carbon\Carbon;

class RecurrenceObserver
{

    public static function created(Event $event)
    {
        if (!$event->event()->exists()) {
            $recurrences = [
                'daily'     => [
                    'times'     => 365,
                    'function'  => 'addDay'
                ],
                'weekly'    => [
                    'times'     => 52,
                    'function'  => 'addWeek'
                ],
                'monthly'    => [
                    'times'     => 12,
                    'function'  => 'addMonth'
                ]
            ];
            $startTime = Carbon::parse($event->start);
            $endTime = Carbon::parse($event->end);
            $recurrence = $recurrences[$event->recurrence] ?? null;

            if ($recurrence)
                for ($i = 0; $i < $recurrence['times']; $i++) {
                    $startTime->{$recurrence['function']}();
                    $endTime->{$recurrence['function']}();
                    $event->events()->create([
                        'title'       => $event->title,
                        'start'       => $startTime,
                        'end'         => $endTime,
                        'color'       => $event->color,
                        'description' => $event->description,
                        'recurrence'  => $event->recurrence,
                      
                    ]);
                }
        }
    }

    public function updated(Event $event)
    {
        if ($event->events()->exists() || $event->event) {
            
            $startTime = Carbon::parse($event->getOriginal('start'))->diffInSeconds($event->start, false);
            $endTime = Carbon::parse($event->getOriginal('end'))->diffInSeconds($event->end, false);
            if ($event->event)
                $childEvents = $event->event->events()->whereDate('start', '>', $event->getOriginal('start'))->get();
            else
                $childEvents = $event->events;


            foreach ($childEvents as $childEvent) {
                if ($startTime)
                    $childEvent->start = Carbon::parse($childEvent->start)->addSeconds($startTime);
                if ($endTime)
                    $childEvent->end = Carbon::parse($childEvent->end)->addSeconds($endTime);
                if ($event->isDirty('title') && $childEvent->title == $event->getOriginal('title'))
                    $childEvent->title = $event->title;
                $childEvent->setsaveQuietly();
            }
        }

        if ($event->isDirty('recurrence') && $event->recurrence != 'none')
            self::created($event);
    }

    public function deleted(Event $event)
    {
        if ($event->events()->exists())
            $events = $event->events()->pluck('id');
        else if ($event->event)
            $events = $event->event->events()->whereDate('start', '>', $event->start)->pluck('id');
        else
            $events = [];

        Event::whereIn('id', $events)->delete();
    }
}
