export function saveToLocalStorage(key, value) {
  window.localStorage.setItem(key, JSON.stringify(value))
}