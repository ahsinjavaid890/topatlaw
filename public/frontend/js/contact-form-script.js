(function($) {
    "use strict";

    $("#contactForm").validator().on("submit", function(event) {
    if (event.isDefaultPrevented()) {
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        event.preventDefault();
        submitForm();
    }
});

    function formSuccess() {
        $("#contactForm")[0].reset();
        submitMSG(true, "Message Submitted!")
    }

    function formError() {
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h4 tada animated text-success";
        } else {
            var msgClasses = "h4 text-danger";
        }
        $("#msgnominations").removeClass().addClass(msgClasses).text(msg);
    }



    // Add review

    $("#addnominations").validator().on("submit", function(event) {
        if (event.isDefaultPrevented()) {
            formErrornominations();
            submitMSGnominations(false, "Did you fill in the form properly?");
        } else {
            event.preventDefault();
            submitFormnominations();
        }
    });



    function formSuccessnominations() {
        $("#addnominations")[0].reset();
        submitMSGnominations(true, "Thanks for Nomination")
    }

    function formErrornominations() {
        $("#addnominations").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $(this).removeClass();
        });
    }

    function submitMSGnominations(valid, msg) {
        if (valid) {
            var msgClasses = "h4 tada animated text-success";
        } else {
            var msgClasses = "h4 text-danger";
        }
        $("#msgnominations").removeClass().addClass(msgClasses).text(msg);
    }




    // Add review

    $("#addreview").validator().on("submit", function(event) {
        if (event.isDefaultPrevented()) {
            formErrorreview();
            submitMSGreview(false, "Did you fill in the form properly?");
        } else {
            event.preventDefault();
            submitFormreview();
        }
    });



}(jQuery));