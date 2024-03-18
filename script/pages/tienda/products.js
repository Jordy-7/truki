import { getProducts } from "../../../script/lib/services/get-products.js"
import { SHOPPING_CAR_KEYWORD, productContainer } from "../../lib/constants/index.js"
import { formatPrice } from "../../lib/utils/format-price.js"
import { getToLocalStorage } from "../../lib/utils/get-to-local-storage.js"

const productLoading = productContainer.querySelector("span")

const fragment = document.createDocumentFragment()

window.addEventListener("load", async () => {
  const productos = await getProducts();
  // desactivamos el loading...
  productLoading.style.display = "none";
  showProducts(productos)

})

function showProducts(arr) {
  const savedProducts = getToLocalStorage(SHOPPING_CAR_KEYWORD) ?? [];

  arr.map(({ title, price, image, description, id }) => {
    const newPrice = formatPrice(price)
    const element = document.createElement("div")
    element.classList.add("productos")

    element.innerHTML = `
    <article class="producto" data-id="${id}">
      <a href="producto.html" class="link-ver-product">
        <div>
          <div class="image">
            <img
            src="${image}"
            alt="Producto 3">
          </div>
          <div class="producto-info">
            <h2 class="name-product" >${title}</h2>
            <p class="description">${description}</p>
            <p class="price">${newPrice}</p>
          </div>
        </div>
      </a>
      <button class="producto-btn">${savedProducts.includes(`${id}`) ? "añadido" : "Añadir al carrito"}</button>
    </article>

    `;

    fragment.append(element)
  })

  productContainer.appendChild(fragment)
}

