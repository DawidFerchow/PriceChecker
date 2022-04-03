// Thanks adaneo! https://stackoverflow.com/a/9494891

function catchPaste(evt, elem, callback) {
  if (navigator.clipboard && navigator.clipboard.readText) {
    // modern approach with Clipboard API
    navigator.clipboard.readText().then(callback);
  } else if (evt.originalEvent && evt.originalEvent.clipboardData) {
    // OriginalEvent is a property from jQuery, normalizing the event object
    callback(evt.originalEvent.clipboardData.getData('text'));
  } else if (evt.clipboardData) {
    // used in some browsers for clipboardData
    callback(evt.clipboardData.getData('text/plain'));
  } else if (window.clipboardData) {
    // Older clipboardData version for Internet Explorer only
    callback(window.clipboardData.getData('Text'));
  } else {
    // Last resort fallback, using a timer
    setTimeout(function() {
      callback(elem.value)
    }, 100);
  }
}