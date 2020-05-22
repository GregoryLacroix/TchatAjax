var url="tchatAjax.php";
var lastid=0; // variable qui permettra de connaitre le dernier id du dernier message
var timer = setInterval(getMessages,5000);
var ctimer = setInterval(getConnected,10000);

$(function(){
    getConnected();
    $("#tchatForm form").submit(function(){
        clearInterval(timer);  // dès que l'on psote un message on arrete le timer
        showLoader("#tchatForm");
        var message = $("#tchatForm form textarea").val();
        console.log(message);
        $.post(url,{action:"addMessage",message:message},function(data){
            if(data.erreur=="ok"){
                getMessages();
                $("#tchatForm form textarea").val("");
            }
            else{
                alert(data.erreur);
            }
            timer = setInterval(getMessages,5000); // une fois le message poster on relance le timer sinon les messages ne s'actualisent pas sur différentes session 
            hideLoader();
        },"json");
        return false;
    })
});

function getMessages(){
    $.post(url,{action:"getMessages",lastid:lastid},function(data){
            if(data.erreur=="ok"){
                $("#tchat").append(data.result);
                lastid=data.lastid;
            }
            else{
                alert(data.erreur);
            }
        },"json");
        return false;
}

function getConnected(){
    $.post(url,{action:"getConnected"},function(data){
            if(data.erreur=="ok"){
                $("#connected").empty().append(data.result); // on vide et on ajoute
            }
            else{
                alert(data.erreur);
            }
        },"json");
        return false;
}

function showLoader(div){
    $(div).append('<div class="loader"></div>');
    $(".loader").fadeTo(500,0.6);
}


function hideLoader(){
    $(".loader").fadeOut(500,function(){
        $(".loader").remove();
    });
}

