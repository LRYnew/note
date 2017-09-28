define( function() {
  var util = {
    getFormatDate: function(date,type) {
      if(type === 1) {
        return '2017-08-27';
      } else {
        return '2017年08月27日';
      }
    }
  }
  return util;
});