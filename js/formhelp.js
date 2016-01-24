function loadfunction()
{
    if(typeof(Storage) !== "undefined")
    {
        if(localStorage.getItem('teamname')!=="undefined")
        {

            if(localStorage.getItem('bits')=='y') document.getElementsByName("bits")[0].checked =true;
            if(localStorage.getItem('bots')=='y') document.getElementsByName("bots")[0].checked =true;
            if(localStorage.getItem('brainwave')=='y') document.getElementsByName("brainwave")[0].checked =true;
            if(localStorage.getItem('designpro')=='y') document.getElementsByName("designpro")[0].checked =true;
            if(localStorage.getItem('electrocution')=='y') document.getElementsByName("electrocution")[0].checked =true;
            if(localStorage.getItem('envision')=='y') document.getElementsByName("envision")[0].checked =true;
            if(localStorage.getItem('radix')=='y') document.getElementsByName("radix")[0].checked =true;
            if(localStorage.getItem('technovision')=='y') document.getElementsByName("technovision")[0].checked =true;
            
            document.getElementsByName("teamname")[0].value=localStorage.getItem('teamname');
            document.getElementsByName("strength")[0].value=localStorage.getItem('strength');

            document.getElementsByName("name1")[0].value=localStorage.getItem('name1');
            document.getElementsByName("contact1")[0].value=localStorage.getItem('contact1');
            document.getElementsByName("email1")[0].value=localStorage.getItem('email1');
            document.getElementsByName("college1")[0].value=localStorage.getItem('college1');

            document.getElementsByName("name2")[0].value=localStorage.getItem('name2');
            document.getElementsByName("contact2")[0].value=localStorage.getItem('contact2');
            document.getElementsByName("email2")[0].value=localStorage.getItem('email2');
            document.getElementsByName("college2")[0].value=localStorage.getItem('college2');

            document.getElementsByName("name3")[0].value=localStorage.getItem('name3');
            document.getElementsByName("contact3")[0].value=localStorage.getItem('contact3');
            document.getElementsByName("email3")[0].value=localStorage.getItem('email3');
            document.getElementsByName("college3")[0].value=localStorage.getItem('college3');

            document.getElementsByName("name4")[0].value=localStorage.getItem('name4');
            document.getElementsByName("contact4")[0].value=localStorage.getItem('contact4');
            document.getElementsByName("email4")[0].value=localStorage.getItem('email4');
            document.getElementsByName("college4")[0].value=localStorage.getItem('college4');


            if(localStorage.getItem('accomodation')=='y') document.getElementsByName("accomodation")[0].checked =true;
            document.getElementsByName("comments")[0].value=localStorage.getItem('comment');
        }
    }
}
function savefunction()
{
    if(typeof(Storage) !== "undefined")
    {
        localStorage.setItem('bits', (document.getElementsByName("bits")[0].checked==true)?'y':'n');
        localStorage.setItem('bots', (document.getElementsByName("bots")[0].checked==true)?'y':'n');
        localStorage.setItem('brainwave', (document.getElementsByName("brainwave")[0].checked==true)?'y':'n');
        localStorage.setItem('designpro', (document.getElementsByName("designpro")[0].checked==true)?'y':'n');
        localStorage.setItem('electrocution', (document.getElementsByName("electrocution")[0].checked==true)?'y':'n');
        localStorage.setItem('envision', (document.getElementsByName("envision")[0].checked==true)?'y':'n');
        localStorage.setItem('radix', (document.getElementsByName("radix")[0].checked==true)?'y':'n');
        localStorage.setItem('technovision', (document.getElementsByName("technovision")[0].checked==true)?'y':'n');

        localStorage.setItem('teamname', document.getElementsByName("teamname")[0].value.toLowerCase());
        localStorage.setItem('strength', document.getElementsByName("strength")[0].value);

        localStorage.setItem('name1', document.getElementsByName("name1")[0].value);
        localStorage.setItem('contact1', document.getElementsByName("contact1")[0].value);
        localStorage.setItem('email1', document.getElementsByName("email1")[0].value);
        localStorage.setItem('college1', document.getElementsByName("college1")[0].value);

        localStorage.setItem('name2', document.getElementsByName("name2")[0].value);
        localStorage.setItem('contact2', document.getElementsByName("contact2")[0].value);
        localStorage.setItem('email2', document.getElementsByName("email2")[0].value);
        localStorage.setItem('college2', document.getElementsByName("college2")[0].value);

        localStorage.setItem('name3', document.getElementsByName("name3")[0].value);
        localStorage.setItem('contact3', document.getElementsByName("contact3")[0].value);
        localStorage.setItem('email3', document.getElementsByName("email3")[0].value);
        localStorage.setItem('college3', document.getElementsByName("college3")[0].value);

        localStorage.setItem('name4', document.getElementsByName("name4")[0].value);
        localStorage.setItem('contact4', document.getElementsByName("contact4")[0].value);
        localStorage.setItem('email4', document.getElementsByName("email4")[0].value);
        localStorage.setItem('college4', document.getElementsByName("college4")[0].value);

        localStorage.setItem('accomodation', (document.getElementsByName("accomodation")[0].checked==true)?'y':'n');
        localStorage.setItem('comments', document.getElementsByName("comments")[0].value);
    }
}

function teamcheck()
{
    /**** REMEMBER TO INCLUDE JQUERY SCRIPT ****/
    var tn = document.getElementsByName("teamname")[0].value.toLowerCase();
if(tn.length>2 && tn.length<=20)
{
    $.ajax({
        url: "check.php",
        type : "POST",
        data: {
            teamname: tn,
        }
    })
    .done (function(data) { 
                var htmlwrite ="";
                if(data.avail == 1)
                    htmlwrite = tn + " is available.";
                else if(data.avail == 0)
                    htmlwrite = tn + " is not available, Please choose another.";

                document.getElementById("team-name-status").innerHTML = htmlwrite;
        })
    .fail (function()  { });
}
if(tn.length>20) {document.getElementById("team-name-status").innerHTML ="Maximum 20 characters allowed";}

    /* ALTERNATE WAY
    $.post("check.php",
            {
                teamname: tn
            },
            function(data)
            {   
                //data - JSON object from server
                var htmlwrite ="";
                if(data.avail == '1')
                    htmlwrite = tn + " is available.";
                else if(data.avail == 0)
                    htmlwrite = tn + " is not available, Please choose another.";

                document.getElementById("team-name-status").innerHTML = htmlwrite;
            },"json").fail(function() 
                {
         
                }
        );
    */ 
}
function fetchid()
{
    /**** REMEMBER TO INCLUDE JQUERY SCRIPT ****/
    var tn = document.getElementsByName("teamname")[0].value;
    $.ajax({
        url: "check.php",
        type : "POST",
        data: {
            teamname: tn,
        }
    })
    .done (function(data) { 
                var htmlwrite ="";
                if(data.avail == 1)
                    htmlwrite = tn + " is available.";
                else if(data.avail == 0)
                    htmlwrite = tn + " is not available, Please choose another.";

                document.getElementById("team-name-status").innerHTML = htmlwrite;
        })
    .fail (function()  { });

    /* ALTERNATE WAY
    $.post("check.php",
            {
                teamname: tn
            },
            function(data)
            {   
                //data - JSON object from server
                var htmlwrite ="";
                if(data.avail == '1')
                    htmlwrite = tn + " is available.";
                else if(data.avail == 0)
                    htmlwrite = tn + " is not available, Please choose another.";

                document.getElementById("team-name-status").innerHTML = htmlwrite;
            },"json").fail(function() 
                {
         
                }
        );
    */ 
}