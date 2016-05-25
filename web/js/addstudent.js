/**
 * Created by yesalam on 5/20/16.
 */
$(document).ready(function(){
    $("#addanother").click(function(){
        //window.alert("Danger Ahead "+$("addstudent_form-name").val());
        var name = $("#name").val() ;
        var enroll = $("#enroll").val();
        var classes = $("#class").val();
        if($("#addstudent_form-name").val() == null || $("#addstudent_form-name").val() == "" || $("#addstudent_form-enroll").val() == null || $("#addstudent_form-enroll").val() == "") return ;
        if(name == null || name == ""){
            $("#name").val($("#addstudent_form-name").val());
            $("#enroll").val($("#addstudent_form-enroll").val());
            $("#class").val($("#addstudent_form-class_id").val());
        } else {
            $("#name").val(name+"||"+$("#addstudent_form-name").val());
            $("#enroll").val(enroll+"||"+$("#addstudent_form-enroll").val());
            $("#class").val(classes+"||"+$("#addstudent_form-class_id").val());
        }
        $("#student-pending-list").html( $("#student-pending-list").html()+"<li>"+$("#addstudent_form-enroll").val()+" -> "+$("#addstudent_form-name").val()+"</li>");
        $("#addstudent_form-name").val('');
        $("#addstudent_form-enroll").val('');

    });
    /*$("#submit").click(function(){
        var name = $("#name").val() ;
        var enroll = $("#enroll").val();
        var classes = $("#class").val();
        if(name == null || name == "" || enroll == null || enroll == ""){
            if($("#addstudent_form-name").val() == null ||
                $("#addstudent_form-name").val() == "" ||
                $("#addstudent_form-enroll").val() == null ||
                $("#addstudent_form-enroll").val() == "" ) {

                $(".field-addstudent_form-name").addClass("has-error") ;
                $(".field-addstudent_form-name .help-block").first().text("Name cannot be blank.");

                $(".field-addstudent_form-enroll").addClass("has-error") ;
                $(".field-addstudent_form-enroll .help-block").first().text("Enroll cannot be blank.");
                return  false;
            } else {
                $("#name").val($("#addstudent_form-name").val());
                $("#enroll").val($("#addstudent_form-enroll").val());
                $("#class").val($("#addstudent_form-class_id").val());
                //window.alert("Submit");
                $("#form-student").submit();
                return true ;
            }

        } else {
            if($("#addstudent_form-name").val() != "" &&
                $("#addstudent_form-enroll").val() != "" ) {
                $("#name").val(name+"||"+$("#addstudent_form-name").val());
                $("#enroll").val(enroll+"||"+$("#addstudent_form-enroll").val());
                $("#class").val(classes+"||"+$("#addstudent_form-class_id").val());

                //return true ;
                $("#form-student").submit();
                return true ;
                //window.alert("Submit");
            } else
               // return true ;
            $("#form-student").submit();
            return true ;
            //window.alert("Submit");
        }

    });*/

   $("#form-student").submit(function(){

        var name = $("#name").val() ;
        var enroll = $("#enroll").val();
        var classes = $("#class").val();
        if(name == null || name == "" || enroll == null || enroll == "")
        {
            if($("#addstudent_form-name").val() == null ||
                $("#addstudent_form-name").val() == "" ||
                $("#addstudent_form-enroll").val() == null ||
                $("#addstudent_form-enroll").val() == "" )
            {

                $(".field-addstudent_form-name").addClass("has-error") ;
                $(".field-addstudent_form-name .help-block").first().text("Name cannot be blank.");

                $(".field-addstudent_form-enroll").addClass("has-error") ;
                $(".field-addstudent_form-enroll .help-block").first().text("Enroll cannot be blank.");
                return  false;
            }
            else
            {
                $("#name").val($("#addstudent_form-name").val());
                $("#enroll").val($("#addstudent_form-enroll").val());
                $("#class").val($("#addstudent_form-class_id").val());
                //window.alert("Submit");
                // $("#form-student").submit();
                // return true ;
            }

        } else
        {
            if($("#addstudent_form-name").val() != "" &&
                $("#addstudent_form-enroll").val() != "" )
            {
                $("#name").val(name+"||"+$("#addstudent_form-name").val());
                $("#enroll").val(enroll+"||"+$("#addstudent_form-enroll").val());
                $("#class").val(classes+"||"+$("#addstudent_form-class_id").val());

                //return true ;
                //$("#form-student").submit();
                //window.alert("Submit");
            }
            // return true ;
            //$("#form-student").submit();
            //window.alert("Submit");
        }

        return true ;
       //window.alert("submitted");
    });
});