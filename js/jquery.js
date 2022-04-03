$(document).ready(function(){
    $("li a").css({"visibility":"hidden","transition":"0.1s"});
    $(".clrs").css({"visibility":"hidden"});
        // $("#slide").css({"width":"290px"});
        // $("li").css({"visibility":"visible"})
        // $(".clrs").css({"visibility":"visible"})
        // $("li").css({"width":"100%"})
    $("#show-sidebar").click(function(){
        $("#show-sidebar").hide()
       $("#cont-one,#content").css({"left":"290px","transition":"1.5s"}); 
    //    $("body").css({"overflow":"hidden"})
        $(".clrs").show()
        $("#slide").css({"width":"290px","transition":"0.8s"});
        $("li a").css({"visibility":"visible","transition":"0.8s"})
        $(".clrs").css({"visibility":"visible"})
        $("li").css({"width":"100%"})
    });
    $(".clrs").click(function(){
        $("li a").css({"visibility":"hidden","transition":"0.1s"})
        // $("body").css({"overflow-y":"visible"})
         
        $(".clrs").hide()
        $("#cont-one,#content").css({"left":"0px","transition":"0.8s"}); 
        $("#show-sidebar").show()
        $("#slide").css({"width":"0px","transition":"0.8s"});
        
        // $(".clrs").css({"visibility":"visible"})
        $("li").css({"width":"-100%"})
    });
   
      $("#subject2").change(function () {
          var selectedText = $(this).find("option:selected").text();
          var selectedValue = $(this).val();
          // alert(selectedText);
          $(".sub").text(selectedText);
      });
$(".total").keyup(function(){
  var text=$(this).text();
  $(".tc").text(text);
  });
    $(".present_class").on("keyup change",function calculateSum() {
  var $input = $(this);
  var $row = $input.closest("tr");
  var sum = 0;
  var total=$(".total").text();
  var total1=parseInt(total)
  // alert(total1);
  $row.find(".present_class").each(function() {
    var pre= $(this).text()
    var value=parseInt(pre)
    sum = ((value)/total1)|| 0;
    sum =sum*100;
    // sum2=sum.toString();
  });
  $row.find(".total_present").text(sum.toFixed(2)+"%");
});
});
$(document).ready(function(){
  $("#upload1").click(function(){
    var rollno=[];
    var name=[];
    var present_class=[];
    var total_present=[];
    var tc=[];
    var sub=[];
    var branch=[];
    $(".rollno").each(function(){
    rollno.push($(this).text());
    });
    $(".present_class").each(function(){
    present_class.push($(this).text());
    });
     $(".name").each(function(){
    name.push($(this).text());
    });
    $(".tc").each(function(){
     tc.push($(this).text());
    });
    $(".total_present").each(function(){
      total_present.push($(this).text());
     });
    $(".sub").each(function(){
      sub.push($(this).text());
    });
    $(".branch").each(function(){
      branch.push($(this).text());
    });


    $.post('test.php',
{rollno:rollno,name:name,tc:tc,present_class:present_class,total_present:total_present,sub:sub,branch:branch},
function(data)
        {
          $("#alertdata").html('<div class="alert alert-success alert-dismissible fade show  d-block"><button class="close" data-dismiss="alert">&times;</button><strong>Done</strong></div>')
        // alert(data);
        }
      );
    });
});