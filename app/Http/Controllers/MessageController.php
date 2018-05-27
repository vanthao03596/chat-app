<?php

namespace App\Http\Controllers;

use App\Events\MessagePosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
	public function index()
	{
		return \App\Message::with('user')->get();
	}
	public function store()
	{
		$user = Auth::user();
		$message = $user->messages()->create([
			'message' => request('message')
		]);
		broadcast(new MessagePosted($message, $user))->toOthers();
	}
}
