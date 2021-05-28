'use stric';

// Para crear una cookie
function createCookie(id, categoria){

    var lasCookies = document.cookie;

    // Si encuentra la cookie de login, creara la cookie producto
    if(lasCookies.indexOf('login') != -1){  
        
        console.log(lasCookies)

        // Si inicio session podemos crear la cookie
        if(lasCookies.indexOf('login') != -1){ 
            setCookie(lasCookies, id, categoria)
        }

    }else{

    }

}

function setCookie(lasCookies, id, categoria){
    if(typeof lasCookies == 'string'){ // Solo aceptamos el tipo dato String

        /**
         * Separamos el String con el metodo split() y por el caracter punto y coma(;)
         * Nos retornara un arreglo
         * var cookies = lasCookies.split(';')
         */
        var cookies = lasCookies.split(';')
        var product = ''
        var product_cookie = []

        // Recorremos las cookie
        cookies.forEach(element => {

            // Buscamos si existe o no la cookie
            if(element.indexOf('product_id') != -1){ 
               
                /**
                 * Si la cookie existe
                 * 
                 * Obtenemos sus valores
                 * 
                 * Creamos una nueva pero añadiendo los valores que estaban anteriormente guardados
                */
                product = element
                product_cookie = product.split('=')
                id = categoria + "_" + id + "-" + product_cookie[1];

                document.cookie = "product_id="+ id +"; max-age=86400; path=/";

            }else{ 

                var valor = categoria + "_" + id 

                console.log(valor)

                // Solo creamos la cookie si no existe ninguna con ese nombre
                document.cookie = "product_id="+ valor +"; max-age=86400; path=/";
            }

        });

        
    }else{
        alert('tipo de erroneo')
    }
}

/**
 * 
 * Go button cart
 * 
 */

function toCart(){
    location.href = '../cart.php'
}