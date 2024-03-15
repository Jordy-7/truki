import { carritoContainer } from "../../lib/constants/index.js";
import { formatPrice } from "../../lib/utils/format-price.js";
import { useMutationObserver } from "../../lib/utils/use-mutation-observer.js";

const totalPayContainer = document.querySelector(".total-pay");

useMutationObserver(carritoContainer, () => {
  const shoppingItems = document.querySelectorAll(".shopping-product-item");
  let totalPay = 0;


  for (const item of shoppingItems) {
    const { pay } = item.dataset;
    totalPay = Number(totalPay) + Number(pay)
  }

  console.log(totalPay);
  totalPayContainer.style.display = "block";
  totalPayContainer.textContent = formatPrice(totalPay)

})