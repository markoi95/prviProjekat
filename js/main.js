function reply_click(clicked_id)
  {
    document.getElementById("stoNaziv").value = clicked_id;
    return clicked_id;
  }

$("#zakazi").submit(function () {
    $("staticBackdrop").modal("toggle");
    return false;
  });

$('#dodajRez').submit(function(){
    event.preventDefault();
    console.log("Dodaj je pokrenut");
    const $form = $(this);
    const $inputs = $form.find('input, text, button, hidden');
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    request = $.ajax({
        url:'handler/add.php',
        type:'post',
        data: serijalizacija
    });
    
    request.done(function(response, textStatus, jqXHR){
        if(response==="radi"){                              //iz nekog razloga ne radi uslov u if
            alert("Rezervacija prihvacena");
            console.log("Uspesno zakazivanje");
            location.reload(true);
        }else {
          console.log("Rezervacija neuspesna" +response);
          location.reload(true);
        }
    });

    request.fail(function(jqHR, textStatus,error){
        console.error('Sledeca greska se desila: '+textStatus, errorThrown)
    });
});
$('#dodajSto').submit(function(){
  event.preventDefault();
  console.log("Dodaj je pokrenut");
  const $form = $(this);
  const $inputs = $form.find('input, text, button, hidden');
  const serijalizacija = $form.serialize();
  console.log(serijalizacija);

  request = $.ajax({
      url:'handler/add.php',
      type:'post',
      data: serijalizacija
  });
  
  request.done(function(response, textStatus, jqXHR){
      if(response==="radi"){                              //iz nekog razloga ne radi uslov u if
          alert("Dodat sto");
          console.log("Uspesno dodat sto");
          location.reload(true);
      }else {
        console.log("Dodavanje stola je neuspesno" +response);
        location.reload(true);
      }
  });

  request.fail(function(jqHR, textStatus,error){
      console.error('Sledeca greska se desila: '+textStatus, errorThrown)
  });
});
function ajaxFunction()
  {
  var xmlHttp;
  try
    {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
    }
  catch (e)
    {
    // Internet Explorer
    try
      {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
      }
    catch (e)
      {
      try
        {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      catch (e)
        {
        alert("Your browser does not support AJAX!");
        return false;
        }
      }
    }
  }