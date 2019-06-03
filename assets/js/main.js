$('#date-range').daterangepicker({
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Potvrdite",
        "cancelLabel": "Poništite",
        "fromLabel": "Od",
        "toLabel": "Do",
        "customRangeLabel": "Custom",
        "yearRange": "1930",
        "daysOfWeek": [
            "Ned",
            "Pon",
            "Uto",
            "Sre",
            "Čet",
            "Pet",
            "Sub"
        ],
        "monthNames": [
            "Januar",
            "Februar",
            "Mart",
            "April",
            "Maj",
            "Jun",
            "Jul",
            "Avgust",
            "Septembar",
            "Oktobar",
            "Novembar",
            "Decembar"
        ],
        "firstDay": 1
    },
    "autoUpdateInput": true,
});
$('#birthdate').daterangepicker({
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Potvrdite",
        "cancelLabel": "Poništite",
        "fromLabel": "Od",
        "toLabel": "Do",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Ned",
            "Pon",
            "Uto",
            "Sre",
            "Čet",
            "Pet",
            "Sub"
        ],
        "monthNames": [
            "Januar",
            "Februar",
            "Mart",
            "April",
            "Maj",
            "Jun",
            "Jul",
            "Avgust",
            "Septembar",
            "Oktobar",
            "Novembar",
            "Decembar"
        ],
        "firstDay": 1
    },
    "autoUpdateInput": true,
    "singleDatePicker": true
});
$('#birthdate2').daterangepicker({
    "locale": {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Potvrdite",
        "cancelLabel": "Poništite",
        "fromLabel": "Od",
        "toLabel": "Do",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Ned",
            "Pon",
            "Uto",
            "Sre",
            "Čet",
            "Pet",
            "Sub"
        ],
        "monthNames": [
            "Januar",
            "Februar",
            "Mart",
            "April",
            "Maj",
            "Jun",
            "Jul",
            "Avgust",
            "Septembar",
            "Oktobar",
            "Novembar",
            "Decembar"
        ],
        "firstDay": 1
    },
    "autoUpdateInput": true,
    "singleDatePicker": true
});
let niz=[];
function showForm(){
    let input=document.getElementById('section_users');
    input.style.display='block';
    

}
function hideForm(){
    let input=document.getElementById('section_users');
    input.style.display='none';
}
function saveUser(){
    let name2=document.getElementById('name2');
    let birthday2=document.getElementById('birthdate2');
    let passport2=document.getElementById('passport2');
    const birth2=dateFormat(birthday2.value);
    console.log(birth2);
    let error=false;
    if (name2.value=='') {
        document.getElementById('name2Error').innerHTML='Morate uneti datum polaska i odlaska';
        document.getElementById("name2").style.borderColor = "red";
        error=true;
    }
    if (birthday2.value=='') {
        document.getElementById('birthday2Error').innerHTML='Morate uneti datum polaska i odlaska';
        document.getElementById("birthdate2").style.borderColor = "red";
        error=true;
    }
    if (passport2.value=='') {
        document.getElementById('pass2Error').innerHTML='Morate uneti datum polaska i odlaska';
        document.getElementById("passport2").style.borderColor = "red";
        error=true;
    }
    console.log(error);
    if (error===false) {
         let a={
            "name2":name2.value,
            "birthday2":birth2,
            "passport2":passport2.value
        }
        niz.push(a);
        
        name2.value='';
        birthday2.value='';
        passport2.value=''; 
    }
  
    
}
function submitForm(){
    let name=document.getElementById('name').value;
    let birthday=document.getElementById('birthdate').value;
    let passport=document.getElementById('passport').value;
    let phone=document.getElementById('phone').value;
    let email=document.getElementById('email').value;
    let date_range=document.getElementById('date-range').value;
    let actionPolicy = document.querySelector('input[name="policy"]:checked').value;
    let birth=dateFormat(birthday);
    let expRange=date_range.split(" - ");
    let dateGo=dateFormat(expRange[0]);
    let dateBack=dateFormat(expRange[1]);
    let action=0;
    if (actionPolicy == 'individual') {
        action=0;
    }else{
        action=1;
    }
    console.log(dateGo,dateBack);
    let err=false;
    if (name=='') {
        document.getElementById('nameError').innerHTML='Morate uneti ime i prezime';
        document.getElementById("name").style.borderColor = "red";
        err=true;
    }
    if (birthday=='') {
        document.getElementById('birthdayError').innerHTML='Morate uneti datum rođenja';
        document.getElementById("birthdate").style.borderColor = "red";
        err=true;
    }
    if (passport=='') {
        document.getElementById('passError').innerHTML='Morate uneti broj pasoša';
        document.getElementById("passport").style.borderColor = "red";
        err=true;
    }
    if (phone=='') {
        document.getElementById('phoneError').innerHTML='Morate uneti broj telefona';
        document.getElementById("phone").style.borderColor = "red";
        err=true;
    }
    if (email=='') {
        document.getElementById('emailError').innerHTML='Morate uneti email';
        document.getElementById("email").style.borderColor = "red";
        err=true;
    }
    if (date_range=='') {
        document.getElementById('rangeError').innerHTML='Morate uneti datum polaska i odlaska';
        document.getElementById("date-range").style.borderColor = "red";
        err=true;
    }
    if (!err) {
        console.log('stigo');
        let user={
            "name":name,
            "birthday":birth,
            "passport":passport,
            "phone":phone,
            "email":email,
            "dateGo":dateGo,
            "dateBack":dateBack,
            "action":action
        }
        let data=null;
        if (niz.length<1) {
             data={
                "user":user
            }
        }else{
             data={
            "user":user,
            "other":niz
        }
        }
        

   
    $.ajax({
            type: "POST",
            url: 'http://localhost/paragraf/Home/insurance/',
            data: {
            insurance_form: 1,
            form_data : data,                 
        },
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                alert('Uspesno ste dodali polisu!');
                location.reload();

            }
       });
    }
}
    function dateFormat(date){
        let date_in_datepicker=date;
        let lengthDate=date_in_datepicker.length;
        let niz = date_in_datepicker.split("/");
        let res=niz[2]+"-"+niz[0]+"-"+niz[1];
        return res;
        
    }

    function singlePolicy(id){

        let data={"id":id};

        $.ajax({
            type: "POST",
            url: 'http://localhost/paragraf/Policy/singlePolicy/',
            data: {
            insurance_form: 1,
            form_data : data,                 
        },
         
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                let glavni=document.getElementById('glavni');
                let dodatni=document.getElementById('dodatni');
                let datum=document.getElementById('datum');
                let html="";
                let html2="";
                for (var i = jsonData.length - 1; i >= 0; i--) {
                    for(let key in jsonData[i]){
                        if (jsonData[i][key]['polisa']) {

                            html+='<h5 class="card-title">Nosilac osiguranja</h5><p class="card-text">Ime i prezime:'+jsonData[i][key]["ime_i_prezime"]+'</p><p class="card-text">Datum rođenja:'+convertDateInNormal(jsonData[i][key]["datum_rodjenja"])+'</p><p class="card-text">Broj pasoša:'+jsonData[i][key]["broj_pasosa"]+'</p><p class="card-text">Email:'+jsonData[i][key]["email"]+'</p><p class="card-text">Telefon:'+jsonData[i][key]["telefon"]+'</p><p class="card-text">Grupno/Individualno:'+convertAction(jsonData[i][key]["polisa"])+'</p><p class="card-text">Datum polaska:'+convertDateInNormal(jsonData[i][key]["polazak"])+'</p><p class="card-text">Datum dolaska:'+convertDateInNormal(jsonData[i][key]["dolazak"])+'</p>';
                            if (jsonData[i][key]['datum_unosa']) {
                                let timeSt=jsonData[i][key]['datum_unosa'];
                                let podeli=timeSt.split(' ');
                                let p=document.getElementById('datum');
                                datum.innerHTML+=convertDateInNormal(podeli[0])+'  '+podeli[1];
                            }
                        }else{
                            html2+='<h5 class="card-title">Dodatni osiguranik:</h5><p class="card-text">Ime i prezime:'+jsonData[i][key]["ime_i_prezime"]+'</p><p class="card-text">Broj pasoša:'+jsonData[i][key]["broj_pasosa"]+'</p><p class="card-text">Datum rođenja:'+convertDateInNormal(jsonData[i][key]["datum_rodjenja"])+'</p>';
                                
                        }   
                    }
                }
                glavni.innerHTML+=html;
                dodatni.innerHTML+=html2;
                let singlePage=document.getElementById('singlePage');
                singlePage.style.display='flex';
                let tabela=document.getElementById('tabela');
                tabela.style.display='none';
                let naslov1=document.getElementById('naslov1');
                naslov1.style.display='none';
             

            }
       });
    }
    function convertDateInNormal(datum){
       
        let niz = datum.split("-");
        let res=niz[1]+"-"+niz[2]+"-"+niz[0];
        return res;
        
    }
    function convertAction(action){
        let polisa='';
        if (action==0) {
            polisa='Individualno';
        }else{
            polisa='Grupno';
        }
        return polisa;
    }
    function back(){
        document.getElementById('singlePage').style.display='none';
        document.getElementById('tabela').style.display='';
        document.getElementById('naslov1').style.display='block';
        location.reload();
    }
      function razlikaDatuma(){
        range=document.getElementById('date-range').value;
        let r=range.split(' - ');
        let od=r[0].split('/');
        let dan=od[1];
        let mesec=od[0];
        let godina=od[2];
        let od2=r[1].split('/');
        let dan2=od2[1];
        let mesec2=od2[0];
        let godina2=od2[2];
        let m;
        let m2;
        let mesecc=mesec.indexOf('0');
        if (mesecc==0) {
             m=mesec.substr(1);
        }
        let mesecc2=mesec2.indexOf('0');
        if (mesecc2==0) {
             m2=mesec2.substr(1);
        }
        var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
        var firstDate = new Date(godina2,m2-1,dan2);
        var secondDate = new Date(godina,m-1,dan);
       


        var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())))/oneDay;
        if (diffDays>=0) {
            document.getElementById('numberOfDays').innerHTML=diffDays+'days';
        }else{
            document.getElementById('rangeError').innerHTML='Datum nije dobro odabran!';
        }
        console.log(diffDays);
    }

    


