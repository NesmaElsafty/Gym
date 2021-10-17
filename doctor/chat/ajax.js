
function ajax(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if (req.readyState == 4 && req.status == 200) { //4 -> all validation steps are done 200 -> request is done successfully
                document.getElementById('chat').innerHTML = req.responseText; // we can target any html tag to change dynamicly
            }
        }

        req.open('GET', 'chat.php', true);
        req.send();
    }

    setInterval(function(){ajax();}, 1000);

$(document).ready(function(){
$("#submit").click(function(){
var sender = $("#sender").val();
var client_name = $("#client_name").val();
var msg = $("#msg").val();
var doctor_name = $("#doctor_name").val();
var doctor_unID = $("#doctor_unID").val();
var client_unID = $("#client_unID").val();
// var contact = $("#contact").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'sender1='+ sender + '&client_name1='+ client_name + '&msg1='+ msg + '&doctor_name1=' + doctor_name + '&doctor_unID1=' + doctor_unID + '&client_unID1=' + client_unID;
if(sender==''||client_name==''||msg==''||doctor_name == ''||doctor_unID == ''|| client_unID == '')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "send.php",
data: dataString,
cache: false,
// success: function(result){
// alert(result);
// }
});
} 
return false;
});
});
