
var changeNumber=false;

function edit(i) {
    document.getElementsByClassName("fName")[i].disabled = false;
    document.getElementsByClassName("lName")[i].disabled = false;
    document.getElementsByClassName("address")[i].disabled = false;
    document.getElementsByClassName("jobTitle")[i].disabled = false;
    document.getElementsByClassName("birthDate")[i].disabled = false;
    document.getElementsByClassName("groupId")[i].disabled = false;
    document.getElementsByClassName("email")[i].disabled = false;
    document.getElementsByClassName("note")[i].disabled = false;
    document.getElementsByClassName("number1")[i].disabled = false;
    document.getElementsByClassName("number2")[i].disabled = false;
    document.getElementsByClassName("number3")[i].disabled = false;
    document.getElementsByClassName("number4")[i].disabled = false;
    document.getElementsByClassName("teleType1")[i].disabled = false;
    document.getElementsByClassName("teleType2")[i].disabled = false;
    document.getElementsByClassName("teleType3")[i].disabled = false;
    document.getElementsByClassName("teleType4")[i].disabled = false;


    document.getElementsByClassName('editBtn')[i].textContent = 'Save';
    document.getElementsByClassName('editBtn')[i].style.display = 'none';
    document.getElementsByClassName('saveBtn')[i].style.display = 'block';
}
function send(id){
    var xmlhttp = new XMLHttpRequest();
    let formData=new FormData(document.getElementById('formData'+id));
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        window.location.reload();
      }
    };
    formData.append('changeNumber',changeNumber);

    xmlhttp.open("POST", "showPerson.php",false);
    xmlhttp.send(formData);
}
function change(){
    changeNumber=true;
}

