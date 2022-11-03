function filterAngkatanPKL(){
    
    var x = document.getElementById("selector-angkatan").value;
    $.ajax(
        {
            url:"../dosen/showPKL.php",
            method: "POST",
            data:{
                id:x
            },
            success:function(data){
                $("#ans").html(data);
            }
        }
    )
};

function filterAngkatanSkripsi(){
    
    var x = document.getElementById("selector-angkatan").value;
    $.ajax(
        {
            url:"../dosen/showSkripsi.php",
            method: "POST",
            data:{
                id:x
            },
            success:function(data){
                $("#ans").html(data);
            }
        }
    )
};

function getXMLHTTPRequest() {
    if (window.XMLHttpRequest) {
      return new XMLHttpRequest();
    } else {
      return new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  
  function callAjax(url, inner) {
  
    var xmlhttp = getXMLHTTPRequest();
    xmlhttp.open("GET", url, true);
    xmlhttp.onreadystatechange = function () {
      document.getElementById(inner).innerHTML = `Loading...`;
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById(inner).innerHTML = xmlhttp.responseText;
      }
      return false;
    };
    xmlhttp.send(null);
  }
  
  function showKabupaten(id_provinsi) {
  
    var inner = "kabupaten";
    var url = "get_kabupaten.php?id=" + id_provinsi;
    if (id_provinsi == "") {
      document.getElementById(inner).innerHTML = ``;
    } else {
      callAjax(url, inner);
    }
  }