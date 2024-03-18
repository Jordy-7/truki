import { SHOPPING_CAR_KEYWORD, carritoContainer } from "../../lib/constants/index.js";
import { getToLocalStorage } from "../../lib/utils/get-to-local-storage.js";
import { saveToLocalStorage } from "../../lib/utils/save-to-local-storage.js";
import { useMutationObserver } from "../../lib/utils/use-mutation-observer.js";


useMutationObserver(carritoContainer, () => {
  const productsBtns = document.querySelectorAll(".btn-delete");

  productsBtns.forEach((item) => {
    item.addEventListener('click', () => {
      const { id } = item.dataset;
      const savedProducts = getToLocalStorage(SHOPPING_CAR_KEYWORD) ?? [];
      const newSavedProducts = savedProducts.filter(i => Number(i) !== Number(id));
      saveToLocalStorage(SHOPPING_CAR_KEYWORD, newSavedProducts);

      window.location.reload()
    })
  })
})