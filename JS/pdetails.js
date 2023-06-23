$(document).ready(function(){
    $(".project").click(function(){
        $(".projects").show();
        $(".education").hide();
        $(".bank").hide();
        $(".educationl").css({
            "background-color":"transparent",
            "border-bottom":"none"
        });
        $(".bankl").css({
            "background-color":"transparent",
            "border-bottom":"none"
        });
        $(".project").css({
            "background-color":"rgb(34 34 45)",
            "border-bottom":"1px solid #fff"
        });
        
    })
})

$(document).ready(function(){
    $(".educationl").click(function(){
        $(".projects").hide();
        $(".education").show();
        $(".bank").hide();
        $(".project").css({
            "background-color":"transparent",
            "border-bottom":"none"
        });
        $(".bankl").css({
            "background-color":"transparent",
            "border-bottom":"none"
        });
        $(".educationl").css({
            "background-color":"rgb(34 34 45)",
            "border-bottom":"1px solid #fff"
        });
        
    })
})

$(document).ready(function(){
    $(".bankl").click(function(){
        $(".projects").hide();
        $(".education").hide();
        $(".bank").show();
        $(".project").css({
            "background-color":"transparent",
            "border-bottom":"none"
        });
        $(".educationl").css({
            "background-color":"transparent",
            "border-bottom":"none"
        });
        $(".bankl").css({
            "background-color":"rgb(34 34 45)",
            "border-bottom":"1px solid #fff"
        });
        
    })
})