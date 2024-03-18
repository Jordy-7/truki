/**
 * @param {HTMLElement} [element]
 * @param {() => void} [callback]
 */

export function useMutationObserver(element, callback) {

  const currentTarget = element;

  const onMutation = (mutationList, observer) => {
    for (const mutation of mutationList) {
      if (mutation.type === "childList") {
        callback()

        if (element.childElementCount > 1) {
          observer.disconnect()
        }
      }
    }
  }
  const mutation = new MutationObserver(onMutation)

  mutation.observe(currentTarget, { childList: true, attributes: true, subtree: true })
}