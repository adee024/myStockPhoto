/** START: GLOBAL VARIABLES */
let name = $("exampleFormControlInput2");
let email = $("exampleFormControlInput1");
let megContent = $("exampleFormControlTextarea1");
/** END: GLOBAL VARIABLES */



/** START: EVENT LISTENERS */
$("mailForm").addEventListener("submit", function (event) {
    let nameLen = parseInt(name.value.trim().length);
    let emailLen = parseInt(email.value.trim().length);
    let msgLen = parseInt(megContent.value.trim().length);

    if( nameLen == "" ){
        alert("Name must be filled");
        event.preventDefault();
    }else{
        if( emailLen == "" ){
            alert("Email must be filled");
            event.preventDefault();
        }else{
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)){
                if( msgLen == "" ){
                    alert("Message must be filled");
                    event.preventDefault();
                }else{
                    //ok
                }
            }else{
                alert("Inputs must be filled!");
                event.preventDefault();
            }
        }
    }

});
/** END: EVENT LISTENERS */




/** START: FUNCTIONS */
function $(id){
    return document.getElementById(id);
}
/** END: FUNCTIONS */



/** START: SET THINGS ON START */
try{

}catch(e){}

/** END: SET THINGS ON START */


function click (e) {
  if (!e)
    e = window.event;
  if ((e.type && e.type == "contextmenu") || (e.button && e.button == 2) || (e.which && e.which == 3)) {
    if (window.opera)
      window.alert("");
    return false;
  }
}
if (document.layers)
  document.captureEvents(Event.MOUSEDOWN);
document.onmousedown = click;
document.oncontextmenu = click;