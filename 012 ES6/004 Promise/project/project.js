function loadImageAsync(url) {
  return new Promise((resolve, reject) => {
    var image = new Image;

    image.onload = function() {
      resolve(image);
    }

    image.onerror = function () {
      reject(new Error('Could not load'))
    }

    image.src = url;
  });
}

var body = document.getElementsByTagName('body');
loadImageAsync('http://es6.ruanyifeng.com/images/cover_thumbnail.jpg').then((image) => {
  body[0].appendChild(image);
})