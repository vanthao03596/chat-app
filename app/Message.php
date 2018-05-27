<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Message extends Model
{
	protected $fillable = ['message'];
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function getCreatedAtAttribute($date)
	{
		Carbon::setLocale('vi');
		setlocale(LC_TIME, 'vi');
		return Carbon::parse($date)->diffForHumans();
	}
}
