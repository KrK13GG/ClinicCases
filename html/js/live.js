export const live = (eventType, className, cb) => {
  document.addEventListener(eventType, function (event) {
    let el = event.target;
    let found = false;
    while (el && !found) {
      el = el.parentElement;
      found = el?.classList.contains(className);
    }
    if (found) {
      console.log(event);
      cb.call(el, event);
    }
  });
};
