<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'lessons';

    protected $fillable = [
        'title',
        'day',
        'date_start',
        'date_end',
        'hour',
    ];

    public $orderable = [
        'id',
        'title',
        'day',
        'date_start',
        'date_end',
        'hour',
    ];

    protected $dates = [
        'date_start',
        'date_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $filterable = [
        'id',
        'title',
        'day',
        'date_start',
        'date_end',
        'hour',
        'student.lastname',
    ];

    public const DAY_SELECT = [
        '0' => 'Lundi',
        '1' => 'Mardi',
        '2' => 'Mercredi',
        '3' => 'Jeudi',
        '4' => 'Vendredi',
        '5' => 'Samedi',
        '6' => 'Dimanche',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDayLabelAttribute($value)
    {
        return static::DAY_SELECT[$this->day] ?? null;
    }

    public function getDateStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateStartAttribute($value)
    {
        $this->attributes['date_start'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateEndAttribute($value)
    {
        $this->attributes['date_end'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function student()
    {
        return $this->belongsToMany(Student::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
