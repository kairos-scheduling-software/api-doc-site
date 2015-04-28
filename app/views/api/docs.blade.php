@extends('layouts.main')

@section('content')

<div class="top-buffer"></div>
<div class="container">
<div class="col-md-8" style="margin-bottom: 40px">
<h1>API Documentation</h1>
<h2><b>Request:</b>  POST /api/new</h2>
<h3>Used to generate a new schedule.</h3>
<h4><b>Param&#58;</b> JSON string formatted as below.</h4>
<h5><b>Required fields&#58;</b> EVENTS, SPACES</h5>
<h5><b>Optional fields&#58;</b> TIMES, CONSTRAINTS</h5>
<pre class="line-numbers language-json"><code class="language-json">{
  "api-key" : &lt;your_api_key&gt;,
  "EVENTS"      : [
    "event"      : {
      "id"		         :  &lt;int&gt;,
      "maxParticipants"  :  &lt;int&gt;,
      "personId"         :  &lt;int&gt;,
      "time"             :  Time Object OR &lt;int&gt;,
      "spaceId"          :  &lt;int&gt; OR &lt;int&gt array;
    },
      ...
  ]
  "SPACES"      : [
    "space"      : {
      "id"                : &lt;int&gt;,
      "capacity"          : &lt;int&gt;
    },
      ...
  ]
  "TIMES"       : [
    "time"       : {
      "id"                : optional &lt;int&gt;,
      "duration"          : &lt;int&gt;,
      "startTimes"        : Object where key = days and value = possible_start_times
    },
      ...
  ]
  "CONSTRAINTS" : [
    "constraint" : Object where key = &quot;&lt;&quot;,&quot;&gt;&quot;,OR&quot;=&quot;, value = array of pair of events,
    ...
  ]
}</code></pre>
<h5>If an &lt;int&gt; is used for "EVENTS"&gt;"event"&gt;"time", then it refers to the "id" field in "TIMES"&gt;"time".</h5>
<h5>If "EVENTS"&gt;"event"&gt;"spaceId" is a single &lt;int&gt; then that event must be in the space corresponding to that value in "SPACES"&gt;"space"&gt;"id".  If it is an array then it can be in any of the referenced space ids.  If it is ommited then the event may be held in any space with sufficient capacity.</h5>
<h5>The format for the keys in "TIMES"&gt;"time"&gt;"startTimes" is one or more letters from {M,T,W,H,F,S,U} (where "M" is Monday, "T" is Tuesday, ..., "U" is Sunday) with no spaces or other punctuation.  For example, "MW", "T", "HSU" are all valid keys.</h5>
<h5>The format for the values in "TIMES"&gt;"time"&gt;"startTimes" is a string consisting of four numerical digits where "0000" represents midnight and "2359" represents 11:59PM.  For example, "0940" represents a start time of 9:40AM, and "1530" represents a start time of 3:30PM.</h5>
<h5>When supplying constraints using "CONSTRAINTS"&gt;"constraint", the keys are defined:  "&lt;" means the first event ends before the second event starts, "&gt;" means the first event starts after the second event begins, "=" means the events have identical start and end times.</h5>
<br/>
<h4><b>Return&#58;</b> JSON string representing the solved schedule.  If there exist any unresolvable conflicts in the schedule as provided by the user, the "unsatisfied" field in the returned JSON string will show which constraints were violated.  The constraintID may be used to locate which event(s) were part of the violated constraint.</h4>
<h3><b>Response:</b></h3>
	<pre class="line-numbers language-json"><code class="language-json">{
  "schedule"   : 
  {
    "wasFailure" : &lt;bool&gt;,
    "EVENTS"     : [
      {
	    "id"            : &lt;int&gt;,
	    "wasFailure"    : true
      },
      {
        "id"            : &lt;int&gt;,
	    "time"          : {
	      "startTime" : &lt;string&gt;,
	      "days"      : &lt;string&gt;, 
		},
	    "conflictsWith" : &lt;int&gt; array,
	    "spaceId"       : &lt;int&gt;
      },
      ...         
    ]
  }
}</code></pre>
<h5>The field "wasFailure" indicates whether the schedule as a whole was successfully created.</h5>
<h5>The field "EVENTS"&gt;"wasFailure" indicates whether a particular event was successfully added to the schedule.  It is possible for a schedule to be successfully created if some events are not successfully scheduled.</h5>
<h5>The field "EVENTS"&gt;"wasFailure" will only appear in the return JSON string if that event was not successfully scheculed.  Otherwise, the JSON string will include the start time, days, and space for a scheduled event along with any other events that this one conflicts with.</h5>

<hr>

<h2><b>Request:</b>  POST /api/check</h2>
<h3>Used to check whether any conflicts exist in a schedule and, if so, which events conflict with which other events.</h3>
<h4><b>Param&#58;</b> JSON string formatted identically to that for generating a new schedule above.</h4>
<h4><b>Return&#58;</b> JSON string that indicates whether the schedule as a whole contained any unsatisfiable constraints and also indicates for each event in the schedule whether it was able to be scheduled and/or whether it conflicted with any other events.</h4>
<h3><b>Response:</b></h3>
<pre class="line-numbers language-json"><code class="language-json">{
  "wasFailure" : &lt;bool&gt;,
  "EVENTS" : [
  {
    "id"            : &lt;int&gt;,
	"conflictsWith" : &lt;int&gt; array,
  },
  {
    "id"            : &lt;int&gt;,
	"wasFailure"    : true
  },
  ...
  ]
}</code></pre>

  <h2> Test API </h2>

  <form id="example-form" action="{{URL::route('example')}}" method="POST">
    Mode:
    <select id="mode" class="form-control inputsize">
      <option class="inputsize" value="new">new</option>
      <option class="inputsize" value="check">check</option>
    </select>
    </br></br>
    Enter Json: 
    </br>
    <textarea class="form-control" cols="100" rows="10" id="json">
    </textarea>
    </br>
    <input id="submit" class="btn btn-primary" type='submit' name='submit' value='Send JSON to solver'></input></br>

    <div id="example-response-text"></div>
  </form>

</div>
</div>

@stop