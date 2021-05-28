let cantProduct = document.getElementById('cant-product')
var productID = []
var totalX = document.getElementsByClassName('total')
var result = 0.0;
var subtotal = document.getElementById('subtotal')

// Obtenemos los valores de las cookie con la function getCookie()
productID = getCookie(document.cookie) 

// A mi carrito le pasamos la catidad de productos agregados
if(!getSuccessTrue()){
    if(productID.length > 0){
        cantProduct.innerText = 'Mi Carrito('+ productID.length +')' 
    }else{
        cantProduct.innerText = 'Mi Carrito(0)' 
    }
}else{
    cantProduct.innerText = 'Mi Carrito(0)' 
}

function getSuccessTrue(variable) {
    var query = window.location.search.substring(1);
    if(query.indexOf('succes=true') != -1){
        return true
    }
    return false;
 }

subtotalx()
totalNeto()

function subtotalx(){
        result = 0.0;
        for(var i=0 ; i<totalX.length ; i++){
            result += parseFloat(totalX[i].innerText.replace('$', ''))
        }
        
        if(result > 0){
            subtotal.innerText = result.toString()

            return result
        }
}

// -----------------------------------------------------------
// Solo obtenemos el valor de la cookie
function getCookie(lasCookies){
    var cookies = lasCookies.split(';')
    var product = ''
    var product_cookie = []
    var id_product = []

    // Recorremos las cookie
    cookies.forEach(element => {

        // Buscamos si existe o no la cookie
        if(element.indexOf('product_id') != -1){ 
           
            /**
             * Si la cookie existe
             * 
             * Obtenemos sus valores
             * 
             * Solo obtenemos los valores de la cookie
            */
            product = element
            product_cookie = product.split('=')
            id_product = product_cookie[1].split('-')       
        }else{ 

            return null
        }

    });
    return id_product;
}


// Para obtener el valor de el input cada vez que el usuario lo cambie
function total(id, precio, e){
    if(id != null && precio != null && e != null){
        console.log(e)
        var producto = document.getElementById(id)
        var cant = document.getElementById(e);

        var valor = parseInt(cant.value)
        if(valor > 0){
            producto.innerText = '$' + parseFloat(valor * precio)
            console.log(parseFloat(valor * precio))
        }
        subtotalx()
        totalNeto()
    }
}


// Total neto 
function totalNeto(){

    if(subtotalx() > 0){
        var envio = document.getElementById('envio')
        var total = subtotalx() + parseFloat(envio.innerText.replace('$', ''))
    
        document.getElementById('total').innerText = total
    }

    
}

document.getElementById('btn-finish').addEventListener('click', () => {
    if(result > 0){
        document.location = './pay.php'
        document.cookie = "total="+result+"; max-age=86400; path=/"
    }
})