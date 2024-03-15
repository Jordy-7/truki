import { SHOPPING_CAR_KEYWORD, carritoContainer } from "../../lib/constants/index.js"
import { getProductById } from "../../lib/services/get-product-by-id.js";
import { formatPrice } from "../../lib/utils/format-price.js"
import { getToLocalStorage } from "../../lib/utils/get-to-local-storage.js"

const loader = carritoContainer.querySelector(".loader")

const fragment = document.createDocumentFragment()
const savedProducts = getToLocalStorage(SHOPPING_CAR_KEYWORD) ?? [];

if (savedProducts.length === 0) {
  carritoContainer.innerHTML = "<p style='text-align:center;'>No hay productos</p>"
} else {
  const getSavedProducts = savedProducts.map((item) => getProductById(item))

  Promise.allSettled(getSavedProducts).then((data) => {
    data.map(({ status, value }) => {

      const { image, title, price, id } = value;
      const newPrice = formatPrice(price)
      const element = document.createElement("article");
      element.classList.add("shopping-product-item");
      element.setAttribute("data-pay", price)

      /**
       * Editar la estructura HTML
       */
      element.innerHTML = `
        <a href="#">
        <img src="${image}" alt="${title}"/>
        <div>
        <p>
          ${title}
        </p>

        <span>${newPrice}</span>
        </div>
        </a>
        <button class="btn-delete" data-id="${id}">Remove item</button>  
    `;

      fragment.append(element)
    })

    loader.style.display = "none"
    carritoContainer.appendChild(fragment)
  })
}