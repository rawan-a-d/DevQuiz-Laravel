@extends('layouts.master')
@section('sessions')
    @parent
    <?php

//
//$subject = $message = "";
//
///* If post request */
//if($_SERVER["REQUEST_METHOD"] == "POST") {
//    $subject = htmlspecialchars(trim($_POST["subject"]));
//    $message = htmlspecialchars(trim($_POST["message"]));
//
//    // Get user id
//    $userId = $_SESSION['userId'];
//
//    // Create message controller object
//    $controller = new MessageController();
//    // Send message
//    $controller->addMessage($userId, $subject, $message);
//}
    ?>
@endsection

@section('title', 'Contact us')
@section('css', 'contact')

@section('content')
    <!-- Main -->
    <main id="main">
        <form method="POST" action="" id="contact_form">
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
            <!-- Submit button -->
            <button type="submit" name="submit" id="five" class="button">
                Send
            </button>
        </form>
    </main>
    <!-- Succes message -->
    <div id="modal-container">
        <div class="modal-background">
            <div class="modal">
                <h2>Thanks for your message</h2>
                <p>We'll get back to you as soon as possible!</p>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript" src="js/contact.js"></script>
