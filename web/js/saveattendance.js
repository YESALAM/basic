/**
 * Created by yesalam on 5/29/16.
 */
$(document).ready(function(){
    $("button").click(function(e){
        var id = e.target.id ;
        var arr = id.split("_");
        var enroll = arr[0] ;
        var type = arr[1] ;
        switch(type){
            case "P" :
                $("#"+id).attr("style","background-color:#aad178;color:white;border-color:#7db831;") ;
                var bgcolor = $("#"+enroll+"_A").css("background-color");
                if(bgcolor=="rgb(247, 190, 100)"){
                    //remove background
                    $("#"+enroll+"_A").attr("style","background-color:#fff;color:#333;border-color:#ccc;") ;
                    //remove data
                }
                //setdata
                break ;
            case "A" :
                $("#"+id).attr("style","background-color:#f7be64;color:white;border-color:#f39c12;") ;
                var bgcolor = $("#"+enroll+"_P").css("background-color");
                if(bgcolor=="rgb(170, 209, 120)"){
                    //remove background
                    $("#"+enroll+"_P").attr("style","background-color:#fff;color:#333;border-color:#ccc;") ;
                    //remove data
                }
                //setdata
                break ;
        }
    });
});