// Profile menu
$(document).ready(function(){
    $("#menu").click(function(){
        $(".hidden").slideToggle();
    });
});

$(document).ready(function(){
    $("#personal-information").click(function(){
        $(".pis").show();
        $("#message-section").hide();
        $(".my-projects-section").hide();
        $(".clients-section").hide();
        $(".my-advertisement-section").hide();
        $(".hidden").slideUp();
        $(".message-containt").hide();
    })
})

$(document).ready(function(){
    $("#clients").click(function(){
        $(".pis").hide();
        $("#message-section").hide();
        $(".my-projects-section").hide();
        $(".clients-section").show();
        $(".hidden").slideUp();
        $(".message-containt").hide();
    })
})

$(document).ready(function(){
    $("#to-main").click(function(){
        $(".pis").hide();
        $("#message-section").show();
        $(".my-projects-section").hide();
        $(".clients-section").hide();
        $(".hidden").slideUp();
        $(".message-containt").hide();
        $(".my-advertisement-section").hide();
    })
})

$(document).ready(function(){
    $("#my-projects").click(function(){
        $(".pis").hide();
        $("#message-section").hide();
        $(".my-projects-section").show();
        $(".clients-section").hide();
        $(".hidden").slideUp();
        $(".message-containt").hide();
        $(".my-advertisement-section").hide();
    })
})

$(document).ready(function(){
    $("#my-Advertisement").click(function(){
        $(".pis").hide();
        $("#message-section").hide();
        $(".my-projects-section").hide();
        $(".clients-section").hide();
        $(".hidden").slideUp();
        $(".message-containt").hide();
        $(".my-advertisement-section").show();
    })
})

// messages menu
$(document).ready(function(){
    $(".fa-ellipsis-vertical").click(function(){
    $(".list").slideToggle();
})
})

$(document).ready(function(){
    $("#gelen").click(function(){
        $(".giden").hide();
        $("#gelen").css(
            {
                "border-bottom":"2px solid rgb(137, 28, 28)",
                "color": "rgb(137, 28, 28)",
                "background-color": "#ccc"
            });
        $(".fa-envelope").css("color","rgb(137, 28, 28)");
        $("#giden").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $("#private").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $(".fa-code-pull-request").css("color","rgb(98, 97, 97)");
        $("#payment").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $(".fa-credit-card").css("color","rgb(98, 97, 97)");
        $(".fa-paper-plane").css("color","rgb(98, 97, 97)");
        $(".gelen").show();
        $(".private").hide();
        $(".payment").hide();

    })
})

$(document).ready(function(){
    $("#giden").click(function(){
        $(".giden").show();
        $(".gelen").hide();
        $("#giden").css(
            {
                "border-bottom":"2px solid blue",
                "color": "blue",
                "background-color": "#ccc"
            });
        $(".fa-paper-plane").css("color","blue");
        $("#gelen").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $("#private").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $(".fa-code-pull-request").css("color","rgb(98, 97, 97)");
        $("#payment").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });            
        $(".fa-envelope").css("color","rgb(98, 97, 97)");
        $(".private").hide();
        $(".payment").hide();
    })
})

$(document).ready(function(){
    $("#private").click(function(){
        $(".giden").hide();
        $(".gelen").hide();
        $("#private").css(
            {
                "border-bottom":"2px solid green",
                "color": "green",
                "background-color": "#ccc"
            });
        $(".fa-code-pull-request").css("color","green");
        $("#gelen").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $(".fa-envelope").css("color","rgb(98, 97, 97)");
        $("#giden").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $(".fa-paper-plane").css("color","rgb(98, 97, 97)");
        $("#payment").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $(".fa-credit-card").css("color","rgb(98, 97, 97)");
        $(".private").show();
        $(".payment").hide();
    })
})

$(document).ready(function(){
    $("#payment").click(function(){
        $(".giden").hide();
        $(".gelen").hide();
        $("#private").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $(".fa-code-pull-request").css("color","rgb(98, 97, 97)");
        $("#gelen").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $(".fa-envelope").css("color","rgb(98, 97, 97)");
        $("#giden").css(
            {
                "border-bottom":"none",
                "color": "rgb(98, 97, 97)",
                "background-color": "#fff"
            });
        $(".fa-paper-plane").css("color","rgb(98, 97, 97)");
        $("#payment").css(
            {
                "border-bottom":"2px solid orange",
                "color": "orange",
                "background-color": "#ccc"
            });
        $(".fa-credit-card").css("color","orange");
        $(".private").hide();
        $(".payment").show();
    })
})

$(document).ready(function(){
    var control = true;
    $(".fa-star").click(function(){
        if(control === true) {
            $(this).css("color","yellow");
            control = false;
        }
        else if(control === false){
            $(this).css("color","#aaa");
            control = true;
        }
    })
})

// edit personal information 

// $(document).ready(function(){
//     $("#edit").click(function(){
//         $(".personal-information").css("transform","rotateY(180deg)");
//         $(".pi-edit").css("display","flex");
//         $(".pi-edit").delay(500).css("margin-top","-950px");
//     })
//     $("#back-button").click(function(){
//         $(".personal-information").css("transform","rotateY(0deg)");
//         $(".pi-edit").slideUp();
//     })
// })

// add project 

$(document).ready(function(){
    $(".add-button").click(function(){
        // $("#project-table").hide();
        $(".add-project").slideDown();
    });

    $("#hide").click(function(){
        $(".add-project").slideUp();
    });
});

$(document).ready(function(){
    $(".new").click(function(){
        $(".new-box").show();
    });
    $(".close").click(function(){
        $(".new-box").hide();
    })
});

$(document).ready(function(){
    $(".message").click(function(){
        $(".message-containt").show();
        $(".message-section").hide();
    });

    $(".fa-arrow-left").click(function(){
        $(".message-containt").hide();
        $(".message-section").show();
    })
})



$(document).ready(function(){
    let control = true;
    $(".fa-bell").click(function(){
        if(control == true){
            $(".no-list").show();
            control = false;
        }
        else {
            $(".no-list").hide();
            control = true;
        }
    })
})


















$(document).ready(function(){
    $("#personal-information").click(function(){
        $(".pis").show();
        $("#message-section").hide();
        $(".my-projects-section").hide();
        $(".clients-section").hide();
        $(".my-advertisement-section").hide();
        $(".hidden").slideUp();
        $(".message-containt").hide();
        $(".change-password").hide();
    })
})

$(document).ready(function(){
    $("#clients").click(function(){
        $(".pis").hide();
        $("#message-section").hide();
        $(".my-projects-section").hide();
        $(".clients-section").show();
        $(".hidden").slideUp();
        $(".message-containt").hide();
        $(".change-password").hide();
    })
})

$(document).ready(function(){
    $("#to-main").click(function(){
        $(".pis").hide();
        $("#message-section").show();
        $(".my-projects-section").hide();
        $(".clients-section").hide();
        $(".hidden").slideUp();
        $(".message-containt").hide();
        $(".my-advertisement-section").hide();
        $(".change-password").hide();
    })
})

$(document).ready(function(){
    $("#my-projects").click(function(){
        $(".pis").hide();
        $("#message-section").hide();
        $(".my-projects-section").show();
        $(".clients-section").hide();
        $(".hidden").slideUp();
        $(".message-containt").hide();
        $(".my-advertisement-section").hide();
        $(".change-password").hide();
    })
})

$(document).ready(function(){
    $("#my-Advertisement").click(function(){
        $(".pis").hide();
        $("#message-section").hide();
        $(".my-projects-section").hide();
        $(".clients-section").hide();
        $(".hidden").slideUp();
        $(".message-containt").hide();
        $(".my-advertisement-section").show();
        $(".change-password").hide();
    })
})

$(document).ready(function(){
    $("#change").click(function(){
        $(".pis").hide();
        $("#message-section").hide();
        $(".my-projects-section").hide();
        $(".clients-section").hide();
        $(".hidden").slideUp();
        $(".message-containt").hide();
        $(".my-advertisement-section").hide();
        $(".change-password").show();
    })
})