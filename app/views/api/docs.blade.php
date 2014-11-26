@extends('layouts.main')

@section('content')

<div class="top-buffer"></div>
<div class="container">
	<h1>API Documentation</h1>
	<h2>Generate a new schedule</h2>
	<h3><b>Request:</b>  POST /api/new</h3>
	<pre class="line-numbers language-json"><code class="language-json">{
	"api-key"	:	"yourApiKey",
	"events"	:	[
		{
			"id"			:	your-event-id,
			"name"			:	"Event Name",
			"constraints"	:	[
				{
					"key"	:	value,
					"type"	:	hard/soft
				}
				{
					"key"	:	value,
					"type"	:	hard/soft
				}
				...
			]
		},
		{
			"id"			:	your-event-id,
			"name"			:	"Event Name",
			"constraints"	:	[
				{
					"key"	:	value,
					"type"	:	hard/soft
				}
				{
					"key"	:	value,
					"type"	:	hard/soft
				}
				...
			]
		},
		...
	],
	"resources"	:	[
		{
			"id"			:	your-resource-id,
			"name"			:	"Resource Name",
			"type"			:	venue/person/other,
			"constraints"	:	[
				{
					"key"	:	value,
					"type"	:	hard/soft
				},
				{
					"key"	:	value,
					"type"	:	hard/soft
				},
				...
			]
		},
		{
			"id"			:	your-resource-id,
			"name"			:	"Resource Name",
			"type"			:	venue/person/other,
			"constraints"	:	[
				{
					"key"	:	value,
					"type"	:	hard/soft
				},
				{
					"key"	:	value,
					"type"	:	hard/soft
				},
				...
			]
		},
		...
	]
}</code></pre>
<h3><b>Response:</b></h3>
	<pre class="line-numbers language-json"><code class="language-json">{
	"schedule"		:	[
		{
			"eventID"	:	id,
			"days"		:	["Mon", "Wed", ... ],
			"time"		:	"HH:MM",
			"uses"		:	[resourceID, resourceID, ... ]
		},
		{
			"eventID"	:	id,
			"days"		:	["Mon", "Wed", ... ],
			"time"		:	"HH:MM",
			"uses"		:	[resourceID, resourceID, ... ]
		},
		...
	],
	"unsatisfied"	:	[contraintID, constraintID, ... ]
}</code></pre>

<hr>

<h2>Check a schedule for conflicts</h2>
	<h3><b>Request:</b>  POST /api/check</h3>
	<pre class="line-numbers language-json"><code class="language-json">{
	"api-key"	:	"yourApiKey",
}</code></pre>
	<h3><b>Response:</b></h3>
	<pre class="line-numbers language-json"><code class="language-json">{
	"unsatisfiedSoft"	:	[constraintID, constraintID, ... ],
	"unsatisfiedHard"	:	[constraintID, constraintID, ... ]
}</code></pre>
</div>
<div class="top-buffer"></div

@stop