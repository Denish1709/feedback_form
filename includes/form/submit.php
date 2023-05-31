<?php

    // load database
    $database = connectToDB();

    // load all the questions
    $sql = 'SELECT * FROM questions';
    $query = $database->prepare($sql);
    $query->execute();
    $questions = $query->fetchAll();

    // get the name & email from the POST data

    /* 
        do error checking
        - make sure the name & email fields are not empty
        - make sure all the questions are answered
    */


    // loop through all the questions to make sure all the answers are set
    foreach ( $questions as $question ) {
        // use isset() to check if there is an answer for the question. If this is no answer, assign the error message to $error
        if ( !isset( $_POST['q'.$question['id']] ) ) {
            $error = "Please kindly answer all the questions below";
        }
    }

    // if $error is set, redirect to home page
    if ( isset( $error ) ) {
        $_SESSION['error'] = $error;
        header( 'Location: /' );
        exit;
    }

    // if no error, loop through all the questions to insert the answer to the results table
    foreach ( $questions as $question ) {
        // sql recipe
        $sql = "INSERT INTO results ( user_id, question_id, answer ) VALUES ( :user_id, :question_id, :answer )";
        // prepare
        $query = $database->prepare($sql);
        // execute
        $query->execute([
        'user_id'=>$_SESSION['user']['id'],
          'question_id'=>$question['id'],
          'answer'=>$_POST['q'.$question['id']]
        ]);
    }


    // set success message
    $_SESSION["success"] = "Submitted Successfully.";

    // redirect to home page
    header("Location: /");
    exit;


