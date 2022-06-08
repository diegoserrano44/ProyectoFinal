<?php
ob_start();
?>
<div class="p-5 mb-4 bg-dark rounded-3 d-flex justify-content-center">
    <div class="container bg-light border-2 border-dark rounded-3 pt-4 pb-5 px-5 shadow loginContainer">
        <?php if(isset($params['mensaje'])){
                echo $params['mensaje'];
        }?>
        <h4>This is your first time on the site. Please set your user name.</h4>
        <form method="POST" action="index.php?ctl=registroGoogle">
            <label for="nameUser" class="form-label">Username</label>
            <input type="text" class="form-control" id="nameUser"  name="nameUser" onkeyup="filtra(this.value)">
            <div class="mt-1" id="resultado"></div>
            <button class="btn my-3 w-100 py-2 fw-bold botonAzul" type="submit" name="bUsername">Send</button>
        </form>
    </div>
</div>
<script>
function filtra(str) {

if (str.length == 0) {

    return;
} else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                ms= JSON.parse(this.responseText);
            if(ms !== false){                        
                 document.getElementById("resultado").innerHTML = "This user already exists.";
                document.getElementById("resultado").style.color="red";
                document.getElementById("usuario").style.backgroundColor="pink";

            }else{
                document.getElementById("resultado").innerHTML = "";
                document.getElementById("usuario").style.backgroundColor="white";
            }
        }
    };
    xmlhttp.open("GET", "index.php?ctl=existeUsuario&id=" + str, true);
    xmlhttp.send();
}
}


</script>
<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . './../templates/layout.php' ?>