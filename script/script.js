$(document).ready(function () {

    $(".slider_slick").slick({
        initialSlide: 3,
        autoplay: true,
        arrows: false,
        fade: true,
    });

    $("select").niceSelect();

    $("#select_house").on("change", function () {
        let house_name = $(this).val();
        if (house_name !== "") {
            $(".slider_slick").slick("unslick");
            $(".slider_slick").slick({
                autoplay: false,
                arrows: false,
                fade: true,
            });
        }

        switch (house_name) {
            case "Stark":
                $(".slider_slick").slick("slickGoTo", 0);
                break;
            case "Baratheon":
                $(".slider_slick").slick("slickGoTo", 1);
                break;
            case "Lannister":
                $(".slider_slick").slick("slickGoTo", 2);
                break;
            case "Targaryen":
                $(".slider_slick").slick("slickGoTo", 3);
                break;
        }
    });

    $("#save").click(function () {
        let name = ($("#name").val());
        let house = ($("#select_house").val());
        let text = ($("#text_preferences").val());
        sendData(name, house, text);
        return false;
    });

    function sendData(name, house, text) {

        $.post(
            "php/ajaxRequest.php",
            {
                data: "messages",
                name: name,
                house: house,
                text: text
            },

            function (msg) {
                stringParsing(msg);
            }
        );
    }

    function stringParsing(str) {
        $("#nameEROR").empty();
        $("#houseEROR").empty();
        $("#textEROR").empty();
        if (str == "nameEROR") {
            $("#nameEROR").append("Enter a name more than two characters");
        }
        ;
        if (str == "houseEROR") {
            $("#houseEROR").append("Choose a house");
        }
        ;
        if (str == "textEROR") {
            $("#textEROR").append("Enter text over five characters");
        }
        ;
        if (str.slice(0, 5) == "users") {
            $(".block_right").empty();
            displayData(str);
        }
        ;
    }

    function displayData(str) {
        $(".block_right").append("<div class='result'>" +"user: "+ str.slice(6,-5) + "</div>");
        $.getJSON(str, function (data) {
            for (let key in data) {
                $(".result").append("<div>" + key + ": "+data[key] + "</div>");
            }
        })
    }


});








