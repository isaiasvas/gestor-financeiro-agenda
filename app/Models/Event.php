<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    public $table = 'events';

    protected $fillable = ['title', 'start', 'end', 'color', 'description', 'recurrence', 'event_id', 'id'];

    public const RECURRENCE_RADIO = [
        'none'    => 'Não Repetir',
        'daily'   => 'Diario',
        'weekly'  => 'Semanal',
        'monthly' => 'Mensal',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'event_id', 'id');
    }

    public function getStartAttribute($value)
    {
        $dateStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
        $timeStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');
        return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value);
    }

    public function getEndAttribute($value)
    {
        $dateEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
        $timeEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');
        return $this->end = ($timeEnd == '00:00:00' ? $dateEnd : $value);
    }


    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function setsaveQuietly()
    {
        return static::withoutEvents(function () {
            return $this->save();
        });
    }
}
