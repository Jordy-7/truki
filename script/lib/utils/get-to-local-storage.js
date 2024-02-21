export function getToLocalStorage(key){
  return JSON.parse(window.localStorage.getItem(key))
}