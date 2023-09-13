const formAddWishlist = document.getElementById("formAddWishlist");
    formAddWishlist.addEventListener("submit", e=> {
        e.preventDefault();

        const nombreWishlist = document.getElementById("nombreWishlist");
        const descripcionWishlist = document.getElementById("descripcionWishlist");

        const privacidadWishlistRadio = document.getElementsByName("privacidadWishlist");
        var privacidadWishlist = null;
        for (var radio of privacidadWishlistRadio)
        {
            if (radio.checked) {
                privacidadWishlist = radio.value;
            }
        }

        if(nombreWishlist.value.length <= 0){
            alert("Nombre de Wishlist vacio");
        }
        else if(descripcionWishlist.value.length <= 0){
            alert("Descripcion de Wishlist vacia");
        }
        else if(privacidadWishlist == null){
            alert("Tipo de Privacidad vacio");
        }
        else {
            alert("Wishlist Agregada")
        }
    })