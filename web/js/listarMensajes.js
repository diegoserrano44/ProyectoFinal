
if ((hilos === undefined)) {
    let texto = "No tienes ningún mensaje.";
    container.innerText = texto;

} else {

    let asunto;
    let id_hilo;

    for (x of hilos) {
        asunto = x.asunto;
        id_hilo = x.id_hilo;
        remite = x.usuario;
        
        if (((user == x.id_alumno) && (x.alumnoV == 1)) || ((user == x.id_profesor) && (x.profesorV == 1))) {
            crearCaja(asunto, id_hilo);
        }
    }
    if (container.getInnerHTML() == "\n\n") {
        let texto = "No tienes ningún hilo.";
        container.innerText = texto;
    }
}


function crearCaja(asunto, id) {
    let item = document.createElement('div');
    item.className = "accordion-item";
    container.appendChild(item);
    let h2 = document.createElement('h2');
    h2.className = "accordion-header";
    h2.setAttribute('id', 'headingOne');
    item.appendChild(h2);
    let boton = document.createElement('button');
    boton.className = "accordion-button bMsj fontmsj";
    boton.setAttribute('type', 'collapse');
    boton.setAttribute('data-bs-toggle', 'collapse');
    boton.setAttribute('data-bs-target', '#id' + id);
    boton.setAttribute('aria-expanded', 'true');
    boton.setAttribute('aria-controls', 'id' + id);
    boton.setAttribute('onclick', 'muestraMsj(' + id + ')');

    boton.innerText = "#" + id + " - Asunto: " + asunto;

    let para= document.createElement('div');
    para.innerText=" - Conversación con "+remite;
    para.className="rmte";

    let eye = document.createElement('button');
    let del = document.createElement('button');


    del.setAttribute('onclick','deleteMsj('+ id + ')');
    del.setAttribute('data-bs-toggle','modal');
    del.setAttribute('data-bs-target','#deleteModal');

    let icono1 = document.createElement('i');
    let icono2 = document.createElement('i');

    icono1.className="fa-solid fa-comment-dots";
    icono2.className="fa-solid fa-trash";

    eye.className = "icono btn btn-lg botonMorado";
    del.className = "icono btn btn-lg botonMorado";

    boton.appendChild(para);
    boton.appendChild(eye);
    boton.appendChild(del);

    eye.appendChild(icono1);
    del.appendChild(icono2);

    h2.appendChild(boton);
    let divms = document.createElement('div');
    divms.className = "accordion-collapse collapse";
    divms.setAttribute('aria-labelledby', 'headingOne');
    divms.setAttribute('data-bs-parent', '#accordionExample');
    divms.setAttribute('id', 'id' + id);
    item.appendChild(divms);
    let divmsbody = document.createElement('div');
    divmsbody.className = "accordion-body d-flex flex-column";
    divmsbody.setAttribute('id', 'cuerpo' + id);
    divms.appendChild(divmsbody);

}

function muestraMsj(id) {
    let cuerpo = document.getElementById('cuerpo' + id);

    if (! cuerpo.classList.contains('show')) {
        document.getElementById('cuerpo' + id).innerHTML= '';
    }

    var url = 'index.php?ctl=dameMensajes';
    var method = 'POST';
    var params = "idhilo=" + id;
        params+="&id="+user;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            msjs=JSON.parse(xhr.responseText); 
            manejaMsj(cuerpo);
        }
    }
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(params);
}


function manejaMsj(cuerpo) {
    let mensaje;
    let alumno;
    let profesor;
    let fecha;
    let envia;

    for(var i=0; i< msjs.length ; i++){
        
        if (JSON.stringify(msjs[0].id_alumno) === nuser) {
            alumno = nuser;           
            profesor = JSON.stringify(msjs[0].usuario);
        } else if(JSON.stringify(msjs[0].id_profesor) === user) {
            profesor = nuser;
            alumno = JSON.stringify(msjs[0].usuario);
        }

       
        fecha = JSON.stringify(msjs[i].fecha_creacion);
        mensaje = JSON.stringify(msjs[i].mensaje);

        let cajaM = document.createElement('div');
        let cajaF= document.createElement('span');
        let m = document.createElement('p');
        
        
        cajaF.className="fecha";
        cajaF.innerText= fecha;
        

    if (JSON.stringify(msjs[i].envia).replace(/['"]+/g,'') == user) {
        cajaM.className = "globe_Mss_R vineta right_Mss";
    } else {
        cajaM.className = "globe_Mss_L vineta left_Mss";
    } 

    m.innerHTML=mensaje;
    cajaM.setAttribute('value',JSON.stringify(msjs[i].id_mensaje).replace(/['"]+/g,''))

    cuerpo.appendChild(cajaM);
    cajaM.appendChild(cajaF);
    cajaM.appendChild(m);  
    
    }
    let responder = document.createElement('button');
        responder.innerHTML="<i class='fa-solid fa-reply'></i>";
        responder.className="right_Mss btn botonAzul btn-lg";
    	responder.setAttribute('data-bs-toggle','modal');
    	responder.setAttribute('data-bs-target','#replyModal');
        responder.setAttribute('onclick','responderMsj('+ cuerpo.parentElement.getAttribute('id').replace(/['id']+/g,'') + ')');
        cuerpo.appendChild(responder);
        
}


function deleteMsj(id){
    document.querySelector('.delete').setAttribute('onclick','ejecutaDel('+id+')');    
}

function ejecutaDel(id){
    var url = 'index.php?ctl=eliminarHilo';
    var method = 'POST';
    var params = "idhilo=" + id;
        params+="&id="+user;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText); 
            location.reload()
        }
    }
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(params);   
}

function responderMsj(id){
    document.querySelector('.reply').setAttribute('onclick','ejecutaRep('+id+')');
}

function ejecutaRep(id){
    let mensaje = document.querySelector('#replymessage').value;
    var url = 'index.php?ctl=responderMensaje';
    var method = 'POST';
    var params = "idhilo=" + id;
        params+="&msj="+mensaje;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText); 
 			location.reload();
        }
    }
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(params);   
}