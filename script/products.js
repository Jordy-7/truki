import { getProducts } from "../script/lib/services/get-products.js"
const productContainer = document.querySelector("#productos")
const productLoading = productContainer.querySelector("span")

const fragment = document.createDocumentFragment()

window.addEventListener("load", async () => {
  const productos = await getProducts()
  // desactivamos el loading...
  productLoading.style.display = "none";
  showProducts(productos)
})

function showProducts(arr) {
  arr.map(({ title, price, image, description }) => {
    // documentacion -> https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/Intl/NumberFormat
    const formatPrice = new Intl.NumberFormat("en-US", { style: "currency", currency: "USD" }).format(price)
    const element = document.createElement("div")
    element.classList.add("productos")

    element.innerHTML = `
    <a href="detalles.html" class="link-ver-product">
      <div class="producto">
        <div class="image">
          <img
          src="${image}"
          alt="Producto 3">
        </div>
        <div class="producto-info">
          <h2 class="name-product">${title}</h2>
          <p class="description">${description}</p>
          <p class="price">${formatPrice}</p>
          <button>Ver producto</button>
        </div>
      </div>
    </a>
    
    `;

    fragment.append(element)
  })

  productContainer.appendChild(fragment)
}

/* 
  <div class="productos">
        <a href="#" class="link-ver-product">
          <div class="producto">
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-thsyY7pcpafX5U5CN_fkREa_Bmrvak0sRg&usqp=CAU"
              alt="Producto 3">
            <div class="producto-info">
              <h2 class="name-product">Nombre de Producto 3</h2>
              <p class="description">Descripción del producto 3</p>
              <p class="price">Precio: $300</p>
              <button>Comprar</button>
            </div>
          </div>
        </a>

      </div>
*/