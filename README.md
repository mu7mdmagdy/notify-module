<p align="center">
	<a href="https://laravel.com" target="_blank"><img height="100px" src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>
	<a href="https://pusher.com" target="_blank"><img height="100px" src="https://pusher.com/static/pusher-logo-c34a06c6aa0c11678c5f261d23bebb03.svg" width="400"></a>
</p>
<hr>

## About Noftiy Module

This module to organize the notification process in real time without need to reload page, using PHP language with Laravel framework and Pusher. The UI is designed simple and easy to use because the main purpose of the module is to learn sending notifications using Laravel Events and Laravel Broadcast that support Pusher ( built-in )

## Tools used in Ui

- [Bootstrap](https://getbootstrap.com/).
- [Jquery](https://code.jquery.com/).
- [Font Awesome](https://fontawesome.com/v4.7/).
- [PNotify](https://sciactive.com/pnotify/).

## Backend Language

- [PHP](https://www.php.net/).

## Framework used

- [Laravel 8](https://laravel.com).

## Third party

- [Pusher](https://pusher.com).

## Demo

![Demo](demo.gif?raw=true)


## Features

- #### 🕒 Realtime
- #### 🌟 Simple Ui
- #### 🖥️ Desktop Notification
- #### 🧬 Easy to integrate with any application


## Installation

1. #### Create Account On [Pusher](https://pusher.com)
2. #### Create New Channel with any name , ex: realNotify
3. #### Clone repository on your localhost
4. #### Copy .env.example then rename it to .env
	- Set BROADCAST_DRIVER in .env file ' = pusher '
	<pre>
	BROADCAST_DRIVER=pusher
	</pre>
	- Add your pusher licences 
	<pre>
	PUSHER_APP_ID=
	PUSHER_APP_KEY=
	PUSHER_APP_SECRET=
	</pre>
5. #### Edit <code>\\Public\js\main.js</code>
	- find <code> var pusher = new Pusher('--app-key--' </code> & add yours
6. #### run <code>composer install</code>
7. #### run <code>npm install</code>
8. #### run <code>npm run dev</code>

#### Installed Successfully ✅


## Apply Desktop Notification

- #### Edit <code>\\Public\js\main.js</code>
	- find <code> new PNotify({ </code> & enable desktop like this
	<pre>
	PNotify.desktop.permission();
	new PNotify({
	type: 'info',
	text: data.content,
	desktop: {desktop: true} 
	});
	</pre>

## Code Summary
- <code>\\app\Http\Controllers\HomeController.php</code>
	<pre>
	public function pushNotification(Request $request)
	{
		$content = $request->notify_content;
		if(!empty($content)) {
			event(new NewNotification($content));
		}
	}
	</pre>
- <code>\\app\Events\NewNotification.php</code>
	<pre>
	public function __construct($content)
	{
	    $this->content = $content;
	}
	public function broadcastOn()
	{
	    return ['new-notification'];
	}
	</pre>
- <code>\\Public\js\main.js</code>
	<pre>
	// Subscribe to the channel we specified in our Laravel Event
	var channel = pusher.subscribe('new-notification');
	// Bind a function to a Event (the full Laravel class)
	channel.bind('App\\Events\\NewNotification', function (data) {
	   
	});
	</pre>
