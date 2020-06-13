@extends('layouts.master')

@section('title', 'Contact us')
@section('css', 'contact')

@section('content')
    <!-- Main -->
    <main id="main">
        <form method="POST" action="" id="contact_form" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <label for="subject">Subject</label>
            <select id="subject" name="subject">
                <option value="subject">Select a subject</option>
                <option value="Quiz">Quiz</option>
                <option value="Score">Score</option>
                <option value="Other">Other</option>
            </select>
            <!-- Display errors -->
            <div class="error" id="subjectErr">
            </div>
            <!-- Message -->
            <label for="message">Your message</label>
            <textarea id="message" type="text" rows="14" name="message"></textarea>
            <!-- Display errors -->
            <div class="error" id="messageErr">
            </div>
            <label for="message">You can upload at most 4 files/pictures when contacting us!</label>
            <input type = "file" name= "picture" id = "picture">
            <input type = "file" name= "picture1" id = "picture1">
            <input type = "file" name= "picture2" id = "picture2">
            <input type = "file" name= "picture3" id = "picture3">
            <!-- Submit button -->
            <button type="submit" name="submit" id="five" class="button">
                Send
            </button>
        </form>
    </main>
@endsection
<script type="text/javascript" src="js/contact.js"></script>
