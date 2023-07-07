var idModeloService = "";
var idModeloSession = "";


if (sessionStorage.getItem('nombreModelo') != null) {
    var nombreSession = sessionStorage.getItem('nombreModelo').trim().replace(" ", "-");
    if (nombreSession == 'equipos-especiales') {
        nombreSession = 'especiales';
    }
    //console.log("Session menu: " , nombreSession);
} else {
    var homeSession = sessionStorage.getItem('idModelo');
    //console.log("Session Home: ", sessionStorage.getItem('idModelo'))
}

var arrayVersion;

var arrayData = [];

Liferay.Service(
    '/foton.tipo/get-tipos-by-group-id',
    {
        groupId: Liferay.ThemeDisplay.getSiteGroupId()
    },
    function (obj) {

        if (nombreSession != null) {

            obj.forEach(item => {

                if (item.nombre.toLowerCase().replace(" ", "-").includes(nombreSession)) {
                    idModeloSession = item.tipoId;
                }
            });

        }


        if (nombreSession != null) {
            idModeloService = idModeloSession
            //console.log("entre condicion nombre modelo");
        } else if(homeSession != null){
            //console.log("entre condicion idModelo");
            idModeloService = homeSession;
        }else{
            idModeloService = configuration.idModelo;
        }

        console.log("ID SERVICIO: " , idModeloService);


        Liferay.Service(
            '/foton.modelo/get-modelos-by-tipo-id', {
            tipoId: idModeloService
        },
            function (obj) {

                var pathname = window.location.pathname.split('/');
                var nameModel = pathname[2];

                
                console.log("pathname",pathname);
                console.log("nameModel",nameModel);

                let ruta = "";

                obj.forEach(item => {

                    ruta = item.nombre.toLowerCase().trim();
                    ruta = ruta.replace(" ", "-");

                    //arrayData.push(item);

                    getLowerValue(item);

                });

            });
            
    }
);


/*  var verId;
  var modelVersName;*/
 /*var modelArray=[];*/
  /*var verFin=[];*/
  /*set contador (autoincrement id's)*/
 /* var counterVal = 0;*/
  /*set contador para mostrar index predeterminado en version mas barata*/
  /*var contadorIndex = -1;*/
  var modelArr = Array();
  
function crearPaginacion(model){
    var pathname = window.location.pathname.split('/');
    var nameModel = pathname[2];
    
    modelArr.push(model);
    $('#models-foton').pagination({
        dataSource: arrayData,
        pageSize: 6,
        callback: function (response, pagination) {
            var dataHtml = "";
            console.log("idModeloService",idModeloService);
            console.table(response);
            
            /*ordenar response (para ordenar renderizado modelos)*/
            response.sort(function(a, b){
                if(a.nombre < b.nombre) return -1;
                if(a.nombre > b.nombre) return 1;
                return 0;
            })
            console.log("DataResponse: ",response);
            /*fin orden*/
            
            /*comienzo orden array (para ordenar modelos baratos en cards correspondientes)*/
          
           /*modelArray.sort(function(a, b){
                if (a > b) {
                    return 1;
                }
                if (b > a) {
                    return -1;
                }
                return 0;
            })
            console.table(modelArray);
            /*fin sort array*/
            
            
         /*   $(document).ready(function(){
                setTimeout(function() {  
                
                ++contadorIndex
                htmlpush = `${modelArray[contadorIndex]}`;
                    
                
                ++counterVal
                $('#version-barata').attr('id', 'barata-'+(counterVal));
                var string1 = "barata-";
                var string2 = string1 + counterVal;
                console.log("Nueva id: ",string2);
                var stringFinal = document.getElementById(string2)
                
                //$(stringFinal).html(htmlpush);
                }, 500);
        
            }); */

            
            
            response.forEach((item) => { 
              if(pathname[2]=="pesados"){
                var iva = "+ IVA"
              }
              else if(pathname[2]=="tracto"){
                var iva = " + IVA"
                
              }else{
                var iva = " + IVA"
                
              }
              
                    ruta = item.nombre.toLowerCase().trim();
                    ruta = ruta.replace(" ", "-");

                    dataHtml += `
                        <div class="col-lg-4 col-md-6 col-12 my-5">
                            <div class="card-cyberday">
                                <div class="header">
                                    <p class="text-foton">FOTON</p>
                                    <p class="text-sale">SALE</p>
                                </div>
                                <div class="box-info-model">
                                    <div class="div-img-camiones-model">
                                        <img src="${item.imagenVersion}" class="img-camiones-version"/>
                                    </div>
                                    <div class="div-oferta">
                                        <div class="ovalado">
                                            <span class="texto-50">-50%</span>
                                        </div>
                                    </div>
                                    <h4 class="title-modelo-foton foton-title-medium">${item.nombre}</h4>
                                    <p class="parrafo-modelo-foton">${item.descripcion} </p>
                                    <p class="precio-modelo-foton">PRECIO LISTA <span> ${item.precioLista} ${iva}</span></p>
                                    <div class="precio-before-cyber"><p class="precio-modelo-foton-before-cyber">PRECIO LISTA <span> ${item.precioLista} ${iva}</span></p></div>
                                            
                                            <p class="precio-modelo-barato-foton py-1 font-16">* Precio lista corresponde a <span class="foton-text-small nombre-barata-class ">[data${item.modeloId}]</span></p>
                                            
                                            
                                </div>
                                <div class="card__btn py-3">
                                <a class="foton-btn-secundary-small" href="/camiones/${nameModel}/${ruta}" onclick="
                                sessionStorage.setItem('modeloSession', '${item.modeloId}');
                                sessionStorage.setItem('idTipoVehiculo', '${item.tipoId}');">VER MODELOS</a>
                                <a class="foton-btn-primary-small" href="/cotizador" onclick="sessionStorage.setItem('modeloCamion', '${item.modeloId}');
                                    sessionStorage.setItem('idTipoVehiculo', '${item.tipoId}');">COTIZAR</a>
                                </div>
                            </div>
                        </div>
                        `;
            
                        modelArr.forEach((data) => { 
                            if(data.modeloId == item.modeloId){
                                dataHtml = dataHtml.replaceAll('[data'+item.modeloId+"]",data.modelVersName);
                            }
                        });

            });
           
            $('#models-foton').prev().html(dataHtml);
  
            if (arrayData.length <= 6) {
                $('.paginationjs').hide();
            }
        }
    });
}


function getNumbersInString(string) {
    var tmp = string.split("");
    var map = tmp.map(function(current) {
      if (!isNaN(parseInt(current))) {
        return current;
      }
    });
  
    var numbers = map.filter(function(value) {
      return value != undefined;
    });
  
    return numbers.join("");
  }

var dataHtml2 = "";
function getLowerValue(data) {


    Liferay.Service(
        '/foton.version/get-foton-versiones-by-modelo-id',
        {
            modeloId: data.modeloId
        },
        function (obj) {
            
            console.log("obj " , obj);
            let versionReturn = obj.data[0];

            obj.data.forEach(version => {
                /*if (parseInt(getNumbersInString(version.precioLista)) < parseInt(getNumbersInString(versionReturn.precioLista))) {

                  versionReturn = version;
                }*/
                if(version.isModeloMenor !== null && version.isModeloMenor ){
                    versionReturn = version;
                }

                if(version.versionIdSeleccionada !== null && version.versionId == version.versionIdSeleccionada){
                    versionReturn = version;
                }




            });

            const vr = {
                precioLista: format(versionReturn.precioLista),
                imagenVersion: versionReturn.imagen
            }
            
            data = Object.assign(data, vr);
            console.log("versionReturn" , versionReturn);
            arrayData.push(data);


            function format(num) {
                var reg = /\d{1,3}(?=(\d{3})+$)/g;
                return (num + '').replace(reg, '$&.');
            }

            var model = new Array();
            
            var jsonArg1 = new Object();
            model.modeloId = data.modeloId;
            model.modelVersName = versionReturn.nombre;


            if( versionReturn.modeloSeleccionado !== null && (data.modeloId == versionReturn.modeloSeleccionado)){
                model.modelVersName = versionReturn.mostrarNombreSeleccionado;
            }

            model.push(jsonArg1);

            crearPaginacion(model);
                                                      
              /*modificacion get-model-lowest fin*/
        }
    );
    
    

}