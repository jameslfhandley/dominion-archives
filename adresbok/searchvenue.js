// file : searchvenue.js
var timer1;
var ajaxreq2;
var msg0;
var divCity0;


var array0;
ajaxreq2 = false;

var obj;
obj=document.getElementById("searchVenue0"); // form entry INPUT element
obj.onkeydown = StartSearch; // add the event that re-acts to the keyboard pressed..

divCity0 = document.getElementById("resultVenue0");

function sendmsg0(target)
{

   try 
   {
   ajaxreq2= new XMLHttpRequest();
   }
   catch (error)
    {
    try {

      ajaxreq2 = new ActiveXObject("Microsoft.XMLHTTP");

    } catch (error)

    {
      return false;
    }
   }

  msg0 = document.getElementById("searchVenue0").value;
  // CAPTURE the value of the TEXT in the input field
  ajaxreq2.open("POST","./searchvenue.php",true);
  ajaxreq2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  ajaxreq2.onreadystatechange = DisplayResults;
  ajaxreq2.send("msg="+msg0);

}





function StartSearch()
{

   if (timer1)
   {
    window.clearTimeout(timer1);
   }
   timer1 = window.setTimeout("sendmsg0();",200);
}


function DisplayResults() {

if (ajaxreq2.readyState !=4)
    {
        return;
    }

   if (ajaxreq2.status==200)
   {
// Create Variables

var ul,div,name,names,text,li,i,a;

var names2,target_id0,target_id_string0;

   ul = document.getElementById("list");
   div = document.getElementById("resultVenue0");
   div.removeChild(ul);

   ul = document.createElement("ul");
   ul.id="list";

	names = ajaxreq2.responseXML.getElementsByTagName("name");
	names2 = ajaxreq2.responseXML.getElementsByTagName("userid");

   for (i = 0; i < names.length; i++)
   {
        arrayCount = 0;
      li = document.createElement("li");
      name = names[i].firstChild.nodeValue;
      target_id = names2[i].firstChild.nodeValue;
      text = document.createTextNode(name);

target_id_string0 = document.createTextNode(target_id);
      li.appendChild(text);
      a = document.createElement("a");
      a.href = "./profile.php?id=" + target_id + "";



      a.appendChild(li);
      ul.appendChild(a);

   }
   if (names.length==0) {
      li = document.createElement("li");
      divCity0.style.display="none";
      li.appendChild(document.createTextNode("No results"));
      ul.appendChild(li);
      array0 = new Array();
      arrayCount = 0;
   }

   divCity0.style.display="block";
   div.appendChild(ul);
   }
}
