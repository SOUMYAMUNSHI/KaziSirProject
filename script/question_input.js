    //@animate__animated, animate__backOutLeft, animate__bounceInRight are for animation class from @ https://animate.style/, using them througn CDN
    $("#subject-button").click(function() { //these all are for animation
        $("#input-question").addClass("animate__backOutLeft");
        $("#chapter-input").removeClass("hidden");
        $("#chapter-input").addClass("animate__bounceInRight");

        let input_subject = $("#input-subject").val(); //fetching value
        $("#question-subject").val(input_subject); //adding value
    });

    $("#chapter-button").click(function() { //these all are for animation
        $("#chapter-input").removeClass("animate__bounceInRight");
        $("#chapter-input").addClass("animate__backOutLeft");
        $("#topic-input").removeClass("hidden");
        $("#topic-input").addClass("animate__bounceInRight");

        let input_chapter = $("#input-chapter").val(); //fetching value
        $("#question-chapter").val(input_chapter); //adding value
    });

    $("#topic-button").click(function() { //these all are for animation

        let input_topic = $("#input-topic").val(); //fetching value
        $("#question-topic").val(input_topic); //adding value

        const subject = $("#question-subject").val(); //fetching subject from hidden input
        const chapter = $("#question-chapter").val(); //fetching chapter from hidden input
        const topic = $("#question-topic").val(); //fetching topic from hidden topic

        $(".view").load(`../pages/components/sub_components/input_question_header.php?subject=${subject}&chapter=${chapter}&topic=${"ok"}`); //sending value to input_question_header.php

    });